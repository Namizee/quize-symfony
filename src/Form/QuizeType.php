<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuizeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('answer', EntityType::class, [
                'class' => Answer::class,
                'choice_label' => 'description',
                'group_by' => function (Answer $answer): string {
                    return $answer->getQuestion()->getDescription();
                },
                'multiple' => true,
                'expanded' => true,
                'mapped' => false,
            ])
            ->add('result', SubmitType::class, [
                'label' => 'Result',
                'attr' => [
                    'class' => 'btn',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'attr' => ['class' => 'form', 'novalidate' => 'novalidate'],
        ]);
    }
}
