<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Url;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new NotBlank(['message' => 'Cette valeur ne peut pas être nulle'])
                ]
            ])
            ->add('Firstname', TextType::class, [
                'label' => 'Prénom',
                'required' => false
            ])
            ->add('textArea', TextareaType::class, [
                'label' => 'Message',
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 100,
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [
                    new NotBlank(),
                    new Email()
                ]
            ])
            ->add('age', IntegerType::class, [
                'label' => 'Age',
                'constraints' => [
                    new NotBlank(),
                    new Range([
                        'min' => 7,
                        'max' => 77
                    ])
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'constraints' => [
                    new NotBlank(),
                    new Length([
                        'min' => 8,
                        'max' => 16
                    ])
                ]
            ])
            ->add('url', UrlType::class, [
                'label' => 'URL',
                'constraints' => [
                    new NotBlank(),
                    new Url(),
                ]
            ])
            ->add('opinion', ChoiceType::class, [
                'label' => 'Avis',
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Rire' => 'laught',
                    'Pleurer' => 'cry',
                    'Réfléchir' => 'think',
                    'Dormir' => 'sleep',
                    'Rêver' => 'dream'
                ]
            ])
            ->add('date', DateTimeType::class, [
                'label' => 'Vous avez vu ce filme le :',
                'widget' => 'single_text',
                'constraints' => [
                    new Type('datetime')
                ]
            ])
            ->add('picture' , FileType::class, [
                'label' => 'photo',       
            ])
            ->add('button', SubmitType::class, [
                'label' => 'envoyer',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
