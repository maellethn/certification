<?php

namespace App\Controller\Front;

use App\Form\Front\RandomQuizzType;
use App\Repository\QuestionRepository;
use App\Service\Front\QuizzCorrectionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuizzController extends AbstractController
{

    #[Route('/quizz', name: 'app_front_quizz')]
    public function __invoke(QuestionRepository $questionRepository, Request $request, QuizzCorrectionInterface $quizzValidator): Response
    {
        $questions = $questionRepository->findRandom(20);
        $form = $this->createForm(RandomQuizzType::class,null,[
            'questions' => $questions]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data =  $form->getData();
            $correction = $quizzValidator->correctForm($data);
            return $this->render('components/pages/quizz.html.twig',[
                'form' => $form,
                'correction' => $correction,
                'score' => $quizzValidator->calculateScore($correction)
            ]);
        }
        return $this->render('components/pages/quizz.html.twig',[
            'form' => $form
        ]);
    }
}