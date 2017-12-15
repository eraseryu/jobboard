<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SiteSettings
 *
 * @ORM\Table(name="site_settings")
 * @ORM\Entity
 */
class SiteSettings
{
    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", length=50, nullable=false)
     */
    private $companyName;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=50, nullable=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=20, nullable=false)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=30, nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=30, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="website_name", type="string", length=50, nullable=false)
     */
    private $websiteName;

    /**
     * @var string
     *
     * @ORM\Column(name="website_url", type="string", length=100, nullable=false)
     */
    private $websiteUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="email_server", type="string", length=50, nullable=false)
     */
    private $emailServer;

    /**
     * @var string
     *
     * @ORM\Column(name="email_username", type="string", length=50, nullable=true)
     */
    private $emailUsername;

    /**
     * @var string
     *
     * @ORM\Column(name="email_pass", type="string", length=50, nullable=true)
     */
    private $emailPass;

    /**
     * @var string
     *
     * @ORM\Column(name="email_address_no_replay", type="string", length=50, nullable=false)
     */
    private $emailAddressNoReplay;

    /**
     * @var string
     *
     * @ORM\Column(name="email_address_contact", type="string", length=50, nullable=false)
     */
    private $emailAddressContact;

    /**
     * @var boolean
     *
     * @ORM\Column(name="email_confiramtion", type="boolean", nullable=false)
     */
    private $emailConfiramtion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="job_activation", type="boolean", nullable=false)
     */
    private $jobActivation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="job_application", type="boolean", nullable=false)
     */
    private $jobApplication;

    /**
     * @var boolean
     *
     * @ORM\Column(name="job_details", type="boolean", nullable=false)
     */
    private $jobDetails;

    /**
     * @var boolean
     *
     * @ORM\Column(name="free_job_postings", type="boolean", nullable=true)
     */
    private $freeJobPostings;

    /**
     * @var boolean
     *
     * @ORM\Column(name="free_resume_search", type="boolean", nullable=true)
     */
    private $freeResumeSearch;

    /**
     * @var integer
     *
     * @ORM\Column(name="payment_processor", type="integer", nullable=true)
     */
    private $paymentProcessor;

    /**
     * @var string
     *
     * @ORM\Column(name="field1", type="string", length=50, nullable=true)
     */
    private $field1;

    /**
     * @var string
     *
     * @ORM\Column(name="field2", type="string", length=50, nullable=true)
     */
    private $field2;

    /**
     * @var string
     *
     * @ORM\Column(name="app_title", type="string", length=255, nullable=true)
     */
    private $appTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="app_keywords", type="string", length=255, nullable=true)
     */
    private $appKeywords;

    /**
     * @var integer
     *
     * @ORM\Column(name="default_country", type="integer", nullable=true)
     */
    private $defaultCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="app_description", type="string", length=255, nullable=true)
     */
    private $appDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="app_currency", type="string", length=50, nullable=true)
     */
    private $appCurrency = 'USD';

    /**
     * @var string
     *
     * @ORM\Column(name="ga_code", type="string", length=1000, nullable=true)
     */
    private $gaCode;

    /**
     * @var boolean
     *
     * @ORM\Column(name="site_static_design", type="boolean", nullable=false)
     */
    private $siteStaticDesign = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

