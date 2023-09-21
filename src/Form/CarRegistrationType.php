<?php

namespace App\Form;

use App\Entity\CarRegistration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class CarRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('siret')
            ->add('name')
            ->add('firstname')
            ->add('carModel', TextType::class, [
                'label' => 'Modèle du véhicule',
                'required' => false,
                'mapped' => false,
            ])
            ->add('carPrice', RangeType::class, [
                'label' => 'Prix',
                'required' => true,
                'mapped' => false,
                'attr' => [
                    'min' => 0, // Valeur minimale du range
                    'max' => 10000000, // Valeur maximale du range
                    'step' => 8, // Incrément du range
                    'oninput' => 'updateRangeValue(this.value)'
                ]
            ])
            ->add('kilometer', TextType::class, [
                'label' => 'Kilométrage',
                'required' => true,
                'mapped' => false,
            ])
            ->add('color', TextType::class, [
                'label' => 'Couleur',
                'required' => true,
                'mapped' => false,
            ])
            ->add('registration', TextType::class, [
                'label' => 'Immatriculation',
                'required' => true,
                'mapped' => false,
            ])
            ->add('bill_date', DateType::class, [
                'label' => 'Date de Facturation',
                'required' => true,
                'mapped' => true,
            ])
            ->add('garageName', TextType::class, [
                'label' => 'Nom',
                'required' => true,
                'mapped' => false,
            ])
            ->add('garageMail', TextType::class, [
                'label' => 'Mail',
                'required' => true,
                'mapped' => false,
            ])
            ->add('garageCity', TextType::class, [
                'label' => 'Ville',
                'required' => true,
                'mapped' => false,
            ])
            ->add('garageCP', TextType::class, [
                'label' => 'Code postal',
                'required' => true,
                'mapped' => false,
            ])
            ->add('garageAdress', TextType::class, [
                'label' => 'Adresse',
                'required' => true,
                'mapped' => false,
            ])
            ->add('garagePhone', TextType::class, [
                'label' => 'N° Téléphone',
                'required' => true,
                'mapped' => false,
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarRegistration::class,
        ]);
    }
}
