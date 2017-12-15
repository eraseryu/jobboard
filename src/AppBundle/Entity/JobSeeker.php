<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JobSeeker
 *
 * @ORM\Table(name="job_seeker", uniqueConstraints={@ORM\UniqueConstraint(name="username", columns={"username"})})
 * @ORM\Entity
 */
class JobSeeker
{
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=30, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=200, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=20, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=30, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=30, nullable=false)
     */
    private $address;

    /**
     * @var integer
     *
     * @ORM\Column(name="city", type="integer", nullable=false)
     */
    private $city = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=20, nullable=false)
     */
    private $zipCode;

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
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=30, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=30, nullable=true)
     */
    private $website;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="datetime", nullable=true)
     */
    private $birthday;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gender", type="boolean", nullable=false)
     */
    private $gender = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer", nullable=false)
     */
    private $active = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="activation_code", type="string", length=50, nullable=true)
     */
    private $activationCode;

    /**
     * @var boolean
     *
     * @ORM\Column(name="new_record", type="boolean", nullable=false)
     */
    private $newRecord = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_create", type="datetime", nullable=false)
     */
    private $timeCreate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_update", type="datetime", nullable=false)
     */
    private $timeUpdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=false)
     */
    private $lastLogin;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

