<?php

namespace App\Form;

use App\Entity\Series;
use App\Entity\Saison;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeriesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add(
            'title',
            TextType::class,
            [
                "label" => "Titre"
            ]
        );

        $builder->add(
            'description',
            TextareaType::class,
            [
                "label" => "Description"
            ]
        );

        $builder->add(
            'picture',
            TextareaType::class,
            [
                "label" => "Pochette"
            ]
        );

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Series::class,
        ]);
    }
}
