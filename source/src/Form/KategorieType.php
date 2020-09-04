<?php

namespace App\Form;

use App\Entity\Kategorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nazev')
            ->add('Id_podkat')
            ->add('kategories')
            ->add('polozka')
            ->add('Stitek')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kategorie::class,
        ]);
    }
}
