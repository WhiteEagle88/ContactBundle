<?php

namespace Grossum\ContactBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PhoneAdmin extends Admin
{
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('phone', null, ['label' => 'grossum_contact.admin.phone.label'])
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
            ->addIdentifier('phone', null, ['label' => 'grossum_contact.admin.phone.label'])
            ->add('enabled', null, ['label' => 'grossum_contact.admin.enabled']);
    }
}
