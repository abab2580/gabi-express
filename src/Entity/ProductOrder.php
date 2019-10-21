<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductOrder
 *
 * @ORM\Table(name="ge_product_order", indexes={@ORM\Index(name="fk_association_2", columns={"id_orders"}), @ORM\Index(name="fk_association_4", columns={"id_product"})})
 * @ORM\Entity
 */
class ProductOrder
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Orders", inversedBy="items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_orders", referencedColumnName="id", nullable=false)
     * })
     */
    private $order;

    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="itemOrders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product", referencedColumnName="id", nullable=false)
     * })
     */
    private $product;


}
