<?php
namespace Argidomin\AppBundle\DataFixtures\ORM;

use Argidomin\AppBundle\Entity\Newsletter;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\AbstractFixture;

class NewsletterLoader extends AbstractFixture implements  FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<10; $i++)
        {
            $newsletter = new Newsletter();
            $newsletter->setEmail(uniqid('email-').'@localhost.dev');
            $newsletter->setNombre('Jhon Doe');

            $manager->persist($newsletter);

        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}