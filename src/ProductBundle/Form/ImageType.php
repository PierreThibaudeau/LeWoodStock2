<?php

namespace ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use ProductBundle\Entity\Product;
use ProductBundle\Entity\Image;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ImageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('product', EntityType::class, [
              'label'        => 'Produit associé',
              'class'        => Product::class,
              'choice_label' => 'designation',
            ])
          ->add('designation', null, [
            'label' => 'Désignation',
          ])
            ->add('url', 'file', [                   //type piece jointe
                'constraints' => [
                    new Assert\File([
                        'mimeTypes' => ["image/jpeg","image/jpg","image/png"],
                    ]),
                ],
            ])
            ->add('alt');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Image::class,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'productbundle_image';
    }


}
