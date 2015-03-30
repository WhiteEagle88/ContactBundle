<?php

namespace Grossum\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Grossum\CoreBundle\Entity\EntityTrait\DateTimeControlTrait;

/**
 * Contact
 */
class Contact
{
    use DateTimeControlTrait;

    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $googleMapsLink;

    /**
     * @var boolean
     */
    protected $enabled;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

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
     * @return Contact
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
     * Set googleMapsLink
     *
     * @param string $googleMapsLink
     * @return Contact
     */
    public function setGoogleMapsLink($googleMapsLink)
    {
        $this->googleMapsLink = $googleMapsLink;

        return $this;
    }

    /**
     * Get googleMapsLink
     *
     * @return string
     */
    public function getGoogleMapsLink()
    {
        return $this->googleMapsLink;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Contact
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Contact
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Contact
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName() ?: "Новый контакт";
    }
}
