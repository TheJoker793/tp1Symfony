<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact_form')]
    public function index(Request $request): Response
    {
        $form=$this->createForm(ContactType::class);
        $form=$form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
           $this->addFlash('success','Formulaire soumis avec success!'); 
        }
        
        return $this->render('formulaire/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
