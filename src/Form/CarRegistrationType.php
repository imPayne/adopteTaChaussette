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
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\MailType;

class CarRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('siret', TextType::class, [
                'label' => 'Modèle du véhicule',
                'required' => false,
                'mapped' => true,])

            ->add('name', TextType::class, [
                'label' => 'Modèle du véhicule',
                'required' => false,
                'mapped' => true,])

            ->add('firstname', TextType::class, [
                'label' => 'Modèle du véhicule',
                'required' => false,
                'mapped' => true,])

            ->add('carModel', TextType::class, [
                'label' => 'Modèle du véhicule',
                'required' => false,
                'mapped' => false,
            ])
            ->add('carPrice', RangeType::class, [
                'label' => 'Prix',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'min' => 0, // Valeur minimale du range
                    'max' => 1000000, // Valeur maximale du range
                    'step' => 1, // Incrément du range
                    'oninput' => 'updatePriceValue(this.value)'
                ]
            ])
            ->add('kilometer', RangeType::class, [
                'label' => 'Kilométrage',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'min' => 0, // Valeur minimale du range
                    'max' => 100000, // Valeur maximale du range
                    'step' => 1, // Incrément du range
                    'oninput' => 'updateKilometerValue(this.value)'
                ]
            ])
            ->add('color', TextType::class, [
                'label' => 'Couleur',
                'required' => false,
                'mapped' => false,
            ])
            ->add('registration', TextType::class, [
                'label' => 'Immatriculation',
                'required' => false,
                'mapped' => false,
            ])
            ->add('bill_date', DateTimeType::class, [ 
                'label' => 'Date de Facturation',
                'required' => false,
                'mapped' => true,
                'html5' => true, 
            ])
            ->add('garageName', TextType::class, [
                'label' => 'Nom',
                'required' => false,
                'mapped' => false,
            ])
            ->add('garageMail', TextType::class, [
                'label' => 'Mail',
                'required' => false,
                'mapped' => false,
            ])
            ->add('garageCity', TextType::class, [
                'label' => 'Ville',
                'required' => false,
                'mapped' => false,
            ])
            ->add('garageCP', NumberType::class, [
                'label' => 'Code postal',
                'required' => false,
                'mapped' => false,
            ])
            ->add('garageAdress', TextType::class, [
                'label' => 'Adresse',
                'required' => false,
                'mapped' => false,
            ])
            ->add('garagePhone', NumberType::class, [
                'label' => 'N° Téléphone',
                'required' => false,
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
