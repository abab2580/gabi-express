<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="ge_orders", indexes={@ORM\Index(name="fk_association_1", columns={"id_customer"}), @ORM\Index(name="fk_association_11", columns={"id_delivery_address"}), @ORM\Index(name="fk_association_14", columns={"id_beneficiary"}), @ORM\Index(name="fk_association_10", columns={"id_billing_address"})})
 * @ORM\Entity
 */
class Orders
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
     * @ORM\Column(name="created_via", type="string", length=254, nullable=true)
     */
    private $createdVia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=254, nullable=true)
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="currency", type="string", length=254, nullable=true)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="total", type="decimal", precision=8, scale=0)
     */
    private $total;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method", type="string", length=254)
     */
    private $paymentMethod;

    /**
     * @var bool
     *
     * @ORM\Column(name="paid", type="boolean")
     */
    private $paid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="transaction_id", type="string", length=254, nullable=true)
     */
    private $transactionId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_paid", type="datetime", nullable=true)
     */
    private $datePaid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_note", type="string", length=254, nullable=true)
     */
    private $customerNote;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_completed", type="datetime", nullable=true)
     */
    private $dateCompleted;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_method", type="string", length=254)
     */
    private $shippingMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_total", type="decimal", precision=8, scale=0)
     */
    private $shippingTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=254)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="discount_total", type="decimal", precision=8, scale=0)
     */
    private $discountTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="total_tax", type="decimal", precision=8, scale=0)
     */
    private $totalTax;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_customer", referencedColumnName="id", nullable=false)
     * })
     */
    private $customer;

    /**
     * @var BillingAddress
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\BillingAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_billing_address", referencedColumnName="id", nullable=false)
     * })
     */
    private $billingAddress;

    /**
     * @var DeliveryAddress
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\DeliveryAddress")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_delivery_address", referencedColumnName="id", nullable=false)
     * })
     */
    private $deliveryAddress;

    /**
     * @var Beneficiary
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Beneficiary", inversedBy="orders", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_beneficiary", referencedColumnName="id", nullable=false)
     * })
     */
    private $beneficiary;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="Coupon", mappedBy="orders")
     */
    private $coupons;

    /**
     * @var ProductOrder
     *
     * @ORM\OneToMany(targetEntity="App\Entity\ProductOrder", mappedBy="order", orphanRemoval=true, cascade={"all"})
     */
    private $items;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->coupons = new ArrayCollection();
    }

}
