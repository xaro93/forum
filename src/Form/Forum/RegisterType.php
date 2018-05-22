<?php
/**
 * Created by PhpStorm.
 * User: Xaro
 * Date: 17.05.2018
 * Time: 21:38
 */

namespace App\Form\Forum;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add(
                'username',
                null,
                [
                    'label' => 'label.username',
                ])
            ->add(
                'email',
                null,
                [
                    'label' => 'label.email',
                ]
            )
            ->add(
                'password',
                RepeatedType::class,
                [
                    'type'            => PasswordType::class,
                    'invalid_message' => 'Password must match',
                    'required'        => true,
                    'first_options'   => array('label' => 'Password'),
                    'second_options'  => array('label' => 'Repeat password'),
                ]
            );

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}