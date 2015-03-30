<?php

namespace Grossum\ContactBundle\Admin;

use Grossum\ContactBundle\Entity\Email;
use Grossum\ContactBundle\Entity\EntityManager\EmailManager;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Symfony\Component\Validator\Constraints\NotBlank;

class EmailAdmin extends Admin
{
    /** @var  EmailManager $emailManager */
    private $emailManager;

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
     * @param EmailManager $emailManager
     */
    public function setEmailManager(EmailManager $emailManager)
    {
        $this->emailManager = $emailManager;
    }


    /**
     * @param ErrorElement $errorElement
     * @param Email $object
     */
    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('email')
            ->addConstraint(new NotBlank(['message' => 'Поле e-mail не может быть пустым']))
            ->end();
    }
}
