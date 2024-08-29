<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AdminBaseController
{

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct(
            $entityManager,
            'Manage users',
            null,
            null,
            null,
            ['FirstName', 'LastName', 'email'],
            User::class
        );
    }

    #[Route('/admin/users', name: 'admin_users')]
    public function index():Response
    {
        return $this->renderAdminView();
    }

}