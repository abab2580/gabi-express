<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="homee")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('home/home.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(){
        return $this->render('pages/about.html.twig');
    }

    /**
     * @Route("/cgu", name="cgu")
     */
    public function cgu(){
        return $this->render('pages/cgu.html.twig');
    }

    /**
     * @Route("/faq", name="faq")
     */
    public function faq(){
        return $this->render('pages/faq.html.twig');
    }

    /**
     * @Route("/help", name="help")
     */
    public function help(){
        return $this->render('pages/help.html.twig');
    }

}
