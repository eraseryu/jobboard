<?php

namespace AppBundle\Repository;

use AppBundle\Entity\News;
use Doctrine\ORM\EntityRepository;

class NewsRepository extends EntityRepository
{
    /**
     * @param  integer $id
     * @return News
     */
    public function findOneById($id)
    {
        return $this->findOneBy(array('id' => $id));
    }

}