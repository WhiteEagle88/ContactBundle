<?php

namespace Grossum\ContactBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Exception\LogicException;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class GrossumContactExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (!class_exists('Grossum\CoreBundle\GrossumCoreBundle')) {
            throw new LogicException('GrossumContactBundle required GrossumCoreBundle');
        }

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('admin.yml');
        $loader->load('classes.yml');

        $this->configureParameterClass($container, $config);
    }

    /**
     * @param ContainerBuilder $container
     * @param $config
     */
    public function configureParameterClass(ContainerBuilder $container, array $config)
    {
        $container->setParameter('grossum_contact.contact.entity.class', $config['class']['contact']);
        $container->setParameter('grossum_contact.email.entity.class', $config['class']['email']);
        $container->setParameter('grossum_contact.phone.entity.class', $config['class']['phone']);
    }

    /**
     * @param array $config
     */
    public function registerDoctrineMapping(array $config)
    {
        $collector = DoctrineCollector::getInstance();

        $collector->addAssociation($config['class']['media'], 'mapOneToMany', array(
            'fieldName'     => 'galleryHasMedias',
            'targetEntity'  => $config['class']['gallery_has_media'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => 'media',
            'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['gallery_has_media'], 'mapManyToOne', array(
            'fieldName'     => 'gallery',
            'targetEntity'  => $config['class']['gallery'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => null,
            'inversedBy'    => 'galleryHasMedias',
            'joinColumns'   => array(
                array(
                    'name'                 => 'gallery_id',
                    'referencedColumnName' => 'id',
                ),
            ),
            'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['gallery_has_media'], 'mapManyToOne', array(
            'fieldName'     => 'media',
            'targetEntity'  => $config['class']['media'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => null,
            'inversedBy'    => 'galleryHasMedias',
            'joinColumns'   => array(
                array(
                    'name'                 => 'media_id',
                    'referencedColumnName' => 'id',
                ),
            ),
            'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['gallery'], 'mapOneToMany', array(
            'fieldName'     => 'galleryHasMedias',
            'targetEntity'  => $config['class']['gallery_has_media'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => 'gallery',
            'orphanRemoval' => true,
            'orderBy'       => array(
                'position'  => 'ASC',
            ),
        ));
    }
}
