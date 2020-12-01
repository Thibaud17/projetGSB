<?php

namespace App\Form;

use App\Entity\Forfait;
use App\Entity\TypeFrais;
use app\Repository\TypeFraisRepository;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForfaitFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qte') 
        ;
        $builder
            ->add('leType', EntityType::class, [
                'class' => TypeFrais::class,
                'choice_label' => 'libelle',
                'query_builder' => function(TypeFraisRepository $repo) 
                {
                    return $repo->createIsTypeQueryBuilder();
                },
                'disabled' => true
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Forfait::class,
        ]);
    }
}
