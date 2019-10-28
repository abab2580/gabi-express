<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GeUserRepository")
 * @UniqueEntity(fields={"email"},
 * message= "l'email que vous indiqué est déja utilisé veuillez choisir un autre!")
 */
class GeUser implements UserInterface   
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="vous avez pas saisi le nom")
     * @Assert\Regex(
     * pattern="/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ._\s-]{2,50}$/",
     * message="Veuillez saisir un nom valide et respecter le format ")
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="vous avez pas saisi le prenom")
     * @Assert\Regex(
     * pattern="/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ._\s-]{2,50}$/",
     * message="Veuillez saisir un prenom valide et  respecter le format ")
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="vous avez pas saisi le mail")
     * @Assert\Email()
     * @Assert\Regex(
     * pattern = "/^[a-zA-Z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/",
     * message = "Veuillez respecter le format du mail")
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     *  @Assert\NotBlank(message="vous avez pas saisi le numero de téléphone")
     * @Assert\Regex(
     * pattern = "/^[0-9]+$/",
     * message = "le numero de téléphone doit contenir que des chiffres")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="vous avez pas saisi le mot de passe ")
     * @Assert\Regex(
     * pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,32}$/",
     * message ="Votre Mot de passe doit contenir au moins 8 caractère dont une lettre majuscule, une lettre minuscule, un chiffre, et/ou un caractères spécial")
     * 
     */
    private $password;

     /**
     * @Assert\EqualTo(propertyPath="password", message="Votre mot de passe doit ètre le meme ")
     */
    public $confirm_password;

    // /**
    // * le token qui servira lors de l'oubli de mot de passe
    // * @ORM\Column(type="string", length=255, nullable=true)
    // */
    //private $resetToken;

    
    //public function getResetToken(): ?string
    //{
       // return $this->resetToken;
   // }

   
   // public function setResetToken(string $resetToken): void
   // {
       // $this->resetToken = $resetToken;
  //  }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function eraseCredentials(){}
    public function getSalt(){}
    public function getUsername(){}
    public function getRoles()
        {
            return['ROLE_USER'];
        }

}
