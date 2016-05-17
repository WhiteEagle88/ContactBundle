<?php

namespace Grossum\ContactBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

use Grossum\ContactBundle\Form\Type\GoogleMapType;

class ContactAdmin extends Admin
{
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, ['label' => 'grossum_contact.admin.contact.name'])
            ->add('googleMapCoordinates', GoogleMapType::class, [
                'label' => 'grossum_contact.admin.contact.google_maps_code',
                'required' => false,
            ])
            ->add('enabled', null, ['label' => 'grossum_contact.admin.enabled', 'required' => false])
            ->add(
                'phones',
                'sonata_type_collection',
                [
                    'label' => 'grossum_contact.admin.phone.label'
                ],
                [
                    'edit' => 'inline',
                    'inline' => 'table',
                ]
            )
            ->add(
                'emails',
                'sonata_type_collection',
                [
                    'label' => 'grossum_contact.admin.email.label'
                ],
                [
                    'edit' => 'inline',
                    'inline' => 'table',
                ]
            );
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
            ->addIdentifier('name', null, ['label' => 'grossum_contact.admin.contact.name']);
    }
}
