<?php

namespace Grossum\ContactBundle\Admin;

use Grossum\ContactBundle\Entity\EntityManager\ContactManager;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Validator\Constraints\Valid;

class ContactAdmin extends Admin
{
    /** @var  ContactManager $contactManager */
    private $contactManager;

    /**
     * Fields to be shown on create/edit forms
     *
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, ['label' => 'Название'])
            ->add('googleMapsLink', null, ['label' => 'Код google maps'])
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
            ->addIdentifier('name', null, ['label' => 'Название']);
    }

    /**
     * @param ContactManager $contactManager
     */
    public function setContactManager(ContactManager $contactManager)
    {
        $this->contactManager = $contactManager;
    }
}
