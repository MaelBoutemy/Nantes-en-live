<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterController extends AbstractController
{
    /**
     * @Route("/newsletter", name="newsletter_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = new Newsletter();
        $form = $this->form->create(NewsletterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->Doctrine->persist($user);
            $this->Doctrine->flush();

            return $this->redirectToRoute('user_index');
        }
        return $form;

    }
}