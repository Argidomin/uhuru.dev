<?php
namespace Argidomin\AppBundle\DataFixtures\ORM;

use Argidomin\AppBundle\Entity\Empresa;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\AbstractFixture;

class EmpresaLoader extends AbstractFixture implements  FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $empresa = new Empresa();
        $empresa->setNombre('Proyecto Africa');
        $empresa->setEmail('info@proyectoafrica.dev');
        $empresa->setRedesSociales('Siguenos');
        $empresa->setUrlFacebook('http://www.facebook.es');
        $empresa->setUrlGoogle('http://www.twitter.es');
        $empresa->setUrlTwitter('http://www.google.es');
        $empresa->setTelefonoContacto('666666666');
        $empresa->setSlogan('Burbudrubu');
        $empresa->setContacto('llamanos');

        $empresa->setEstado(true);
        $manager->persist($empresa);

        $manager->flush();
    }

    public function getOrder()
    {
        return 0; // the order in which fixtures will be loaded
    }
}