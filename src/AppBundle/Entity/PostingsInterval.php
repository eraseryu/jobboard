<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PostingsInterval
 *
 * @ORM\Table(name="postings_interval")
 * @ORM\Entity
 */
class PostingsInterval
{
    /**
     * @var integer
     *
     * @ORM\Column(name="min", type="integer", nullable=false)
     */
    private $min;

    /**
     * @var integer
     *
     * @ORM\Column(name="max", type="integer", nullable=false)
     */
    private $max;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=30, nullable=false)
     */
    private $label;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

