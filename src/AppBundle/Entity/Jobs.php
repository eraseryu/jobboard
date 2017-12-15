<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jobs
 *
 * @ORM\Table(name="jobs")
 * @ORM\Entity
 */
class Jobs
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="job_category", type="smallint", nullable=false)
     */
    private $jobCategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="employee_type", type="smallint", nullable=false)
     */
    private $employeeType;

    /**
     * @var integer
     *
     * @ORM\Column(name="position_type", type="smallint", nullable=false)
     */
    private $positionType;

    /**
     * @var integer
     *
     * @ORM\Column(name="experience_level", type="integer", nullable=false)
     */
    private $experienceLevel;

    /**
     * @var integer
     *
     * @ORM\Column(name="school_level", type="integer", nullable=false)
     */
    private $schoolLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="salary", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $salary;

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
    private $city = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer", nullable=false)
     */
    private $companyId;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_email", type="string", length=100, nullable=false)
     */
    private $contactEmail;

    /**
     * @var integer
     *
     * @ORM\Column(name="expires_after", type="integer", nullable=true)
     */
    private $expiresAfter = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=true)
     */
    private $views = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="featured", type="boolean", nullable=true)
     */
    private $featured = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="new_record", type="boolean", nullable=false)
     */
    private $newRecord = '1';

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
     * @var \DateTime
     *
     * @ORM\Column(name="date_posted", type="datetime", nullable=true)
     */
    private $datePosted;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_expired", type="datetime", nullable=true)
     */
    private $dateExpired;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

