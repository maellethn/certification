<?php

namespace App\Controller\Admin;

use App\Entity\Tags;
use App\Form\TagType;
use App\Repository\TagsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TagsController extends AbstractController
{
    #[Route('/admin/tags', name: 'app_admin_tags')]
    public function index(TagsRepository $tagsRepository): Response
    {
        $tags = $tagsRepository->findAll();
        return $this->render('admin/tags/index.html.twig', [
            'tags' => $tags,
        ]);
    }

    #[Route('/admin/tags/manage/{tag?}', name: 'app_admin_add_tags')]
    public function create(Request $request, ?Tags $tag = null, EntityManagerInterface $entityManager): Response
    {
        if (!$tag)
            $tag = new Tags();
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tag);
            $entityManager->flush();
            return $this->redirectToRoute('app_admin_tags');
        }

        return $this->render('components/pages/form.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/admin/tags/delete/{tag}', name: 'app_admin_delete_tags')]
    public function delete(Tags $tag, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($tag);
        $entityManager->flush();
        return $this->redirectToRoute('app_admin_tags');
    }
}
