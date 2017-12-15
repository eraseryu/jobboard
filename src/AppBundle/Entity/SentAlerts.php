<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SentAlerts
 *
 * @ORM\Table(name="sent_alerts")
 * @ORM\Entity
 */
class SentAlerts
{
    /**
     * @var integer
     *
     * @ORM\Column(name="seeker_id", type="integer", nullable=false)
     */
    private $seekerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_id", type="integer", nullable=false)
     */
    private $jobId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_sent", type="datetime", nullable=true)
     */
    private $dateSent;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

