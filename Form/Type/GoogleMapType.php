<?php

namespace Grossum\ContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GoogleMapType extends AbstractType
{
    /**
     * @var string
     */
    protected $googleJavascriptApiKey;

    /**
     * @param string $googleJavascriptApiKey
     */
    public function __construct($googleJavascriptApiKey)
    {
        $this->googleJavascriptApiKey = $googleJavascriptApiKey;
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['type']                   = $options['type'];
        $view->vars['googleJavascriptApiKey'] = $this->googleJavascriptApiKey;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('type', 'hidden');
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return TextType::class;
    }
}
