<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 04/06/18
 * Time: 12:59
 */

namespace Wcs;


/**
 * Class TimeTravel
 * @package Wcs
 */
class TimeTravel
{
    const DATE_TIME = null;
    /**
     * @var \DateTimeImmutable
     */
    private $start;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @return \DateTime
     */
    public function getStart(): \DateTime
    {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart( $start): void
    {
        $this->start = $start;
    }

    /**
     * @return \DateTime
     */
    public function getEnd(): \DateTime
    {
        return $this->end;
    }

    /**
     * @param \DateTime $end
     */
    public function setEnd(\DateTime $end): void
    {
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getTravelInfo(): string
    {
        $interval= $this->start->diff($this->end);
        $message = $interval
            ->format('Il y a %y années, %m mois, %d jours, %h heures, %i minutes et %s secondes entre les deux dates.');
        return $message;
    }


    /**
     * @param int $interval
     * @return string
     */
    public function findDate($interval)
    {

        $end = $this->start->add( \DateInterval::createFromDateString($interval));
        $date = $end->format('Y-m-d H:i:s');
        return $date;
    }

    public function backToFutureStepByStep($step)
    {
        $interval = new \DateInterval($step);
        $period = new \DatePeriod($this->start, $interval ,$this->end);
        $dates = [];
        foreach($period as $date){
            $dates[] = $date->format("D d Y a h:i") . "<br>";
        }
        return $dates;

    }

    public function __construct($start= null,$end= null)
    {
        $this->start = $start;
        $this->end = $end;
    }
}