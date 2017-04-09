<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeGrade
 *
 * @ORM\Table(name="type_grade")
 * @ORM\Entity
 */
class TypeGrade
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
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=45, nullable=true)
     */
    private $label;

    /**
     * @var integer
     *
     * @ORM\Column(name="frais_dej", type="integer", nullable=true)
     */
    private $fraisDej;

    /**
     * @var integer
     *
     * @ORM\Column(name="frais_diner", type="integer", nullable=true)
     */
    private $fraisDiner;

    /**
     * @var integer
     *
     * @ORM\Column(name="frais_hebergement", type="integer", nullable=true)
     */
    private $fraisHebergement;



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
     * Set label
     *
     * @param string $label
     * @return TypeGrade
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set fraisDej
     *
     * @param integer $fraisDej
     * @return TypeGrade
     */
    public function setFraisDej($fraisDej)
    {
        $this->fraisDej = $fraisDej;

        return $this;
    }

    /**
     * Get fraisDej
     *
     * @return integer 
     */
    public function getFraisDej()
    {
        return $this->fraisDej;
    }

    /**
     * Set fraisDiner
     *
     * @param integer $fraisDiner
     * @return TypeGrade
     */
    public function setFraisDiner($fraisDiner)
    {
        $this->fraisDiner = $fraisDiner;

        return $this;
    }

    /**
     * Get fraisDiner
     *
     * @return integer 
     */
    public function getFraisDiner()
    {
        return $this->fraisDiner;
    }

    /**
     * Set fraisHebergement
     *
     * @param integer $fraisHebergement
     * @return TypeGrade
     */
    public function setFraisHebergement($fraisHebergement)
    {
        $this->fraisHebergement = $fraisHebergement;

        return $this;
    }

    /**
     * Get fraisHebergement
     *
     * @return integer 
     */
    public function getFraisHebergement()
    {
        return $this->fraisHebergement;
    }

    function __toString()
    {
        return $this->label;
    }
}
