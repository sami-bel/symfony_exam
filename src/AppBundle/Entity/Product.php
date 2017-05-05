<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(max=200)
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(max=200)
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var float
     * @Assert\NotBlank()
     * @Assert\Length(max=200)
     * @ORM\Column(name="purchasing_price", type="float")
     */
    private $purchasingPrice;

    /**
     * @var float
     * @Assert\NotBlank()
     * @Assert\Length(max=200)
     * @ORM\Column(name="selling_price", type="float")
     */
    private $sellingPrice;

    /**
     * @var float
     * @Assert\NotBlank()
     * @Assert\Length(max=200)
     * @ORM\Column(name="tva_rate", type="float")
     */
    private $tvaRate;
    /**
     *
     * @var boolean
     * @ORM\Column(name="in_stock", type="boolean", nullable = true)
     */
    private $inStock;

    /**
     * Product constructor.
     *
     */
    public function __construct()
    {
        $this->inStock = false;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Product
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set purchasingPrice
     *
     * @param float $purchasingPrice
     *
     * @return Product
     */
    public function setPurchasingPrice($purchasingPrice)
    {
        $this->purchasingPrice = $purchasingPrice;

        return $this;
    }

    /**
     * Get purchasingPrice
     *
     * @return float
     */
    public function getPurchasingPrice()
    {
        return $this->purchasingPrice;
    }

    /**
     * Set sellingPrice
     *
     * @param float $sellingPrice
     *
     * @return Product
     */
    public function setSellingPrice($sellingPrice)
    {
        $this->sellingPrice = $sellingPrice;

        return $this;
    }

    /**
     * Get sellingPrice
     *
     * @return float
     */
    public function getSellingPrice()
    {
        return $this->sellingPrice;
    }

    /**
     * Set tvaRate
     *
     * @param float $tvaRate
     *
     * @return Product
     */
    public function setTvaRate($tvaRate)
    {
        $this->tvaRate = $tvaRate;

        return $this;
    }

    /**
     * Get tvaRate
     *
     * @return float
     */
    public function getTvaRate()
    {
        return $this->tvaRate;
    }

    /**
     * @param Boolean $inStock
     * @return $this
     */
    public function setInStock($inStock){
        $this->inStock = $inStock;
        return $this;
    }

    /**
     * @return bool
     */
    public function getInStock(){
        return $this->inStock;
    }
}

