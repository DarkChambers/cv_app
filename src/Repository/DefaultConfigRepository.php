<?php

namespace App\Repository;

use App\Entity\DefaultConfig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DefaultConfig|null find($id, $lockMode = null, $lockVersion = null)
 * @method DefaultConfig|null findOneBy(array $criteria, array $orderBy = null)
 * @method DefaultConfig[]    findAll()
 * @method DefaultConfig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DefaultConfigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DefaultConfig::class);
    }

    // /**
    //  * @return DefaultConfig[] Returns an array of DefaultConfig objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DefaultConfig
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
