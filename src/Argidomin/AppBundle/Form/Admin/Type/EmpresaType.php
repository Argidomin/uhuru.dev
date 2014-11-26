<?php

namespace Argidomin\AppBundle\Form\Admin\Type;

use Argidomin\AppBundle\Entity\Empresa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityManager;

class EmpresaType extends AbstractType
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
            ->add('slogan')
            ->add('telefonoContacto')
            ->add('urlFacebook')
            ->add('urlTwitter')
            ->add('urlGoogle')
            ->add('contacto')
            ->add('redesSociales')
            ->add('estado')
            ->add('email')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Argidomin\AppBundle\Entity\Empresa',
            'validation_groups' => true,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'argidomin_appbundle_empresa';
    }

    public function newEntity()
    {
        return new Empresa();
    }

    public function getAll()
    {
        return $this->em->getRepository('AppBundle:Empresa')
                        ->findAll();
    }

    public function getOne($objeto)
    {
        return $this->em->getRepository('AppBundle:Empresa')
            ->findOneById($objeto);
    }

}
