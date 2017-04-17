<?php
/**
 * Created by PhpStorm.
 * User: Ines
 * Date: 17-04-2017
 * Time: 13:57
 */

namespace AppBundle\Manager;

use Symfony\Component\Validator\Constraints\DateTime ;


class DateFormat extends Basemanager
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getAnnee($date)
    {
        return $date->format('Y');
    }

    public function getMois($date)
    {
        return $date->format('m');
    }

    public function getJour($date)
    {
        return $date->format('d');
    }

    public function getHeure($date)
    {
        return $date->format('H');
    }

    public function getMinute($date)
    {
        return $date->format('i');
    }

}