<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductImage
 *
 * @ORM\Table(name="ge_product_image", indexes={@ORM\Index(name="fk_association_12", columns={"id_product"})})
 * @ORM\Entity
 */
class ProductImage
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
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product", referencedColumnName="id", nullable=false)
     * })
     */
    private $product;

}
