<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SavedJobs
 *
 * @ORM\Table(name="saved_jobs")
 * @ORM\Entity
 */
class SavedJobs
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
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

