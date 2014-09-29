<?php

namespace OhMyBank\Bundle\ApiBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('initialBalance', 'number')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ohmybank_account';
    }
}