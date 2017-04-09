<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Deplacement
 *
 * @ORM\Table(name="deplacement", indexes={@ORM\Index(name="type_transport", columns={"type_transport"})})
 * @ORM\Entity
 */
class Deplacement
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


}
