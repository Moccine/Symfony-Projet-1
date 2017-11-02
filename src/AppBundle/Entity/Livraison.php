<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * livraison
 *
 * @ORM\Table(name="livraison")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\livraisonRepository")
 */
class Livraison
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
     *
     * @ORM\Column(name="width", type="decimal", precision=20, scale=6)
     */
    private $width;

    /**
     * @var string
     *
     * @ORM\Column(name="height", type="decimal", precision=20, scale=6)
     */
    private $height;

    /**
     * @var string
     *
     * @ORM\Column(name="depth", type="decimal", precision=20, scale=6)
     */
    private $depth;

    /**
     * @var float
     *
     * @ORM\Column(name="additionalshippingcost", type="float")
     */
    private $additionalshippingcost;

    /**
     * @var bool
     *
     * @ORM\Column(name="selectedcarriers", type="boolean")
     */
    private $selectedcarriers;


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
     * Set width
     *
     * @param string $width
     *
     * @return livraison
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param string $height
     *
     * @return livraison
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set depth
     *
     * @param string $depth
     *
     * @return livraison
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * Get depth
     *
     * @return string
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Set additionalshippingcost
     *
     * @param float $additionalshippingcost
     *
     * @return livraison
     */
    public function setAdditionalshippingcost($additionalshippingcost)
    {
        $this->additionalshippingcost = $additionalshippingcost;

        return $this;
    }

    /**
     * Get additionalshippingcost
     *
     * @return float
     */
    public function getAdditionalshippingcost()
    {
        return $this->additionalshippingcost;
    }

    /**
     * Set selectedcarriers
     *
     * @param boolean $selectedcarriers
     *
     * @return livraison
     */
    public function setSelectedcarriers($selectedcarriers)
    {
        $this->selectedcarriers = $selectedcarriers;

        return $this;
    }

    /**
     * Get selectedcarriers
     *
     * @return bool
     */
    public function getSelectedcarriers()
    {
        return $this->selectedcarriers;
    }
}
