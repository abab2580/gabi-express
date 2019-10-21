<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sponsorship
 *
 * @ORM\Table(name="ge_sponsorship", indexes={@ORM\Index(name="fk_association_5", columns={"id_filleul"}), @ORM\Index(name="fk_association_51", columns={"id_parrain"})})
 * @ORM\Entity
 */
class Sponsorship
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
     * @var Customer
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Customer", mappedBy="sponsorshipFilleul")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_filleul", referencedColumnName="id", nullable=false)
     * })
     */
    private $filleul;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer", inversedBy="sponsorships")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_parrain", referencedColumnName="id", nullable=false)
     * })
     */
    private $parrain;


}
