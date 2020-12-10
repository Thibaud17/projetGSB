<?php

namespace App\Form;

use App\Entity\Fiche;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('lesForfaits', CollectionType::class, [
            'entry_type' => ForfaitFormType::class,
            'entry_options' => ['label' => false],
            'allow_add' => true,
        ]);

        $builder->add('lesHorsForfaits', CollectionType::class, [
            'entry_type' => HorsForfaitFormType::class,
            'entry_options' => ['label' => false],
            'allow_add' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fiche::class,
        ]);
    }
}
