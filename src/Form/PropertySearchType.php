<?php

namespace App\Form;

use App\Entity\PropertySearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Option;
use App\Entity\Property;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxPrice', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Budget max'
                ]
            ])
            ->add('minSurface', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Surface minimale'
                ]
            ])
            ->add('options', EntityType::class, [
                'required' => false,
                'label' => false,
                'class' => Option::class,
                'choice_label' => 'name',
                'multiple' => true
            ])
//            ->add('city', EntityType::class, [
//                'required' => false,
//                'label' => false,
//                'attr' => [
//                    'placeholder' => 'Entrer un lieu'
//                ]
//            ])
//            ->add('optionsType', EntityType::class, [
//                'required' => false,
//                'label' => false,
//                'class' => Property::class,
//                'choice_label' => 'name',
//                'multiple' => true
//            ])
//            ->add('type', ChoiceType::class, [
//                'required' => false,
//                'choices' => $this->getChoicesType()
//            ])

            //->add('submit', SubmitType::class, [
            //   'label' => 'Rechercher'
            //])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        // mnimise le prefix url
        return '';
    }

    // choix du chauffage
    public function getChoicesType()
    {
        $choices = Property::TypeT;
        $output = [];
        foreach($choices as $k => $v) {
            $output[$v] = $k;
        }
        return $output;
    }
}
