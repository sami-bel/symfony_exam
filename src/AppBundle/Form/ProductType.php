<?php

namespace AppBundle\Form;



use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference', TextType::class)
            ->add('name', TextType::class)
            ->add('purchasingPrice' )
            ->add('sellingPrice')
            ->add('tvaRate')

            ->add('send', SubmitType::class);

    }


}
