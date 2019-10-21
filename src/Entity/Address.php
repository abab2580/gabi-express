<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="ge_address", indexes={@ORM\Index(name="fk_association_16", columns={"id"})})
 * @ORM\Entity
 * @ORM\InheritanceType(value="JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"delivery"="DeliveryAddress", "billing"="BillingAddress", "provider"="ProviderAddress"})
 */
abstract class Address
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
     * @var string
     *
     * @ORM\Column(name="address1", type="string", length=254)
     */
    protected $address1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address2", type="string", length=254, nullable=true)
     */
    protected $address2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=254, nullable=true)
     */
    protected $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=254, nullable=true)
     */
    protected $email;

    /**
     * @var int|null
     *
     * @ORM\Column(name="postcode", type="integer", nullable=true)
     */
    protected $postcode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    protected $dateCreated;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
     */
    protected $dateModified;

    /**
     * @var City
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\City", inversedBy="addresses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_city", referencedColumnName="id", nullable=false)
     * })
     */
    private $city;

}
