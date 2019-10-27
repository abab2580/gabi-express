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
     * pattern="",
     * match=false,
     * message="Veuillez saisir un nom valide et respecter le format ")
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(
     * pattern="/\d/",
     * match=false,
     * message="Veuillez saisir un prenom valide et  respecter le format ")
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire minimum 8 caractères")
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

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
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
