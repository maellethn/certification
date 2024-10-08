<?php

namespace App\Controller\Front;

use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuizzController extends AbstractController
{

    #[Route('/quizz', name: 'app_front_quizz')]
    public function __invoke(QuestionRepository $questionRepository): Response
    {
        $questions = $questionRepository->findRandom(20);
        return $this->render('components/pages/quizz.html.twig',[
            'questions' => $questions
        ]);
    }
}