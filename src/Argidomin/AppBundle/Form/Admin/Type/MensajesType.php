<?php

namespace Argidomin\AppBundle\Form\Admin\Type;

use Argidomin\AppBundle\Entity\Mensajes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityManager;

class MensajesType extends AbstractType
{
    protected $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('asunto')
            ->add('cuerpo')
            ->add('email')
            ->add('leido','hidden')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Argidomin\AppBundle\Entity\Mensajes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'argidomin_appbundle_mensajes';
    }

    public function newEntity()
    {
        return new Mensajes();
    }

    public function getAll()
    {
        return $this->em->getRepository('AppBundle:Mensajes')
            ->findAll();
    }

    public function getOne($objeto)
    {
        return $this->em->getRepository('AppBundle:Mensajes')
            ->findOneById($objeto);
    }
}
