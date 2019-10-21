<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BillingAddress
 *
 * @ORM\Table(name="ge_billing_address")
 * @ORM\Entity
 */
class BillingAddress extends Address
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstname", type="string", length=254, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=254)
     */
    private $lastname;
}
