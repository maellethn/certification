<?php

namespace App\Controller\Front;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_front_homepage')]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('front/homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }
}
