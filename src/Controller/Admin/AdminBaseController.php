<?php

namespace App\Controller\Admin;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AdminBaseController extends AbstractController
{
    protected string $title;
    protected ?string $addRoute;
    protected ?string $editRoute;
    protected ?string $deleteRoute;
    protected array $fields;
    protected string $defaultTemplate;
    protected EntityManagerInterface $entityManager;
    protected string $entityClass;

public function __construct(EntityManagerInterface $entityManager, string $title, ?string $addRoute, ?string $editRoute, ?string $deleteRoute ,array $fields, string $entityClass, string $defaultTemplate = 'components/pages/admin_index.html.twig')
    {
        $this->entityManager = $entityManager;
        $this->title = $title;
        $this->addRoute = $addRoute;
        $this->editRoute = $editRoute;
        $this->fields = $fields;
        $this->defaultTemplate = $defaultTemplate;
        $this->entityClass = $entityClass;
        $this->deleteRoute = $deleteRoute;
    }

    protected function renderAdminView(array $parameters = [], string $template = null): Response
    {
        if ($template === null) {
            $template = $this->defaultTemplate;
        }

        $parameters = array_merge($parameters, [
            'title' => $this->title,
            'addRoute' => $this->addRoute,
            'editRoute' => $this->editRoute,
            'deleteRoute' => $this->deleteRoute,
            'fields' => $this->fields,
            'entities' => $this->getEntityList(),
        ]);

        return $this->render($template, $parameters);
    }

    protected function getEntityList(): array
    {
        return $this->entityManager->getRepository($this->entityClass)->findAll();
    }
}
