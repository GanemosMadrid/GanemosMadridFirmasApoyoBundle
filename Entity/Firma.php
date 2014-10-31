<?php

namespace GanemosMadridFirmasApoyoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use GanemosMadridFirmasApoyoBundle\Validator\Constraints as GMAssert;

/**
 * @ORM\Entity
 * @ORM\Table(name="firmas")
 * @ORM\Entity(repositoryClass="GanemosMadridFirmasApoyoBundle\Entity\FirmaRepository")
 * @UniqueEntity("documentoIdentidad")
 * @UniqueEntity("email")
 */
class Firma {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string", unique=true)
     * @GMAssert\DniNie
     */
    protected $documentoIdentidad;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\Column(type="string", nullable=TRUE)
     */
    protected $actividad;

    /**
     * @ORM\Column(type="string")
     */
    protected $provincia;

    /**
     * @ORM\Column(type="string")
     */
    protected $ciudad;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $ocultarNombre;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $suscribirseLista;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Firma
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set documentoIdentidad
     *
     * @param string $documentoIdentidad
     * @return Firma
     */
    public function setDocumentoIdentidad($documentoIdentidad) {
        
        $this->documentoIdentidad = ltrim(str_replace(array('_', ' ', '-', '.'), '', $documentoIdentidad), 0);

        return $this;
    }

    /**
     * Get documentoIdentidad
     *
     * @return string 
     */
    public function getDocumentoIdentidad() {
        return $this->documentoIdentidad;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Firma
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set actividad
     *
     * @param string $actividad
     * @return Firma
     */
    public function setActividad($actividad) {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get actividad
     *
     * @return string 
     */
    public function getActividad() {
        return $this->actividad;
    }

    /**
     * Set provincia
     *
     * @param string $provincia
     * @return Firma
     */
    public function setProvincia($provincia) {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return string 
     */
    public function getProvincia() {
        return $this->provincia;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return Firma
     */
    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad() {
        return $this->ciudad;
    }

    /**
     * Set ocultarNombre
     *
     * @param boolean $ocultarNombre
     * @return Firma
     */
    public function setOcultarNombre($ocultarNombre) {
        $this->ocultarNombre = $ocultarNombre;

        return $this;
    }

    /**
     * Get ocultarNombre
     *
     * @return boolean 
     */
    public function getOcultarNombre() {
        return $this->ocultarNombre;
    }

    /**
     * Set suscribirseLista
     *
     * @param boolean $suscribirseLista
     * @return Firma
     */
    public function setSuscribirseLista($suscribirseLista) {
        $this->suscribirseLista = $suscribirseLista;

        return $this;
    }

    /**
     * Get suscribirseLista
     *
     * @return boolean 
     */
    public function getSuscribirseLista() {
        return $this->suscribirseLista;
    }

}
