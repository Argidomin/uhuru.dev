<?php

namespace Argidomin\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Empresa
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Argidomin\AppBundle\Entity\Repository\EmpresaRepository")
 */
class Empresa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(name="email", type="string")
     */
    private $email;


    /**
     * @ORM\Column(name="telefonoContacto", type="string")
     */
    private $telefonoContacto;

    /**
     *  @ORM\Column(name="urlFacebook", type="string")
     */
    private $urlFacebook;

    /**
     *  @ORM\Column(name="urlTwitter", type="string")
     */
    private $urlTwitter;

    /**
     *  @ORM\Column(name="urlGoogle", type="string")
     */
    private $urlGoogle;

    /**
     *  @ORM\Column(name="slogan", type="string")
     */
    private $slogan;

    /**
     *  @ORM\Column(name="contacto", type="string")
     */
    private $contacto;

    /**
     *  @ORM\Column(name="redesSociales", type="string")
     */
    private $redesSociales;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;



    public function __toString()
    {
        return $this->getNombre();
    }



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Empresa
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Empresa
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefonoContacto
     *
     * @param string $telefonoContacto
     * @return Empresa
     */
    public function setTelefonoContacto($telefonoContacto)
    {
        $this->telefonoContacto = $telefonoContacto;

        return $this;
    }

    /**
     * Get telefonoContacto
     *
     * @return string 
     */
    public function getTelefonoContacto()
    {
        return $this->telefonoContacto;
    }

    /**
     * Set urlFacebook
     *
     * @param string $urlFacebook
     * @return Empresa
     */
    public function setUrlFacebook($urlFacebook)
    {
        $this->urlFacebook = $urlFacebook;

        return $this;
    }

    /**
     * Get urlFacebook
     *
     * @return string 
     */
    public function getUrlFacebook()
    {
        return $this->urlFacebook;
    }

    /**
     * Set urlTwitter
     *
     * @param string $urlTwitter
     * @return Empresa
     */
    public function setUrlTwitter($urlTwitter)
    {
        $this->urlTwitter = $urlTwitter;

        return $this;
    }

    /**
     * Get urlTwitter
     *
     * @return string 
     */
    public function getUrlTwitter()
    {
        return $this->urlTwitter;
    }

    /**
     * Set urlGoogle
     *
     * @param string $urlGoogle
     * @return Empresa
     */
    public function setUrlGoogle($urlGoogle)
    {
        $this->urlGoogle = $urlGoogle;

        return $this;
    }

    /**
     * Get urlGoogle
     *
     * @return string 
     */
    public function getUrlGoogle()
    {
        return $this->urlGoogle;
    }

    /**
     * Set slogan
     *
     * @param string $slogan
     * @return Empresa
     */
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;

        return $this;
    }

    /**
     * Get slogan
     *
     * @return string 
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * Set contacto
     *
     * @param string $contacto
     * @return Empresa
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;

        return $this;
    }

    /**
     * Get contacto
     *
     * @return string 
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set redesSociales
     *
     * @param string $redesSociales
     * @return Empresa
     */
    public function setRedesSociales($redesSociales)
    {
        $this->redesSociales = $redesSociales;

        return $this;
    }

    /**
     * Get redesSociales
     *
     * @return string 
     */
    public function getRedesSociales()
    {
        return $this->redesSociales;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Empresa
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
