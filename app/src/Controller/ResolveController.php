<?php

namespace App\Controller;

use App\Entity\Link;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ResolveController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('resolve/index.html.twig');
    }

    #[Route('/resolve/{shortLink}', name: 'app_resolve_link')]
    public function resolve(string $shortLink, EntityManagerInterface $entityManager): Response
    {
        $link = $entityManager
            ->getRepository(Link::class)
            ->findOneBy(['shortLink' => $shortLink]);

        if (!$link) {
            throw $this->createNotFoundException('Short link not found');
        }

        return $this->redirect($link->getFullLink());
    }
} 