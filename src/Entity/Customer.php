<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="ge_customer", indexes={@ORM\Index(name="fk_association_6", columns={"id_sponsorship"})})
 * @ORM\Entity
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=254)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=254)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=254)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=254, nullable=true)
     */
    private $phone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $dateCreated;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
     */
    private $dateModified;

    /**
     * @var Sponsorship
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Sponsorship", mappedBy="parrain", orphanRemoval=true)
     */
    private $sponsorships;

    /**
     * @var Sponsorship
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Sponsorship", inversedBy="filleul")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sponsorship", referencedColumnName="id")
     * })
     */
    private $sponsorshipFilleul;

}
