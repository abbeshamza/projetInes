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
use Symfony\Component\Validator\Constraints\DateTime;


class DeplacementManager extends Basemanager
{

    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function calculFrais(Deplacement $deplacement)
    {
        $fraisDeplacement = 0;
        $fraisTransport = 0;
        $dateManager = $this->container->get('app.date_format');
        $interval = $deplacement->getDateDepart()->diff($deplacement->getDateArrive())->days + 1;
        if ($deplacement->getTypeTransport()->getLabel() == $this->container->getParameter('transport_public')) {
            $fraisTransport = $deplacement->getFraisTransportPublic();
        } else {
            $nbAllerRetour = 1;
            if (!$deplacement->getHasHebergement())
                $nbAllerRetour = $interval;
            $fraisTransport = $deplacement->getNbKlm() * $deplacement->getTypeVoiture()->getTaux() * 2 * $nbAllerRetour;
        }

        $intervalHours = $deplacement->getDateDepart()->diff($deplacement->getDateArrive())->h;

        if ($intervalHours <= 7 || $deplacement->getNbKlm() <= 15)
            $deplacement->setFraisDeplacement(0);
        else {
            if ($deplacement->getHasHebergement())
                $hebergement = 1;
            else
                $hebergement = 0;
            $fraisDeplacement = ($interval - 1) * ($deplacement->getUser()->getTypeGrade()->getFraisDej() + $deplacement->getUser()->getTypeGrade()->getFraisDiner() + $deplacement->getUser()->getTypeGrade()->getFraisHebergement() * $hebergement);
            if ($dateManager->getHeure($deplacement->getDateArrive()) >= 13) {
                $fraisDeplacement += $deplacement->getUser()->getTypeGrade()->getFraisDej();
            }
            if ($dateManager->getHeure($deplacement->getDateArrive()) * 60 + $dateManager->getMinute($deplacement->getDateArrive()) >= 1230) {
                $fraisDeplacement += $deplacement->getUser()->getTypeGrade()->getFraisDiner();
            }

        }
        $deplacement->setFraisDeplacement($fraisDeplacement);
        $deplacement->setFraisTransport($fraisTransport);
        return $deplacement;
    }

}