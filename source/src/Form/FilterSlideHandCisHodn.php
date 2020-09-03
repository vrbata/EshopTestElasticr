<?php

namespace App\Form;

use App\Entity\Stitek;
use App\Repository\StitekRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterSlideHandCisHodn extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Slide_Hand', RangeType::class, array (
                'data' => function (PolozkaRepository $pr) 
                {
                    return $pr->findByCiselnaHodnota($options['NazevStitku'] ,$options['Kategorie']); //Vrátí hodnoty štítků v určité kategorii, tedy např. velikost ciferníku v kategorii hodinky
                }
            ));
        
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