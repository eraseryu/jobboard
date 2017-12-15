<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transactions
 *
 * @ORM\Table(name="transactions")
 * @ORM\Entity
 */
class Transactions
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
     * @ORM\Column(name="feat_emp", type="integer", nullable=false)
     */
    private $featEmp = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="feat_jobs", type="integer", nullable=false)
     */
    private $featJobs = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="jobs", type="integer", nullable=false)
     */
    private $jobs = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="membership", type="integer", nullable=false)
     */
    private $membership = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="resume", type="integer", nullable=false)
     */
    private $resume = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="total_price", type="string", length=20, nullable=false)
     */
    private $totalPrice;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=false)
     */
    private $status = '1';

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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

