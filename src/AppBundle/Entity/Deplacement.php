<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;

/**
 * Deplacement
 *
 * @ORM\Table(name="deplacement", indexes={@ORM\Index(name="type_transport", columns={"type_transport"}),
 *                                        @ORM\Index(name="user", columns={"user"})
 * })
 * @ORM\Entity
 */
class Deplacement
{
    Const KILOMETRAGE_MIN = 15;
    Const DUREE_MIN = 7;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="depart", type="string", length=45, nullable=true)
     */
    private $depart;

    /**
     * @var string
     *
     * @ORM\Column(name="destination", type="string", length=45, nullable=true)
     */
    private $destination;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_klm", type="integer", nullable=true)
     */
    private $nbKlm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_depart", type="datetime", nullable=true)
     */
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_arrive", type="datetime", nullable=true)
     */
    private $dateArrive;

    /**
     * @var float
     *
     * @ORM\Column(name="avance_recu", type="float", precision=10, scale=0, nullable=true)
     */
    private $avanceRecu;

    /**
     * @var float
     *
     * @ORM\Column(name="frais_transport", type="float", precision=10, scale=0, nullable=true)
     */
    private $fraisTransport;

    /**
     * @var float
     *
     * @ORM\Column(name="frais_deplacement", type="float", precision=10, scale=0, nullable=true)
     */
    private $fraisDeplacement;

    /**
     * @var \TypeTransport
     *
     * @ORM\ManyToOne(targetEntity="TypeTransport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_transport", referencedColumnName="id")
     * })
     */
    private $typeTransport;

    /**
     * @var typeVoiture
     *
     * @ORM\ManyToOne(targetEntity="TypeVoiture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_voiture", referencedColumnName="id")
     * })
     */
    private $typeVoiture;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;


    /**
     * @var boolean $hasHebergement
     *
     * @ORM\Column(name="hasHebergement", type="boolean")
     */

    private $hasHebergement;

    /**
     * @var string
     *
     * @ORM\Column(name="fraisTransportPublic", type="string", length=45, nullable=true)
     */
    private $fraisTransportPublic;



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
     * Set depart
     *
     * @param string $depart
     * @return Deplacement
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;

        return $this;
    }

    /**
     * Get depart
     *
     * @return string
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * Set destination
     *
     * @param string $destination
     * @return Deplacement
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set nbKlm
     *
     * @param integer $nbKlm
     * @return Deplacement
     */
    public function setNbKlm($nbKlm)
    {
        $this->nbKlm = $nbKlm;

        return $this;
    }

    /**
     * Get nbKlm
     *
     * @return integer
     */
    public function getNbKlm()
    {
        return $this->nbKlm;
    }

    /**
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     * @return Deplacement
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set dateArrive
     *
     * @param \DateTime $dateArrive
     * @return Deplacement
     */
    public function setDateArrive($dateArrive)
    {
        $this->dateArrive = $dateArrive;

        return $this;
    }

    /**
     * Get dateArrive
     *
     * @return \DateTime
     */
    public function getDateArrive()
    {
        return $this->dateArrive;
    }

    /**
     * Set avanceRecu
     *
     * @param float $avanceRecu
     * @return Deplacement
     */
    public function setAvanceRecu($avanceRecu)
    {
        $this->avanceRecu = $avanceRecu;

        return $this;
    }

    /**
     * Get avanceRecu
     *
     * @return float
     */
    public function getAvanceRecu()
    {
        return $this->avanceRecu;
    }

    /**
     * Set fraisTransport
     *
     * @param float $fraisTransport
     * @return Deplacement
     */
    public function setFraisTransport($fraisTransport)
    {
        $this->fraisTransport = $fraisTransport;

        return $this;
    }

    /**
     * Get fraisTransport
     *
     * @return float
     */
    public function getFraisTransport()
    {
        return $this->fraisTransport;
    }

    /**
     * Set fraisDeplacement
     *
     * @param float $fraisDeplacement
     * @return Deplacement
     */
    public function setFraisDeplacement($fraisDeplacement)
    {
        $this->fraisDeplacement = $fraisDeplacement;

        return $this;
    }

    /**
     * Get fraisDeplacement
     *
     * @return float
     */
    public function getFraisDeplacement()
    {
        return $this->fraisDeplacement;
    }

    /**
     * Set typeTransport
     *
     * @param \AppBundle\Entity\TypeTransport $typeTransport
     * @return Deplacement
     */
    public function setTypeTransport(\AppBundle\Entity\TypeTransport $typeTransport = null)
    {
        $this->typeTransport = $typeTransport;

        return $this;
    }

    /**
     * Get typeTransport
     *
     * @return \AppBundle\Entity\TypeTransport
     */
    public function getTypeTransport()
    {
        return $this->typeTransport;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Deplacement
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }


    /**.
     * Set hasHebergemen
     *
     * @param boolean $isEnabled
     */
    public function setHasHebergement($isEnabled)
    {
        $this->hasHebergement = $isEnabled;
    }

    /**
     * Get hasHebergemen
     *
     * @return boolean
     */
    public function getHasHebergement()
    {
        return $this->hasHebergement;
    }

    /**
     * Set typeVoiture
     *
     * @param \AppBundle\Entity\TypeVoiture $typeVoiture
     * @return User
     */
    public function setTypeVoiture(\AppBundle\Entity\TypeVoiture $typeVoiture = null)
    {
        $this->typeVoiture = $typeVoiture;

        return $this;
    }

    /**
     * Get typeVoiture
     *
     * @return \AppBundle\Entity\TypeVoiture
     */
    public function getTypeVoiture()
    {
        return $this->typeVoiture;
    }

    /**
     * Set fraisTransportPublic
     *
     * @param string $fraisTransportPublic
     * @return Deplacement
     */
    public function setFraisTransportPublic($fraisTransportPublic)
    {
        $this->fraisTransportPublic = $fraisTransportPublic;

        return $this;
    }

    /**
     * Get fraisTransportPublic
     *
     * @return string
     */
    public function getFraisTransportPublic()
    {
        return $this->fraisTransportPublic;
    }

}
