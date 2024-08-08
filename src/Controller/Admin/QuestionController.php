<?php

namespace App\Controller\Admin;

use App\Entity\Question;
use App\Form\QuestionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuestionController extends AdminBaseController
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct(
            $entityManager,
            'Manage questions',
            'admin_question_add',
            'admin_question_edit',
            'admin_question_delete',
            ['Title', 'Text', 'TagName'],
            Question::class
        );
    }

    #[Route('/admin/question', name: 'app_admin_question')]
    public function index():Response
    {
        return $this->renderAdminView();
    }

    #[Route('/admin/question/manage/{entity?}', name: 'admin_question_edit')]
    public function create(Request $request, EntityManagerInterface $entityManager, ?Question $entity = null): Response
    {
        if (!$entity)
            $entity = new Question();
        $form = $this->createForm(QuestionType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($entity);
            $entityManager->flush();
            return $this->redirectToRoute('app_admin_question');
        }

        return $this->render('components/pages/form.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/admin/question/delete/{entity}', name: 'admin_question_delete')]
    public function delete(Question $question, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($question);
        $entityManager->flush();
        return $this->redirectToRoute('app_admin_question');
    }

}