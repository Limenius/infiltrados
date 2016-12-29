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
            ->add('occupation', TextType::class, ['label' => '¿A qué te dedicas?'])
            ->add('movie', TextType::class, ['label' => 'Una película que te guste mucho'])
            ->add('book', TextType::class, ['label' => '¿Y un libro?'])
            ->add('zodiac', TextType::class, ['label' => '¿Cuál es tu signo del zodiaco?'])
            ->add('band', TextType::class, ['label' => 'Tu grupo de música favorito'])
            ->add('sport', TextType::class, ['label' => '¿Y tu deporte?'])
            ->add('hobby', TextType::class, ['label' => 'Algo que te guste hacer en tu tiempo libre'])
            ;
    }

    public function getBlockPrefix()
    {
        return 'infiltrados_profile';
    }

}
