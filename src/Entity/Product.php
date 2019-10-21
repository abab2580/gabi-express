<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="ge_product", indexes={@ORM\Index(name="fk_association_3", columns={"id_provider"})})
 * @ORM\Entity
 */
class Product
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
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=254, nullable=true)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantity", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=8, scale=0)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price_discounted", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $priceDiscounted;

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
     * @var Provider
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider", inversedBy="products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_provider", referencedColumnName="id", nullable=false)
     * })
     */
    private $provider;

    /**
     * @var ProductOrder
     *
     * @ORM\OneToMany(targetEntity="App\Entity\ProductOrder", mappedBy="product", cascade={"all"})
     */
    private $itemOrders;

    /**
     * @var ProductOrder
     *
     * @ORM\OneToMany(targetEntity="App\Entity\ProductPreorder", mappedBy="product", cascade={"all"})
     */
    private $itemPreorders;

}
