<?php

namespace Grossum\ContactBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

use Grossum\CoreBundle\Entity\EntityTrait\DateTimeControlTrait;

abstract class BaseContact
{
    use DateTimeControlTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $googleMapsLink;

    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @var BaseEmail[]|ArrayCollection
     */
    protected $emails;

    /**
     * @var BasePhone[]|ArrayCollection
     */
    protected $phones;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    public function __construct()
    {
        $this->emails = new ArrayCollection();
        $this->phones = new ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BaseContact
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
     * @return BaseContact
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
     * @param bool $enabled
     * @return BaseContact
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param BaseEmail $email
     * @return $this
     */
    public function addEmail(BaseEmail $email)
    {
        $this->emails[] = $email;

        return $this;
    }

    /**
     * @param BaseEmail $email
     */
    public function removeEmail(BaseEmail $email)
    {
        $this->emails->removeElement($email);
    }

    /**
     * @return ArrayCollection|BaseEmail[]
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param BasePhone $phone
     * @return $this
     */
    public function addPhone(BasePhone $phone)
    {
        $this->phones[] = $phone;

        return $this;
    }

    /**
     * @param BasePhone $phone
     */
    public function removePhone(BasePhone $phone)
    {
        $this->phones->removeElement($phone);
    }

    /**
     * @return ArrayCollection|BasePhone[]
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return BaseContact
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
     * @return BaseContact
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
        return $this->getName() ?: "New Contact";
    }
}
