<?php

namespace App\Form;

use App\Entity\Polozka;
use App\Repository\PolozkaRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SlideHandCiselnaHodnotaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Slide_Hand', RangeType::class, array (
                'data' => function (PolozkaRepository $pr)
                {
                    return $pr->findByCiselnaHodnota($options['Kategorie']);
                }


            ))                ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Polozka::class,
            'Kategorie',
        ]);
    }
}