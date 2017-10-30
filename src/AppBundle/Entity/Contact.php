<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="contactname", type="string", length=255)
     */
    private $contactname;

    /**
     * @var string
     *
     * @ORM\Column(name="emailfrom", type="string", length=255)
     */
    private $emailfrom;

    /**
     * @var string
     *
     * @ORM\Column(name="emailsend", type="string", length=255)
     */
    private $emailsend;

    /**
     * @var string
     *
     * @ORM\Column(name="contactbody", type="text")
     */
    private $contactbody;


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
     * Set emailfrom
     *
     * @param string $emailfrom
     *
     * @return Contact
     */
    public function setEmailfrom($emailfrom)
    {
        $this->emailfrom = $emailfrom;

        return $this;
    }

    /**
     * Get emailfrom
     *
     * @return string
     */
    public function getEmailfrom()
    {
        return $this->emailfrom;
    }

    /**
     * Set emailsend
     *
     * @param string $emailsend
     *
     * @return Contact
     */
    public function setEmailsend($emailsend)
    {
        $this->emailsend = $emailsend;

        return $this;
    }

    /**
     * Get emailsend
     *
     * @return string
     */
    public function getEmailsend()
    {
        return $this->emailsend;
    }

    /**
     * Set contactbody
     *
     * @param string $contactbody
     *
     * @return Contact
     */
    public function setContactbody($contactbody)
    {
        $this->contactbody = $contactbody;

        return $this;
    }

    /**
     * Get contactbody
     *
     * @return string
     */
    public function getContactbody()
    {
        return $this->contactbody;
    }

    /**
     * Set contactname
     *
     * @param string $contactname
     *
     * @return Contact
     */
    public function setContactname($contactname)
    {
        $this->contactname = $contactname;

        return $this;
    }

    /**
     * Get contactname
     *
     * @return string
     */
    public function getContactname()
    {
        return $this->contactname;
    }
}
