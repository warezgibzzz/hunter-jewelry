<?php

namespace Hunter\EntityBundle\Form;

use Braincrafted\Bundle\BootstrapBundle\Form\Type\MoneyType;
use Hunter\EntityBundle\Entity\Product;
use Hunter\EntityBundle\Entity\ProductCategory;
use Sonata\CoreBundle\Form\Type\BooleanType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
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
                    'label' => 'backend.products.labels.is_active',
                    'translation_domain' => 'messages'
                ]
            )
            ->add(
                'isFeatured',
                BooleanType::class,
                [
                    'transform' => true,
                    'expanded' => true,
                    'label' => 'backend.products.labels.is_featured',
                    'translation_domain' => 'messages'
                ]
            )
            ->add('name', TextType::class, ['label' => 'backend.products.labels.name'])
            ->add(
                'category',
                EntityType::class,
                [
                    'class' => ProductCategory::class,
                    'choice_label' => 'name',
                    'label' => 'backend.products.labels.category'
                ]
            )
            ->add(
                'price',
                MoneyType::class,
                [
                    'currency' => 'RUB',
                    'divisor' => 100,
                    'label' => 'backend.products.labels.price'
                ]
            )
            ->add('description', TextareaType::class, ['label' => 'backend.products.labels.description']);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Product::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hunter_entitybundle_product';
    }


}
