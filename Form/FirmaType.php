<?php

namespace GanemosMadridFirmasApoyoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FirmaType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nombre')
                ->add('documentoIdentidad')
                ->add('email')
                ->add('actividad', 'text', array('required' => false))
                //->add('provincia', 'choice')
                //->add('ciudad', 'choice')
                ->add('ocultarNombre', 'checkbox', array(
                    'required' => false))
                ->add('suscribirseLista', 'choice', array(
                    'choices' => array('Si', 'No', 'Ya estoy inscrita'),
                    'expanded' => true,
                ))
                ->add('save', 'submit')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'GanemosMadridFirmasApoyoBundle\Entity\Firma'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'ganemosmadrid_firmasapoyobundle_firma';
    }

}
