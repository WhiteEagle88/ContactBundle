<?php

namespace Grossum\ContactBundle\Entity\EntityManager;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

use Grossum\CoreBundle\Entity\EntityTrait\SaveUpdateInManagerTrait;

class ContactManager
{
    use SaveUpdateInManagerTrait;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var ObjectRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * @param ObjectManager $objectManager
     * @param string $class
     */
    public function __construct(ObjectManager $objectManager, $class)
    {
        $this->objectManager = $objectManager;
        $this->class = $class;
    }

    public function getRepository()
    {
        if (!$this->repository) {
            $this->repository = $this->objectManager->getRepository($this->class);
        }

        return $this->repository;
    }
}
