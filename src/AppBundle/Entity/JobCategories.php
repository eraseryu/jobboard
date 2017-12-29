<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * JobCategories
 *
 * @ORM\Table(name="job_categories", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity
 * @Serializer\ExclusionPolicy("all")
 */
class JobCategories
{
    /**
     *
     * @ORM\OneToMany(targetEntity="Jobs", mappedBy="jobCategory")
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     * @Serializer\Expose
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="featured", type="boolean", nullable=false)
     */
    private $featured;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Expose
     */
    private $id;

    /**
     * @return Jobs
     */
    public function getJob()
    {
        return $this->Job;
    }

    /**
     * @param Jobs $Job
     */
    public function setJob(Jobs $Job = null)
    {
        $this->Job = $Job;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}

