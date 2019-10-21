<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientImage
 *
 * @ORM\Table(name="ge_customer_image", indexes={@ORM\Index(name="fk_association_13", columns={"id_customer"})})
 * @ORM\Entity
 */
class CustomerImage extends Image
{

    /**
     * @var Image
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_customer", referencedColumnName="id", nullable=false)
     * })
     */
    private $customer;


}
