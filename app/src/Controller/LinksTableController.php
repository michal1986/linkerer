<?php

namespace App\Controller;

use App\Entity\Link;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LinksTableController extends AbstractController
{
    #[Route('/links', name: 'app_links_table')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $links = $entityManager
            ->getRepository(Link::class)
            ->findAll();

        return $this->render('links_table/index.html.twig', [
            'links' => $links,
        ]);
    }
} 