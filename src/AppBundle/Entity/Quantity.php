<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quantity
 *
 * @ORM\Table(name="quantity")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuantityRepository")
 */
class Quantity
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
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var int
     *
     * @ORM\Column(name="minimalquantity", type="integer")
     */
    private $minimalquantity;

    /**
     * Préférences de disponibilité
     * 1- Refuser les commandes
     * 2- Accepter les commandes
     * 3- Utiliser le comportement par défaut (Refuser les commandes)
     * @var int
     *
     * @ORM\Column(name="outofstock", type="integer")
     */
    private $outofstock;
    /**
     * Libellé si en stock
     *
     * @var string
     *
     * @ORM\Column(name="availablenow", type="string")
     */
    private $availablenow;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="availabledate", type="datetimetz")
     */
    private $availabledate;

    /**
     * Si rupture de stock (et précommande autorisée)
     *
     * @var string
     *
     * @ORM\Column(name="availablelater", type="string", length=255)
     */
    private $availablelater;

    /**
     * Quantity constructor.
     * @param \DateTime $availabledate
     */
    public function __construct()
    {
        $this->availabledate = new \DateTime('now');
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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set minimalquantity
     *
     * @param integer $minimalquantity
     *
     * @return Quantity
     */
    public function setMinimalquantity($minimalquantity)
    {
        $this->minimalquantity = $minimalquantity;

        return $this;
    }

    /**
     * Get minimalquantity
     *
     * @return int
     */
    public function getMinimalquantity()
    {
        return $this->minimalquantity;
    }

    /**
     * Set outofstock
     *
     * @param integer $outofstock
     *
     * @return Quantity
     */
    public function setOutofstock($outofstock)
    {
        $this->outofstock = $outofstock;

        return $this;
    }

    /**
     * Get outofstock
     *
     * @return int
     */
    public function getOutofstock()
    {
        return $this->outofstock;
    }

    /**
     * Set availabledate
     *
     * @param \DateTime $availabledate
     *
     * @return Quantity
     */
    public function setAvailabledate($availabledate)
    {
        $this->availabledate = $availabledate;

        return $this;
    }

    /**
     * Get availabledate
     *
     * @return \DateTime
     */
    public function getAvailabledate()
    {
        return $this->availabledate;
    }

    /**
     * Set availablelater
     *
     * @param string $availablelater
     *
     * @return Quantity
     */
    public function setAvailablelater($availablelater)
    {
        $this->availablelater = $availablelater;

        return $this;
    }

    /**
     * Get availablelater
     *
     * @return string
     */
    public function getAvailablelater()
    {
        return $this->availablelater;
    }

    /**
     * Set availablenow
     *
     * @param string $availablenow
     *
     * @return Quantity
     */
    public function setAvailablenow($availablenow)
    {
        $this->availablenow = $availablenow;

        return $this;
    }

    /**
     * Get availablenow
     *
     * @return string
     */
    public function getAvailablenow()
    {
        return $this->availablenow;
    }
}
