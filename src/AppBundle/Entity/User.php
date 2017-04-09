<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use AppBundle\Entity\Grade;
use AppBundle\Entity\TypeGrade;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 *@ORM\Table(name="user", indexes={@ORM\Index(name="grade", columns={"grade"}),@ORM\Index(name="type_grade", columns={"type_grade"})    })
 *
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @var grade
     *
     * @ORM\ManyToOne(targetEntity="Grade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grade", referencedColumnName="id")
     * })
     */
    private $grade;

    /**
     * @var typeGrade
     *
     * @ORM\ManyToOne(targetEntity="TypeGrade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_grade", referencedColumnName="id")
     * })
     */
    private $typeGrade;

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
     * Set grade
     *
     * @param \AppBundle\Entity\Grade $grade
     * @return User
     */
    public function setGrade(\AppBundle\Entity\Grade $grade = null)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return \AppBundle\Entity\Grade 
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set typeGrade
     *
     * @param \AppBundle\Entity\TypeGrade $typeGrade
     * @return User
     */
    public function setTypeGrade(\AppBundle\Entity\TypeGrade $typeGrade = null)
    {
        $this->typeGrade = $typeGrade;

        return $this;
    }

    /**
     * Get typeGrade
     *
     * @return \AppBundle\Entity\TypeGrade 
     */
    public function getTypeGrade()
    {
        return $this->typeGrade;
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
}
