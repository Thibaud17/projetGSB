<?php

namespace App\Form;

use App\Entity\Forfait;
use App\Entity\TypeFrais;
use app\Repository\TypeFraisRepository;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
                'query_builder' => function (TypeFraisRepository $er) {
                    return $er->createIsTypeQueryBuilder('u')
                        ->orderBy('u.libelle', 'ASC');
                },
                'choice_label' => 'libelle',
                
            ])
        ;
        /*
        $builder->add('leType', CollectionType::class, [
            'entry_type' => ChoiceType::class,
            'allow_add' => true,
        ]);
        */
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Forfait::class,
        ]);
    }
}
