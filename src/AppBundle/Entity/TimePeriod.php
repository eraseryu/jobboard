<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimePeriod
 *
 * @ORM\Table(name="time_period")
 * @ORM\Entity
 */
class TimePeriod
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="time_in_days", type="integer", nullable=false)
     */
    private $timeInDays;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

