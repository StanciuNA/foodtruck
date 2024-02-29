<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Post;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;



#[AsController]
class Authenification extends AbstractController
{

    public function __construct(
        private AuthenificationHandler $AuthenificationHandler
    ) {}

    public function __invoke(User $user): User
    {
        $this->AuthenificationHandler->handle($user);

        return $user;
    }

}



?>