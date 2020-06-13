<?php

namespace App\Form;

use App\Entity\Animation;
use App\Entity\AnimeCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimationType extends AbstractType
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
            'streaming',
            TextareaType::class,
            [
                "label" => "Lien Streaming"
            ]
        );

        $builder->add(
            'picture',
            TextareaType::class,
            [
                "label" => "Pochette"
            ]
        );


        $builder->add(
            'categories',
            EntityType::class, [
                "label" => "Catégories",
                "class" => AnimeCategory::class,
                "choice_label" => "label",
                "multiple" => true,
                "expanded" => true,
                "by_reference" => false
            ]
        );


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animation::class,
        ]);
    }
}
