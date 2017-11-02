<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImageRepository")
 * @Vich\Uploadable
 *
 */
class Image
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
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="filename")
     * @Assert\File(maxSize = "10M")
     *
     * @var File
     */
    private $file;

    /**
     * @var string
     * @Assert\NotBlank(message="filename obligatoire")
     * @ORM\Column(name="filename", type="string", length=100)
     */
    private $filename;

    /**
     * @var string
     * @Assert\NotBlank(message="Champ Obligatoire")
     * @ORM\Column(name="alt", type="string", length=100)
     */
    private $alt;

    /**
     * @var \DateTime
     * @ORM\Column(name="updateAt", type="datetimetz")
     */
    private $updateAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetimetz")
     */
    private $createdAt;


    /**
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="images")
     */
    private $user;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="images", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $product;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Slider", inversedBy="figure", cascade={"persist", "remove"})
     */
    private $slider;

    /**
     * Image constructor.
     * @param \DateTime $updateAt
     * @param \DateTime $createdAt
     */
    public function __construct()
    {
        $this->updateAt = new \DateTime('now');
        $this->createdAt = new \DateTime('now');
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
     * Set filename
     *
     * @param string $filename
     *
     * @return Image
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Image
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Image
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set file
     *
     * @param string $file
     *
     * @return Image
     */
    public function setFile($file)
    {
        $this->file = $file;
        if ($file) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * Get file
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Image
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set product
     *
     * @param string $product
     *
     * @return Image
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }


    /**
     * Set slider
     *
     * @param \AppBundle\Entity\Slider $slider
     *
     * @return Image
     */
    public function setSlider(\AppBundle\Entity\Slider $slider = null)
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
