<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProviderAddress
 *
 * @ORM\Table(name="ge_provider_address")
 * @ORM\Entity
 */
class ProviderAddress extends Address
{
    /**
     * @var Address
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;


}
