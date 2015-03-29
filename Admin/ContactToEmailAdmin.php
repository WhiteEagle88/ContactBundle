<?php

namespace Grossum\ContactBundle\Admin;

use Grossum\ContactBundle\Entity\ContactToEmail;
use Grossum\ContactBundle\Entity\EntityManager\ContactToEmailManager;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactToEmailAdmin extends Admin
{
    /** @var  ContactToEmailManager $contactToEmailManager */
    private $contactToEmailManager;

    /**
     * Fields to be shown on create/edit forms
     *
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('email', null, ['label' => 'E-Mail'])
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
            ->addIdentifier('email', null, ['label' => 'E-Mail'])
            ->add('contact', null, ['label' => 'Контакт'])
            ->add('enabled', null, ['label' => 'Включен']);
    }

    /**
     * @param ContactToEmailManager $contactToEmailManager
     */
    public function setContactToEmailManager(ContactToEmailManager $contactToEmailManager)
    {
        $this->contactToEmailManager = $contactToEmailManager;
    }


    /**
     * @param ErrorElement $errorElement
     * @param ContactToEmail $object
     */
    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('email')
            ->addConstraint(new NotBlank(['message' => 'Поле e-mail не может быть пустым']))
            ->end();
    }
}
