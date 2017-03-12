<?php

namespace Hunter\EntityBundle\Form;

use Hunter\EntityBundle\Entity\ProductCategory;
use Sonata\CoreBundle\Form\Type\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductCategoryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'isActive',
                BooleanType::class,
                [
                    'transform' => true,
                    'expanded' => true,
                    'label' => 'backend.product_categories.labels.is_active',
                    'translation_domain' => 'messages'
                ]
            )
            ->add('name', TextType::class, ['label' => 'backend.product_categories.labels.name']);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ProductCategory::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hunter_entitybundle_productcategory';
    }


}
