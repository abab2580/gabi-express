<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductPreorder
 *
 * @ORM\Table(name="ge_product_preorder", indexes={@ORM\Index(name="fk_association_17", columns={"id_pre_order"}), @ORM\Index(name="fk_association_18", columns={"id_product"})})
 * @ORM\Entity
 */
class ProductPreorder
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
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subtotal", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $subtotal;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
     */
    private $dateModified;

    /**
     * @var Preorder
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Preorder", inversedBy="items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pre_order", referencedColumnName="id", nullable=false)
     * })
     */
    private $preorder;

    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="itemPreorders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product", referencedColumnName="id", nullable=false)
     * })
     */
    private $product;


}
