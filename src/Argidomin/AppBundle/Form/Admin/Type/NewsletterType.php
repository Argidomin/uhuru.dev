<?php

namespace Argidomin\AppBundle\Form\Admin\Type;

use Argidomin\AppBundle\Entity\Newsletter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityManager;

class NewsletterType extends AbstractType
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
            ->add('email')
            ->add('nombre')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Argidomin\AppBundle\Entity\Newsletter'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'argidomin_appbundle_newsletter';
    }

    public function newEntity()
    {
        return new Newsletter();
    }

    public function getAll()
    {
        return $this->em->getRepository('AppBundle:Newsletter')
            ->findAll();
    }

    public function getOne($objeto)
    {
        return $this->em->getRepository('AppBundle:Newsletter')
            ->findOneByEmail($objeto);
    }
}
