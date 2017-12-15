<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmployerPlans
 *
 * @ORM\Table(name="employer_plans")
 * @ORM\Entity
 */
class EmployerPlans
{
    /**
     * @var integer
     *
     * @ORM\Column(name="emp_id", type="integer", nullable=false)
     */
    private $empId;

    /**
     * @var integer
     *
     * @ORM\Column(name="feat_emp", type="integer", nullable=true)
     */
    private $featEmp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="feat_emp_start", type="datetime", nullable=true)
     */
    private $featEmpStart;

    /**
     * @var integer
     *
     * @ORM\Column(name="feat_jobs", type="integer", nullable=true)
     */
    private $featJobs;

    /**
     * @var integer
     *
     * @ORM\Column(name="jobs", type="integer", nullable=true)
     */
    private $jobs;

    /**
     * @var integer
     *
     * @ORM\Column(name="membership", type="integer", nullable=true)
     */
    private $membership;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="membership_start", type="datetime", nullable=true)
     */
    private $membershipStart;

    /**
     * @var integer
     *
     * @ORM\Column(name="resume", type="integer", nullable=true)
     */
    private $resume;

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

