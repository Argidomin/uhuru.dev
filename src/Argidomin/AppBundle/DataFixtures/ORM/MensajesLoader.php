<?php
namespace Argidomin\AppBundle\DataFixtures\ORM;

use Argidomin\AppBundle\Entity\Mensajes;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\AbstractFixture;

class MensajesLoader extends AbstractFixture implements  FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<10; $i++)
        {
            $mensajes = new Mensajes();
            $mensajes->setNombre('Jhon Doe');
            $mensajes->setAsunto('Asunto '.$i);
            $mensajes->setEmail(uniqid('email-').'@localhost.dev');
            $mensajes->setCuerpo('Cuerpo '.$i);
            $mensajes->setLeido(false);

            $manager->persist($mensajes);

        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}