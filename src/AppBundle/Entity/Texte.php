<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * texte
 *
 * @ORM\Table(name="texte")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\texteRepository")
 */
class Texte
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="textFontSize", type="string", length=255)
     */
    private $textFontSize;

    /**
     * @var string
     *
     * @ORM\Column(name="textFontLine", type="string", length=255)
     */
    private $textFontLine;

    /**
     * @var string
     *
     * @ORM\Column(name="textFontFamily", type="string", length=255)
     */
    private $textFontFamily;

    /**
     * @var string
     *
     * @ORM\Column(name="textFontColor", type="string", length=255)
     */
    private $textFontColor;

    /**
     * @var string
     *
     * @ORM\Column(name="$textYPos", type="string", length=255)
     */
    private $textYPos;

    /**
     * @var string
     *
     * @ORM\Column(name="textAnimation", type="string", length=255)
     */
    private $textAnimation;

    /**
     * @var int
     *
     * @ORM\Column(name="textAnimationDelay", type="integer")
     */
    private $textAnimationDelay;
    /**
     * @var string
     *
     * @ORM\Column(name="textClass", type="string", length=255)
     */
    private $textClass;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Slider", inversedBy="texte", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="slide_id", referencedColumnName="id")

     */
    private $slider;


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
     * Set name
     *
     * @param string $name
     *
     * @return Texte
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
     * Set textFontSize
     *
     * @param string $textFontSize
     *
     * @return Texte
     */
    public function setTextFontSize($textFontSize)
    {
        $this->textFontSize = $textFontSize;

        return $this;
    }

    /**
     * Get textFontSize
     *
     * @return string
     */
    public function getTextFontSize()
    {
        return $this->textFontSize;
    }

    /**
     * Set textFontLine
     *
     * @param string $textFontLine
     *
     * @return Texte
     */
    public function setTextFontLine($textFontLine)
    {
        $this->textFontLine = $textFontLine;

        return $this;
    }

    /**
     * Get textFontLine
     *
     * @return string
     */
    public function getTextFontLine()
    {
        return $this->textFontLine;
    }

    /**
     * Set textFontFamily
     *
     * @param string $textFontFamily
     *
     * @return Texte
     */
    public function setTextFontFamily($textFontFamily)
    {
        $this->textFontFamily = $textFontFamily;

        return $this;
    }

    /**
     * Get textFontFamily
     *
     * @return string
     */
    public function getTextFontFamily()
    {
        return $this->textFontFamily;
    }

    /**
     * Set textFontColor
     *
     * @param string $textFontColor
     *
     * @return Texte
     */
    public function setTextFontColor($textFontColor)
    {
        $this->textFontColor = $textFontColor;

        return $this;
    }

    /**
     * Get textFontColor
     *
     * @return string
     */
    public function getTextFontColor()
    {
        return $this->textFontColor;
    }

    /**
     * Set textYPos
     *
     * @param string $textYPos
     *
     * @return Texte
     */
    public function setTextYPos($textYPos)
    {
        $this->textYPos = $textYPos;

        return $this;
    }

    /**
     * Get textYPos
     *
     * @return string
     */
    public function getTextYPos()
    {
        return $this->textYPos;
    }

    /**
     * Set textAnimation
     *
     * @param string $textAnimation
     *
     * @return Texte
     */
    public function setTextAnimation($textAnimation)
    {
        $this->textAnimation = $textAnimation;

        return $this;
    }

    /**
     * Get textAnimation
     *
     * @return string
     */
    public function getTextAnimation()
    {
        return $this->textAnimation;
    }

    /**
     * Set textAnimationDelay
     *
     * @param integer $textAnimationDelay
     *
     * @return Texte
     */
    public function setTextAnimationDelay($textAnimationDelay)
    {
        $this->textAnimationDelay = $textAnimationDelay;

        return $this;
    }

    /**
     * Get textAnimationDelay
     *
     * @return integer
     */
    public function getTextAnimationDelay()
    {
        return $this->textAnimationDelay;
    }

    /**
     * Set textClass
     *
     * @param string $textClass
     *
     * @return Texte
     */
    public function setTextClass($textClass)
    {
        $this->textClass = $textClass;

        return $this;
    }

    /**
     * Get textClass
     *
     * @return string
     */
    public function getTextClass()
    {
        return $this->textClass;
    }

    /**
     * Set slider
     *
     * @param \AppBundle\Entity\Slider $slider
     *
     * @return Texte
     */
    public function setSlider(\AppBundle\Entity\Slider $slider)
    {
        $this->slider = $slider;
        return $this;
    }

    /**
     * Get slider
     *
     * @return \AppBundle\Entity\Slider
     */
    public function getSlider()
    {
        return $this->slider;
    }
}
