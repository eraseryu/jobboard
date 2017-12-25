<?php

namespace AppBundle\Repository;


use AppBundle\Entity\Jobs;
use Doctrine\ORM\EntityRepository;

class JobRepository extends EntityRepository
{
    /**
     * @param  integer $id
     * @return Jobs
     */
    public function findOneById($id)
    {
        return $this->findOneBy(array('id' => $id));
    }

}
