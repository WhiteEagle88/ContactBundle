<?php

namespace Grossum\ContactBundle\Admin;

use Grossum\ContactBundle\Entity\EntityManager\PhoneManager;
use Grossum\ContactBundle\Entity\Phone;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Symfony\Component\Validator\Constraints\NotBlank;

class PhoneAdmin extends Admin
{
    /** @var  PhoneManager $phoneManager */
    private $phoneManager;

    /**
     * Fields to be shown on create/edit forms
     *
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('phone', null, ['label' => 'Телефон'])
            ->add('contact', null, ['label' => 'Контакт'])
            ->add('enabled', null, ['label' => 'Включен', 'required' => false]);
    }

    /**
     * Fields to be shown on filter forms
     *
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('enabled', null, ['label' => 'Включен']);
    }

    /**
     * Fields to be shown on lists
     *
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('phone', null, ['label' => 'Телефон'])
            ->add('contact', null, ['label' => 'Контакт'])
            ->add('enabled', null, ['label' => 'Включен']);
    }

    /**
     * @param PhoneManager $phoneManager
     */
    public function setPhoneManager(PhoneManager $phoneManager)
    {
        $this->phoneManager = $phoneManager;
    }


    /**
     * @param ErrorElement $errorElement
     * @param Phone $object
     */
    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('phone')
            ->addConstraint(new NotBlank(['message' => 'Поле телефон не может быть пустым']))
            ->end();
    }
}
