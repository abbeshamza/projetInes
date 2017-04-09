<?php



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


}
