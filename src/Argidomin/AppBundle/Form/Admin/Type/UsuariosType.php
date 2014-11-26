<?php

namespace Argidomin\AppBundle\Form\Admin\Type;

use Argidomin\AppBundle\Entity\Usuarios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityManager;
class UsuariosType extends AbstractType
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
            ->add('apellidos')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Argidomin\AppBundle\Entity\Usuarios'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'argidomin_appbundle_usuarios';
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function newEntity()
    {
        return new Usuarios();
    }

    public function getAll()
    {
        return $this->em->getRepository('AppBundle:Usuarios')
            ->findAll();
    }

    public function getOne($objeto)
    {
        return $this->em->getRepository('AppBundle:Usuarios')
            ->findOneByEmail($objeto);
    }
}
