<?php

namespace Grossum\ContactBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EmailAdmin extends Admin
{
    /**
     * {@inheritdocå}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('email', null, ['label' => 'grossum_contact.admin.email.label'])
            ->add('enabled', null, ['label' => 'grossum_contact.admin.enabled', 'required' => false]);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('enabled', null, ['label' => 'grossum_contact.admin.enabled']);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('email', null, ['label' => 'grossum_contact.admin.email.label'])
            ->add('enabled', null, ['label' => 'grossum_contact.admin.enabled']);
    }
}
