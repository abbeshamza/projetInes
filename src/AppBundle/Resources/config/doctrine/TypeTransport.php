<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TypeTransport
 *
 * @ORM\Table(name="type_transport")
 * @ORM\Entity
 */
class TypeTransport
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


}
