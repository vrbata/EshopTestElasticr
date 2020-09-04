<?php

namespace App\Form;

use App\Entity\Barva;
use App\Repository\BarvaRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FilterBarvaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        -> add ('Barva', EntityType::class,
        array(
            'class' => Barva::class,
            'choice_label' => function (Barva $a) {
                return $a->getNazev();
            },
            'placeholder' => 'Všechny barvy',
            'mapped' => false,
            'expanded' => false,
            'multiple' => false,                
            )       
        );
    }      
    

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Barva::class,            
        ]);
    }
}