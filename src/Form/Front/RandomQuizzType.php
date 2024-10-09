<?php

namespace App\Form\Front;

use App\Entity\Answer;
use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RandomQuizzType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var Question $question */
        foreach ($options['questions'] as $question){
            $builder
                ->add($question->getId(),ChoiceType::class, [
                    'label' => $question->getText(),
                    'choices' => $question->getAnswers(),
                    'choice_value' => 'id',
                    'choice_label' => function (?Answer $answer): string {
                        return $answer ? strtoupper($answer->getText()) : '';
                    },
                    'multiple' => true,
                    'expanded' => true,
                    'row_attr' => [
                        'name' => $question->getTitle()
                    ]
                ])
            ;
        }

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
            'questions' => []
        ]);
    }
}