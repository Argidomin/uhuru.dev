<?php

namespace Argidomin\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Doctrine\ORM\EntityManager;

class PlantillaController extends Controller
{
    public $empresa;
    protected $em;


    public function __construct(EntityManager $em)
    {
        $this->em = $em;

        $this->empresa = $this->getDatosAction();


    }
    public function getDatosAction()
    {
        return $this->em->getRepository('AppBundle:Empresa')->empresaActiva();
    }

}
