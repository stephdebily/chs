<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du produit',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Tapez le nom du produit']
            ])
            ->add('shortDescription', TextType::class, [
                'label' => 'Description courte',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Tapez une description courte mais parlante pour le visiteur']
            ])
            ->add('price', MoneyType::class, [
                'label' => 'Prix du produit',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Tapez le prix du produit']
            ])

            ->add('stock', IntegerType::class, [
                'label' => 'Stock',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Tapez la quantité en stock du produit']
            ])

            ->add('picture', UrlType::class, [
                'label' => 'Image du produit',
                'attr' => ['placeholder' => 'Tapez une URL d\'image']
            ])
            ->add('category', EntityType::class, [
                'label' => 'Catégorie',
                'attr' => ['class' => 'form-control'],
                'placeholder' => '-- Choisir une catégorie --',
                'class' => Category::class,
                'choice_label' => 'name'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
