<?php

namespace App\Form;

use App\Entity\Polozka;
use App\Entity\Stitek;
use App\Repository\StitekRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterFixniHodnotaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nazev', EntityType::class, array (
                'class' => Stitek::class,
                'query_builder' =>  function (StitekRepository $pr)
                {
                    return $pr->findFixHodnota($options['NazevStitku'], $options['Kategorie']); //nazev stitku, např. zaruka, vrátí produkty v určité kategorii, 
                },
                'placeholder' => 'Vyber typ' . $options['NazevStitku'],
                'mapped' => false,
                'expanded' => false,
                'multiple' => false,    
            ))                ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stitek::class,
            'Kategorie',
            'NazevStitku',
        ]);
    }
}

/*
 pokud je to myšleno

*/