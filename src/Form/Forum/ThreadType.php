<?php
/**
 * Created by PhpStorm.
 * User: Xaro
 * Date: 17.05.2018
 * Time: 21:38
 */

namespace App\Form\Forum;


use App\Entity\Thread;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThreadType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add(
                'title',
                null,
                [
                    'label' => 'label.title',
                ]);
//            ->add(
//                'posts',
//                PostType::class,
//                [
//                ]
//            );

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Thread::class,
        ]);
    }
}