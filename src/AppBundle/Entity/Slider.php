<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Slider
 *
 * @ORM\Table(name="slider")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SliderRepository")
 */
class Slider
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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image", mappedBy="slider", cascade={"persist", "remove"})
     * @Assert\NotBlank(message="*Pour un slider il faut absolument une image")
     */
    private $figure;

    /**
     * @var string
     *
     * @ORM\Column(name="datahref", type="string", length=255)
     */
    private $datahref;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Texte", mappedBy="slider", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="text_id", referencedColumnName="id")

     */
    private $texte;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->texte = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datahref
     *
     * @param string $datahref
     *
     * @return Slider
     */
    public function setDatahref($datahref)
    {
        $this->datahref = $datahref;

        return $this;
    }

    /**
     * Get datahref
     *
     * @return string
     */
    public function getDatahref()
    {
        return $this->datahref;
    }

    /**
     * Set figure
     *
     * @param \AppBundle\Entity\Image $figure
     *
     * @return Slider
     */
    public function setFigure(\AppBundle\Entity\Image $figure = null)
    {
        $this->figure = $figure;
        $figure->setSlider($this);
        return $this;
    }

    /**
     * Get figure
     *
     * @return \AppBundle\Entity\Image
     */
    public function getFigure()
    {
        return $this->figure;
    }

    /**
     * Add texte
     *
     * @param \AppBundle\Entity\Texte $texte
     *
     * @return Slider
     */
    public function addTexte(\AppBundle\Entity\Texte $texte)
    {
        $this->texte[] = $texte;
        $texte->setSlider($this);
        return $this;
    }

    /**
     * Remove texte
     *
     * @param \AppBundle\Entity\Texte $texte
     */
    public function removeTexte(\AppBundle\Entity\Texte $texte)
    {
        $this->texte->removeElement($texte);
    }

    /**
     * Get texte
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTexte()
    {
        return $this->texte;
    }
}
