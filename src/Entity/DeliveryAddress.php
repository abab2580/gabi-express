<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeliveryAddress
 *
 * @ORM\Table(name="ge_delivery_address")
 * @ORM\Entity
 */
class DeliveryAddress extends Address
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;


}
