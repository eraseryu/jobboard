<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resume
 *
 * @ORM\Table(name="resume")
 * @ORM\Entity
 */
class Resume
{
    /**
     * @var integer
     *
     * @ORM\Column(name="seeker_id", type="integer", nullable=false)
     */
    private $seekerId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=false)
     */
    private $views;

    /**
     * @var boolean
     *
     * @ORM\Column(name="searchable", type="boolean", nullable=false)
     */
    private $searchable = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="degree", type="integer", nullable=false)
     */
    private $degree;

    /**
     * @var integer
     *
     * @ORM\Column(name="experience", type="integer", nullable=false)
     */
    private $experience;

    /**
     * @var integer
     *
     * @ORM\Column(name="employee_type", type="integer", nullable=false)
     */
    private $employeeType;

    /**
     * @var integer
     *
     * @ORM\Column(name="position_type", type="integer", nullable=false)
     */
    private $positionType;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_category", type="integer", nullable=false)
     */
    private $jobCategory;

    /**
     * @var string
     *
     * @ORM\Column(name="min_salary", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $minSalary;

    /**
     * @var boolean
     *
     * @ORM\Column(name="to_relocate", type="boolean", nullable=false)
     */
    private $toRelocate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=5000, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=100, nullable=false)
     */
    private $link;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_updated", type="datetime", nullable=false)
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

