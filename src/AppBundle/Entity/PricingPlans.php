<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PricingPlans
 *
 * @ORM\Table(name="pricing_plans")
 * @ORM\Entity
 */
class PricingPlans
{
    /**
     * @var integer
     *
     * @ORM\Column(name="time_or_count_id", type="integer", nullable=false)
     */
    private $timeOrCountId;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_pricing_id", type="integer", nullable=false)
     */
    private $typePricingId;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

