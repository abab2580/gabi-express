<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Coupon
 *
 * @ORM\Table(name="ge_coupon")
 * @ORM\Entity
 */
class Coupon
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
     * @ORM\Column(name="codes", type="string", length=254)
     */
    private $codes;

    /**
     * @var string
     *
     * @ORM\Column(name="discount", type="decimal", precision=8, scale=0)
     */
    private $discount;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_expires", type="datetime", nullable=true)
     */
    private $dateExpires;

    /**
     * @var int|null
     *
     * @ORM\Column(name="usage_count", type="integer", nullable=true)
     */
    private $usageCount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_ids", type="string", length=254, nullable=true)
     */
    private $productIds;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="free_shipping", type="boolean", nullable=true)
     */
    private $freeShipping;

    /**
     * @var string|null
     *
     * @ORM\Column(name="product_categories", type="string", length=254, nullable=true)
     */
    private $productCategories;

    /**
     * @var string|null
     *
     * @ORM\Column(name="used_by", type="string", length=254, nullable=true)
     */
    private $usedBy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="usage_limit", type="integer", nullable=true)
     */
    private $usageLimit;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="individual_use", type="boolean", nullable=true)
     */
    private $individualUse;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Orders", inversedBy="coupons")
     * @ORM\JoinTable(name="ge_coupon_orders",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_coupon", referencedColumnName="id", nullable=false)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_orders", referencedColumnName="id", nullable=false)
     *   }
     * )
     */
    private $orders;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

}
