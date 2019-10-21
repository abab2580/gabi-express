<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provider
 *
 * @ORM\Table(name="ge_provider", indexes={@ORM\Index(name="fk_association_15", columns={"id_administrator"}), @ORM\Index(name="fk_association_9", columns={"id_address"})})
 * @ORM\Entity
 */
class Provider
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
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=254, nullable=true)
     */
    private $name;

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
     * @var Administrator
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Administrator")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_administrator", referencedColumnName="id", nullable=false)
     * })
     */
    private $administrator;

    /**
     * @var ProviderAddress
     *
     * @ORM\OneToOne(targetEntity="App\Entity\ProviderAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_address", referencedColumnName="id", nullable=false)
     * })
     */
    private $address;

    /**
     * @var Product
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="provider", orphanRemoval=true, cascade={"all"})
     */
    private $products;
}
