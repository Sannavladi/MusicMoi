<?php

namespace App\Form;

use App\Entity\Music;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MusicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title_music')
            ->add('createdAt_music', DateTimeType::class)
            ->add('length')
            ->add('description_music', CKEditorType::class)
            ->add('details')
            ->add('producers')
            // ->add('writers_composers')
            ->add('auteurs', EntityType::class, [
                'multiple' => true,
                'attr'=> [
                    "class" => "select2",
                    "id" => "select2-auteurs"
                ],
            ])
            ->add('studios')
            ->add('likes')
            ->add('imageName_music', FileType::class, [
                'required' => false,
                "label" => "Image pour la musique",
            ])
            ->remove('updatedAt_music', DateTimeType::class, [
                'widget' =>'single_text',
                'data' => new \DateTimeImmutable(),
            ])
            ->add('audioName_music')
            //->add('slug_music')
            ->add('category', EntityType::class, [
                'class' => 'App\Entity\Category',
            ])
            ->add('playlists')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Music::class,
        ]);
    }
}
