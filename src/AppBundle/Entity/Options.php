<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Options
 *
 * @ORM\Table(name="options")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OptionsRepository")
 */
class Options
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
     * @ORM\Column(name="notes", type="integer")
     */
    private $notes=0;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;

    /**
     * Etat: new, utilisé, reconditioné
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=100)
     */
    private $state='new';

    /**
     * @var string
     *
     * @ORM\Column(name="ean", type="string", length=13)
     */
    private $ean;

    /**
     * Afficher l'état sur la fiche produit
     * 
     * @var boolean
     *
     * @ORM\Column(name="showcondition", type="boolean")
     */
    private $showcondition;
    /**
     * @var string
     *
     * @ORM\Column(name="isbn", type="string", length=32)
     */
    private $isbn;

    /**
     * @var string
     *
     * @ORM\Column(name="upc", type="string", length=32)
     */
    private $upc;

    /**
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Promo", cascade={"persist", "remove"})
     */
    private $promo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="favoris", type="boolean")
     */
    private $favoris;


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
     * Set notes
     *
     * @param integer $notes
     *
     * @return Options
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return int
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Options
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Options
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set promo
     *
     * @param string $promo
     *
     * @return Options
     */
    public function setPromo($promo)
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * Get promo
     *
     * @return string
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * Set favoris
     *
     * @param string $favoris
     *
     * @return Options
     */
    public function setFavoris($favoris)
    {
        $this->favoris = $favoris;

        return $this;
    }

    /**
     * Get favoris
     *
     * @return string
     */
    public function getFavoris()
    {
        return $this->favoris;
    }

    /**
     * Set ean
     *
     * @param string $ean
     *
     * @return Options
     */
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * Get ean
     *
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * Set showcondition
     *
     * @param boolean $showcondition
     *
     * @return Options
     */
    public function setShowcondition($showcondition)
    {
        $this->showcondition = $showcondition;

        return $this;
    }

    /**
     * Get showcondition
     *
     * @return boolean
     */
    public function getShowcondition()
    {
        return $this->showcondition;
    }

    /**
     * Set isbn
     *
     * @param string $isbn
     *
     * @return Options
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Set upc
     *
     * @param string $upc
     *
     * @return Options
     */
    public function setUpc($upc)
    {
        $this->upc = $upc;

        return $this;
    }

    /**
     * Get upc
     *
     * @return string
     */
    public function getUpc()
    {
        return $this->upc;
    }
}
