<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobApplications
 *
 * @ORM\Table(name="job_applications")
 * @ORM\Entity
 */
class JobApplications
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="resume_id", type="integer", nullable=false)
     */
    private $resumeId;

    /**
     * @var string
     *
     * @ORM\Column(name="cover_letter", type="string", length=5000, nullable=true)
     */
    private $coverLetter;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_posted", type="datetime", nullable=true)
     */
    private $datePosted;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

