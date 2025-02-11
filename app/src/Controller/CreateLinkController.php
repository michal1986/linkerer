<?php

namespace App\Controller;

use App\Entity\Link;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateLinkController extends AbstractController
{
    #[Route('/create-link', name: 'app_create_link', methods: ['GET', 'POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $fullLink = $request->request->get('fullLink');
            
            if ($fullLink) {
                $link = new Link();
                $link->setFullLink($fullLink);
                $link->setShortLink(substr(md5($fullLink . uniqid()), 0, 8));
                
                $entityManager->persist($link);
                $entityManager->flush();
                
                $this->addFlash('success', 'URL has been shortened successfully!');
                
                return $this->redirectToRoute('app_create_link');
            }
        }

        return $this->render('create_link/index.html.twig');
    }
} 