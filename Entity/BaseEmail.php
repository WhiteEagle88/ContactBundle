<?php

namespace Grossum\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Grossum\CoreBundle\Entity\EntityTrait\DateTimeControlTrait;

abstract class BaseEmail
{
    use DateTimeControlTrait;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @var BaseContact
     */
    protected $contact;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * Set email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param BaseContact $contact
     * @return $this
     */
    public function setContact(BaseContact $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return BaseContact
     */
    protected function getContact()
    {
        return $this->contact;
    }

    /**
     * Set enabled
     *
     * @param bool $enabled
     * @return $this
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return $this
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
     * @return $this
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
        return $this->getEmail() ?: 'New Email';
    }
}
