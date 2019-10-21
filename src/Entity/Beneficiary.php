<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Beneficiary
 *
 * @ORM\Table(name="ge_beneficiary")
 * @ORM\Entity
 */
class Beneficiary
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
     * @ORM\Column(name="name", type="string", length=254)
     */
    private $name;

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
     * @var Orders
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Orders", mappedBy="beneficiary", orphanRemoval=true, cascade={"all"})
     */
    private $orders;
}
