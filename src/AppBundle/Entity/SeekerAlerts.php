<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeekerAlerts
 *
 * @ORM\Table(name="seeker_alerts")
 * @ORM\Entity
 */
class SeekerAlerts
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
     * @ORM\Column(name="job_category", type="integer", nullable=false)
     */
    private $jobCategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="country", type="integer", nullable=false)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", nullable=false)
     */
    private $state;

    /**
     * @var integer
     *
     * @ORM\Column(name="city", type="integer", nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="keyword", type="string", length=100, nullable=true)
     */
    private $keyword;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_updated", type="datetime", nullable=true)
     */
    private $dateUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

