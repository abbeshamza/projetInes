<?php
/**
 * Created by PhpStorm.
 * User: Ines
 * Date: 09-04-2017
 * Time: 19:44
 */

namespace AppBundle\Manager;
use AppBundle\Entity\Deplacement;
use AppBundle\Manager\BaseManager as Basemanager;


class DeplacementManager extends Basemanager
{

    protected $container;
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function calculFrais(Deplacement $deplacement){
        $dateDebut = $deplacement->getDateDepart()->format('Y-m-d H:i:s');
        return $deplacement ;
    }

}