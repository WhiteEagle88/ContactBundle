<?php

namespace Grossum\ContactBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Exception\LogicException;

use Sonata\EasyExtendsBundle\Mapper\DoctrineCollector;

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
        $this->registerDoctrineMapping($config);
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

        $container->setParameter('grossum_contact.google_javascript_api_key', $config['google_javascript_api_key']);
    }

    /**
     * @param array $config
     */
    public function registerDoctrineMapping(array $config)
    {
        $collector = DoctrineCollector::getInstance();

        $collector->addAssociation($config['class']['email'], 'mapManyToOne', array(
            'fieldName'     => 'contact',
            'targetEntity'  => $config['class']['contact'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => null,
            'inversedBy'    => 'emails',
            'joinColumns'   => array(
                array(
                    'name'                 => 'contact_id',
                    'referencedColumnName' => 'id',
                ),
            ),
            'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['phone'], 'mapManyToOne', array(
            'fieldName'     => 'contact',
            'targetEntity'  => $config['class']['contact'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => null,
            'inversedBy'    => 'phones',
            'joinColumns'   => array(
                array(
                    'name'                 => 'contact_id',
                    'referencedColumnName' => 'id',
                ),
            ),
            'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['contact'], 'mapOneToMany', array(
            'fieldName'     => 'emails',
            'targetEntity'  => $config['class']['email'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => 'contact',
            'orphanRemoval' => false,
        ));

        $collector->addAssociation($config['class']['contact'], 'mapOneToMany', array(
            'fieldName'     => 'phones',
            'targetEntity'  => $config['class']['phone'],
            'cascade'       => array(
                'persist',
            ),
            'mappedBy'      => 'contact',
            'orphanRemoval' => false,
        ));
    }
}
