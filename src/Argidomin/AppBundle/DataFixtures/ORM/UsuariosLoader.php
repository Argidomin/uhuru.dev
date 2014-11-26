<?php
namespace Argidomin\AppBundle\DataFixtures\ORM;

use Argidomin\AppBundle\Entity\Usuarios;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class UsuariosLoader extends AbstractFixture implements  FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i<2; $i++)
        {
            $usuario = new Usuarios();

            $usuario->setUsername('usuario'.$i);
            $usuario->setNombre('Jhon');
            $usuario->setApellidos('Doe');

            $usuario->setEmail('usuario'.$i.'@localhost.dev');

            $encoder = $this->container->get('security.encoder_factory')
                ->getEncoder($usuario);

            $password = $encoder->encodePassword('pass'.$i, $usuario->getSalt());
            $usuario->setPassword($password);

            $manager->persist($usuario);
        }

        for ($i=0; $i<2; $i++)
        {
            $usuario = new Usuarios();

            $usuario->setUsername('admin'.$i);
            $usuario->setNombre('Jhon');
            $usuario->setApellidos('Doe');
            $encoder = $this->container->get('security.encoder_factory')
                ->getEncoder($usuario);

            $password = $encoder->encodePassword('admin', $usuario->getSalt());
            $usuario->setPassword($password);
            $usuario->setEmail('usuarioAdmin'.$i.'@localhost.dev');

            $usuario->setRoles(['ROLE_ADMIN']);
            $manager->persist($usuario);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}