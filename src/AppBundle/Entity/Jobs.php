<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Jobs
 *
 * @ORM\Table(name="jobs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JobRepository")
 * @Serializer\ExclusionPolicy("all")
 */
class Jobs
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     * @Serializer\Expose
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     * @Serializer\Expose
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="JobCategories", inversedBy="job")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Expose
     */
    private $jobCategory;

    /**
     * @var integer
     *
     * @ORM\Column(name="employee_type", type="smallint", nullable=false)
     * @Serializer\Expose
     */
    private $employeeType;

    /**
     * @var integer
     *
     * @ORM\Column(name="position_type", type="smallint", nullable=false)
     * @Serializer\Expose
     */
    private $positionType;

    /**
     * @var integer
     *
     * @ORM\Column(name="experience_level", type="integer", nullable=false)
     * @Serializer\Expose
     */
    private $experienceLevel;

    /**
     * @var integer
     *
     * @ORM\Column(name="school_level", type="integer", nullable=false)
     * @Serializer\Expose
     */
    private $schoolLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="salary", type="decimal", precision=10, scale=0, nullable=false)
     * @Serializer\Expose
     */
    private $salary;

    /**
     * @var integer
     *
     * @ORM\Column(name="country", type="integer", nullable=false)
     * @Serializer\Expose
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", nullable=false)
     * @Serializer\Expose
     */
    private $state;

    /**
     * @var integer
     *
     * @ORM\Column(name="city", type="integer", nullable=false)
     * @Serializer\Expose
     */
    private $city = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer", nullable=false)
     * @Serializer\Expose
     */
    private $companyId;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_email", type="string", length=100, nullable=false)
     * @Serializer\Expose
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
     * @Serializer\Expose
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
     * @Serializer\Expose
     */
    private $dateExpired;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Expose
     */
    private $id;


    public function __construct()
    {
        $this->dateUpdated = new \DateTime();
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getJobCategory()
    {
        return $this->jobCategory;
    }

    /**
     * @param mixed $jobCategory
     */
    public function setJobCategory($jobCategory)
    {
        $this->jobCategory = $jobCategory;
    }

    /**
     * @return int
     */
    public function getEmployeeType()
    {
        return $this->employeeType;
    }

    /**
     * @param int $employeeType
     */
    public function setEmployeeType(int $employeeType)
    {
        $this->employeeType = $employeeType;
    }

    /**
     * @return int
     */
    public function getPositionType()
    {
        return $this->positionType;
    }

    /**
     * @param int $positionType
     */
    public function setPositionType(int $positionType)
    {
        $this->positionType = $positionType;
    }

    /**
     * @return int
     */
    public function getExperienceLevel()
    {
        return $this->experienceLevel;
    }

    /**
     * @param int $experienceLevel
     */
    public function setExperienceLevel(int $experienceLevel)
    {
        $this->experienceLevel = $experienceLevel;
    }

    /**
     * @return int
     */
    public function getSchoolLevel()
    {
        return $this->schoolLevel;
    }

    /**
     * @param int $schoolLevel
     */
    public function setSchoolLevel(int $schoolLevel)
    {
        $this->schoolLevel = $schoolLevel;
    }

    /**
     * @return string
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param string $salary
     */
    public function setSalary(string $salary)
    {
        $this->salary = $salary;
    }

    /**
     * @return int
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param int $country
     */
    public function setCountry(int $country)
    {
        $this->country = $country;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state
     */
    public function setState(int $state)
    {
        $this->state = $state;
    }

    /**
     * @return int
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param int $city
     */
    public function setCity(int $city)
    {
        $this->city = $city;
    }

    /**
     * @return int
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param int $companyId
     */
    public function setCompanyId(int $companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * @param string $contactEmail
     */
    public function setContactEmail(string $contactEmail)
    {
        $this->contactEmail = $contactEmail;
    }

    /**
     * @return int
     */
    public function getExpiresAfter()
    {
        return $this->expiresAfter;
    }

    /**
     * @param int $expiresAfter
     */
    public function setExpiresAfter(int $expiresAfter)
    {
        $this->expiresAfter = $expiresAfter;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }

    /**
     * @return int
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param int $views
     */
    public function setViews(int $views)
    {
        $this->views = $views;
    }

    /**
     * @return bool
     */
    public function isFeatured()
    {
        return $this->featured;
    }

    /**
     * @param bool $featured
     */
    public function setFeatured(bool $featured)
    {
        $this->featured = $featured;
    }

    /**
     * @return bool
     */
    public function isNewRecord()
    {
        return $this->newRecord;
    }

    /**
     * @param bool $newRecord
     */
    public function setNewRecord(bool $newRecord)
    {
        $this->newRecord = $newRecord;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     */
    public function setDateCreated(\DateTime $dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return \DateTime
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * @param \DateTime $dateUpdated
     */
    public function setDateUpdated(\DateTime $dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
    }

    /**
     * @return \DateTime
     */
    public function getDatePosted()
    {
        return $this->datePosted;
    }

    /**
     * @param \DateTime $datePosted
     */
    public function setDatePosted(\DateTime $datePosted)
    {
        $this->datePosted = $datePosted;
    }

    /**
     * @return \DateTime
     */
    public function getDateExpired()
    {
        return $this->dateExpired;
    }

    /**
     * @param \DateTime $dateExpired
     */
    public function setDateExpired(\DateTime $dateExpired)
    {
        $this->dateExpired = $dateExpired;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}

