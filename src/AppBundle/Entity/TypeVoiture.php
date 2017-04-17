<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeVoiture
 *
 * @ORM\Table(name="type_voiture")
 * @ORM\Entity
 */
class TypeVoiture
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_chevaux", type="integer", nullable=true)
     */
    private $nbChevaux;

    /**
     * @var integer
     *
     * @ORM\Column(name="taux", type="integer", nullable=true)
     */
    private $taux;



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
     * Set nbChevaux
     *
     * @param integer $nbChevaux
     * @return TypeVoiture
     */
    public function setNbChevaux($nbChevaux)
    {
        $this->nbChevaux = $nbChevaux;

        return $this;
    }

    /**
     * Get nbChevaux
     *
     * @return integer 
     */
    public function getNbChevaux()
    {
        return $this->nbChevaux;
    }

    /**
     * Set taux
     *
     * @param integer $taux
     * @return TypeVoiture
     */
    public function setTaux($taux)
    {
        $this->taux = $taux;

        return $this;
    }

    /**
     * Get taux
     *
     * @return integer 
     */
    public function getTaux()
    {
        return $this->taux;
    }

    function __toString()
    {
        return $this->nbChevaux . " Chevaux";
    }
}
