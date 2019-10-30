<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GabiController extends AbstractController
{
  
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, ObjectManager $manager)
    {
        $contact = New Contact();
        $form = $this->createForm(ContactType::class ,$contact);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $contact->setCreatedAt(new \DateTime());
            $manager->persist($contact);
            $manager->flush();

            $this->addFlash('success', 'Votre message est envoyé avec succes!');
 
            return $this->redirectToRoute('contact');
        }
        return $this->render('pages/contact.html.twig', [
            'form' =>$form->createView()
        ]);
    }

    

}
