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
    public function findOneQueryBuilder($id)
    {
        $qb = $this->createQueryBuilder('job')
            ->andWhere('job.id = :id')
            ->join('job.jobCategory', 'jc')
            ->addSelect('jc')
            ->setParameter('id', $id)
            ->getQuery();

        return $qb->getOneOrNullResult();
    }

}
