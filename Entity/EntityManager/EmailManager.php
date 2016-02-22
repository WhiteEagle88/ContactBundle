<?php

namespace Grossum\ContactBundle\Entity\EntityManager;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;

use Grossum\CoreBundle\Entity\EntityTrait\SaveUpdateInManagerTrait;

class EmailManager
{
    use SaveUpdateInManagerTrait;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var ObjectRepository
     */
    protected $repository;

    /**
     * @var ObjectManager
     */
    private $objectManager;

    public function __construct(ObjectManager $objectManager, $class)
    {
        $this->objectManager = $objectManager;
        $this->class = $class;
    }
}
