<?php

namespace App\Controller\Front;

use App\Form\Front\RandomQuizzType;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuizzController extends AbstractController
{

    #[Route('/quizz', name: 'app_front_quizz')]
    public function __invoke(QuestionRepository $questionRepository, Request $request): Response
    {
        $questions = $questionRepository->findRandom(20);
        $form = $this->createForm(RandomQuizzType::class,null,['questions' => $questions]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            return $this->redirectToRoute('task_success');
        }
        return $this->render('components/pages/quizz.html.twig',[
            'form' => $form
        ]);
    }
}