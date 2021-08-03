<?php

namespace App\Controller;

use App\Form\ReviewType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="form")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(ReviewType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            dump($form);
        }

        return $this->render('main/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
