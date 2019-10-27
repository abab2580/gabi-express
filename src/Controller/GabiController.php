<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GabiController extends AbstractController
{
   
    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('pages/connexion.html.twig', [
           
        ]);
    }

    // /**
    //  * @Route("/register", name="register")
    //  */
    // public function register()
    // {
    //     return $this->render('pages/register.html.twig', [
           
    //     ]);
    // }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('pages/contact.html.twig', [
           
        ]);
    }

    

}
