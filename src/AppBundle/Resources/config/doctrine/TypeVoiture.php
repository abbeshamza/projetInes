<?php



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


}
