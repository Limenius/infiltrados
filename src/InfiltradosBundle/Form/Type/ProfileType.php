<?php

namespace InfiltradosBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Form\CallbackTransformer;
use InfiltradosBundle\Entity\User;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('occupation', TextType::class, ['label' => 'Ocupación'])
            ->add('movie', TextType::class, ['label' => 'Película'])
            ->add('song', TextType::class, ['label' => 'Canción'])
            ->add('band', TextType::class, ['label' => 'Grupo'])
            ->add('book', TextType::class, ['label' => 'Libro'])
            ->add('sport', TextType::class, ['label' => 'Deporte'])
            ->add('hobby', TextType::class, ['label' => 'Hobby'])
            ;
    }

    public function getBlockPrefix()
    {
        return 'infiltrados_profile';
    }

}
