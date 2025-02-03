<?php

namespace App\Form;

use App\Model\Sum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CalculatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('value1', NumberType::class, [
                'html5' => true,
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('operator', ChoiceType::class, [
                'choices' => [
                    'Operators' => '',
                    '+' => '+',
                    '-' => '-',
                    '/' => '/',
                    '*' => '*',
                ],
                'constraints' => [
                    new NotBlank(),
                ],
                'invalid_message' => 'The operator field is required.',
            ])
            ->add('value2', NumberType::class, [
                'html5' => true,
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('Calculate', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sum::class,
        ]);
    }
}
