<?php

namespace App\Repository;

use App\Entity\FinishedTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FinishedTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FinishedTest::class);
    }

    public function getLastResults()
    {
        $ids = array_map(
            function ($v) {
                return $v[1];
            }, $this->createQueryBuilder('ft')
            ->select('ft.testName', 'ft.serviceName', 'MAX(ft.id)')
            ->groupBy('ft.testName, ft.serviceName')
            ->getQuery()->getArrayResult());

        return $this->createQueryBuilder('ft')
            ->andWhere('ft.id IN (:ids)')
            ->setParameter('ids', $ids)
            ->getQuery()->getArrayResult();
    }
}
