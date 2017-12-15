<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banners
 *
 * @ORM\Table(name="banners")
 * @ORM\Entity
 */
class Banners
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="banners_group", type="smallint", nullable=false)
     */
    private $bannersGroup;

    /**
     * @var integer
     *
     * @ORM\Column(name="banner_type", type="smallint", nullable=false)
     */
    private $bannerType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="from_date", type="datetime", nullable=false)
     */
    private $fromDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="smallint", nullable=false)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255, nullable=true)
     */
    private $comments;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=true)
     */
    private $views;

    /**
     * @var integer
     *
     * @ORM\Column(name="clicks", type="integer", nullable=true)
     */
    private $clicks;

    /**
     * @var string
     *
     * @ORM\Column(name="source_file", type="string", length=100, nullable=true)
     */
    private $sourceFile;

    /**
     * @var string
     *
     * @ORM\Column(name="html_text", type="string", length=5000, nullable=true)
     */
    private $htmlText;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @var integer
     *
     * @ORM\Column(name="pic_width", type="integer", nullable=true)
     */
    private $picWidth;

    /**
     * @var integer
     *
     * @ORM\Column(name="pic_height", type="integer", nullable=true)
     */
    private $picHeight;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

