<?php

namespace App\Form;

use App\Entity\Polozka;
use App\Entity\Stav;
use App\Repository\PolozkaRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FilterStavType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $hodnoty = ['Skladem' => '1', 'Ve slevě' => '2', 'Použité' => '3', 'Rozbalené' => '4', 'Nedostupné' => '5'];

        $builder
            ->add('Stav', ChoiceType::class, ['choices' => $hodnoty]);
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stav::class,            
        ]);
    }
}