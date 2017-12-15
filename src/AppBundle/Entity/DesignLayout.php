<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DesignLayout
 *
 * @ORM\Table(name="design_layout")
 * @ORM\Entity
 */
class DesignLayout
{
    /**
     * @var string
     *
     * @ORM\Column(name="page_name", type="string", length=30, nullable=false)
     */
    private $pageName;

    /**
     * @var integer
     *
     * @ORM\Column(name="belongs_to_section", type="integer", nullable=false)
     */
    private $belongsToSection;

    /**
     * @var string
     *
     * @ORM\Column(name="element_type", type="string", length=30, nullable=false)
     */
    private $elementType;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_field", type="integer", nullable=false)
     */
    private $orderField;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=30, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="border", type="string", length=30, nullable=false)
     */
    private $border;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

