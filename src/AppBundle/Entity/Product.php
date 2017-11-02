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
     * @Assert\NotBlank(message="Champ  obligatoire")
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Marque", inversedBy="product")
     * @ORM\JoinColumn(name="MARQUE_id", referencedColumnName="id")
     */
    private $marque;

    /**
     * @ORM\OneToOne(targetEntity="Price", cascade={"persist", "remove"})
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="text")
     */
    private $slug;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alwaysonsale", type="boolean")
     */
    private $alwaysonsale;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="caracterisques", type="text")
     */
    private $caracterisques;
    /**
     * @var boolean
     *
     * @ORM\Column(name="venteenligne", type="boolean")
     */
    private $venteenligne=true;

    /**
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Options", cascade={"persist", "remove"})
     */
    private $options;
    /**
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Quantity", cascade={"persist", "remove"})
     */
    private $quantity;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="Image", mappedBy="product", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $images;





    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set caracterisques
     *
     * @param string $caracterisques
     *
     * @return Product
     */
    public function setCaracterisques($caracterisques)
    {
        $this->caracterisques = $caracterisques;

        return $this;
    }

    /**
     * Get caracterisques
     *
     * @return string
     */
    public function getCaracterisques()
    {
        return $this->caracterisques;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Product
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return Product
     */
    public function addImage(\AppBundle\Entity\Image $image)
    {
        $this->images[] = $image;
       $image->setProduct($this);
        return $this;
    }

    /**
     * Remove image
     *
     * @param \AppBundle\Entity\Image $image
     */
    public function removeImage(\AppBundle\Entity\Image $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set marque
     *
     * @param \AppBundle\Entity\Marque $marque
     *
     * @return Product
     */
    public function setMarque(\AppBundle\Entity\Marque $marque = null)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return \AppBundle\Entity\Marque
     */
    public function getMarque()
    {
        return $this->marque;
    }


    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Product
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set options
     *
     * @param \AppBundle\Entity\Options $options
     *
     * @return Product
     */
    public function setOptions(\AppBundle\Entity\Options $options )
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get options
     *
     * @return \AppBundle\Entity\Options
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set alwaysonsale
     *
     * @param boolean $alwaysonsale
     *
     * @return Product
     */
    public function setAlwaysonsale($alwaysonsale)
    {
        $this->alwaysonsale = $alwaysonsale;

        return $this;
    }

    /**
     * Get alwaysonsale
     *
     * @return boolean
     */
    public function getAlwaysonsale()
    {
        return $this->alwaysonsale;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Product
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set venteenligne
     *
     * @param boolean $venteenligne
     *
     * @return Product
     */
    public function setVenteenligne($venteenligne)
    {
        $this->venteenligne = $venteenligne;

        return $this;
    }

    /**
     * Get venteenligne
     *
     * @return boolean
     */
    public function getVenteenligne()
    {
        return $this->venteenligne;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Product
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set price
     *
     * @param \AppBundle\Entity\Price $price
     *
     * @return Product
     */
    public function setPrice(\AppBundle\Entity\Price $price = null)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return \AppBundle\Entity\Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set quantity
     *
     * @param \AppBundle\Entity\Quantity $quantity
     *
     * @return Product
     */
    public function setQuantity(\AppBundle\Entity\Quantity $quantity = null)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return \AppBundle\Entity\Quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}
