<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preorder
 *
 * @ORM\Table(name="ge_preorder")
 * @ORM\Entity
 */
class Preorder
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
     * @ORM\Column(name="customer_email", type="string", length=254)
     */
    private $customerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_name", type="string", length=254)
     */
    private $customerName;

    /**
     * @var string
     *
     * @ORM\Column(name="beneficiary_email", type="string", length=254)
     */
    private $beneficiaryEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="beneficiary_name", type="string", length=254)
     */
    private $beneficiaryName;

    /**
     * @var string
     *
     * @ORM\Column(name="beneficiary_phone", type="string", length=254)
     */
    private $beneficiaryPhone;

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
     * @var ProductPreorder
     *
     * @ORM\OneToMany(targetEntity="App\Entity\ProductPreorder", mappedBy="preorder", orphanRemoval=true, cascade={"all"})
     */
    private $items;
}
