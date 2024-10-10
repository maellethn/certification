<?php

namespace App\Service\Front;

use App\Entity\Score;
use App\Repository\QuestionRepository;

class RandomQuizzCorrection implements QuizzCorrectionInterface
{
    private QuestionRepository $questionRepository;

    /**
     * @param QuestionRepository $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }


    public function calculateScore(array $correction): Score
    {
        $score = 0;
        foreach ($correction as $answers){
            $wrongAnswer = false;
            foreach ($answers as $answer)
                if ($answer === false)
                    $wrongAnswer = true;
            if ($wrongAnswer === false)
                $score+=1;
        }
        return new Score($score, count($correction));
    }


    /**
     * Get all the correct answer with QuestionId and compare to the User response. Give the correct answer in response
     */
    public function correctForm(array $data): array
    {
        $correction = [];
        foreach ($data as $questionId => $answersIds){
            $question = $this->questionRepository->findOneBy(['id' => $questionId]);
            $answers = $question->getAnswers();
            foreach ($answers as $answer) {
                //Choose a good answer
                if ($answer->isValid() && in_array($answer, $answersIds))
                    $correction[$questionId][$answer->getId()] = true;
                //Choose a wrong answer
                elseif (!$answer->isValid() && in_array($answer, $answersIds))
                    $correction[$questionId][$answer->getId()] = false;
                //Miss one good answer
                elseif ($answer->isValid() && !in_array($answer, $answersIds))
                    $correction[$questionId][$answer->getId()] = false;
                //Don't choose wrong answer
                else
                    $correction[$questionId][$answer->getId()] = true;
            }
        }
        return $correction;
    }
}