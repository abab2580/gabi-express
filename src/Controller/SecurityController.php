<?php

namespace App\Controller;

use App\Entity\GeUser;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="register")
     */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
       $user = New GeUser();  
       $form = $this->createForm(RegistrationType::class ,$user);
        
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
           $hash = $encoder->encodePassword($user, $user->getPassword());
           $user->setPassword($hash);
           $manager->persist($user);
           $manager->flush();

           return $this->redirectToRoute('login');
       }
       return $this->render('security/register.html.twig', [
       'form' =>$form->createView()
       ]);
    }

    
    /**
     * @Route("/connexion", name="login")
     */
    public function login(){
    
        $this->addFlash('danger', 'Votre mail ou mot de passe est incorrect');
        return$this->render('security/connexion.html.twig');  
    }


    /**
     * @Route("/deconnexion", name="logout")
     */
    public function logout(){}


    /**
     * @Route("/mot_de_passe_oublier", name="passe_oublier")
     */
    public function forgottenPassword()
    {

        return $this->render('security/forgot_password.html.twig');
    }

}
