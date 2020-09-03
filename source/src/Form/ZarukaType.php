<?php

namespace App\Form;

use App\Entity\Polozka;
use App\Repository\PolozkaRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ZarukaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Zaruka', EntityType::class, array (
                'class' => Polozka::class,
                'query_builder' =>  function (PolozkaRepository $pr)
                {
                    return $pr->findByZaruka($options['Kategorie']);
                },
                'placeholder' => 'Vyber typ záruky',
                'mapped' => false,
                'expanded' => false,
                'multiple' => false,    
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