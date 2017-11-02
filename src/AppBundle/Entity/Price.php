<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Price
 *
 * @ORM\Table(name="price")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PriceRepository")
 */
class Price
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
     * @var float
     *
     * @ORM\Column(name="pricemin", type="float")
     */
    private $pricemin;

    /**
     * @var float
     *
     * @ORM\Column(name="unitprice", type="float")
     */
    private $unitprice;

    /**
     * Type d'unité: kg/litre
     * @var string
     *
     * @ORM\Column(name="unity", type="string")
     */
    private $unity;
    /**
     * @var integer
     *
     * @ORM\Column(name="taxrules", type="integer")
     */
    private $taxrules;

    /**
     * @var float
     *
     * @ORM\Column(name="pricemax", type="float")
     */
    private $pricemax;
    /**
     * Prix d'achat
     * @var float
     *
     * @ORM\Column(name="wholesaleprice", type="float")
     */
    private $wholesaleprice;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=255)
     */
    private $currency="EUR";


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
     * Set pricemin
     *
     * @param float $pricemin
     *
     * @return Price
     */
    public function setPricemin($pricemin)
    {
        $this->pricemin = $pricemin;

        return $this;
    }

    /**
     * Get pricemin
     *
     * @return float
     */
    public function getPricemin()
    {
        return $this->pricemin;
    }

    /**
     * Set pricemax
     *
     * @param float $pricemax
     *
     * @return Price
     */
    public function setPricemax($pricemax)
    {
        $this->pricemax = $pricemax;

        return $this;
    }

    /**
     * Get pricemax
     *
     * @return float
     */
    public function getPricemax()
    {
        return $this->pricemax;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Price
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set unitprice
     *
     * @param float $unitprice
     *
     * @return Price
     */
    public function setUnitprice($unitprice)
    {
        $this->unitprice = $unitprice;

        return $this;
    }

    /**
     * Get unitprice
     *
     * @return float
     */
    public function getUnitprice()
    {
        return $this->unitprice;
    }

    /**
     * Set unity
     *
     * @param string $unity
     *
     * @return Price
     */
    public function setUnity($unity)
    {
        $this->unity = $unity;

        return $this;
    }

    /**
     * Get unity
     *
     * @return string
     */
    public function getUnity()
    {
        return $this->unity;
    }

    /**
     * Set taxrules
     *
     * @param integer $taxrules
     *
     * @return Price
     */
    public function setTaxrules($taxrules)
    {
        $this->taxrules = $taxrules;

        return $this;
    }

    /**
     * Get taxrules
     *
     * @return integer
     */
    public function getTaxrules()
    {
        return $this->taxrules;
    }

    /**
     * Set wholesaleprice
     *
     * @param float $wholesaleprice
     *
     * @return Price
     */
    public function setWholesaleprice($wholesaleprice)
    {
        $this->wholesaleprice = $wholesaleprice;

        return $this;
    }

    /**
     * Get wholesaleprice
     *
     * @return float
     */
    public function getWholesaleprice()
    {
        return $this->wholesaleprice;
    }
}
