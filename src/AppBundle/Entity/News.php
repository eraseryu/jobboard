<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NewsRepository")
 * @Serializer\ExclusionPolicy("all")
 *
 */
class News
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=500, nullable=false)
     * @Serializer\Expose
     * @Assert\NotBlank(message="Please enter a title")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=5000, nullable=false)
     * @Serializer\Expose
     * @Assert\NotBlank(message="Please enter a text")
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=500, nullable=true)
     * @Serializer\Expose
     */
    private $link;

    /**
     * @var integer
     *
     * @ORM\Column(name="rang", type="integer", nullable=false)
     * @Serializer\Expose
     */
    private $rang;

    /**
     * @var integer
     *
     * @ORM\Column(name="show_rec", type="smallint", nullable=false)
     * @Serializer\Expose
     */
    private $showRec = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_posted", type="datetime", nullable=true)
     */
    private $datePosted;

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
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return int
     */
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * @param int $rang
     */
    public function setRang($rang)
    {
        $this->rang = $rang;
    }

    /**
     * @return int
     */
    public function getShowRec()
    {
        return $this->showRec;
    }

    /**
     * @param int $showRec
     */
    public function setShowRec($showRec)
    {
        $this->showRec = $showRec;
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
    public function setDatePosted($datePosted)
    {
        $this->datePosted = $datePosted;
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
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->dateUpdated = new \DateTime();
    }
}

