<?php

namespace App\Repository;

use App\Entity\GeUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
 * @method GeUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeUser[]    findAll()
 * @method GeUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeUser::class);
    }

    // /**
    //  * @return GeUser[] Returns an array of GeUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GeUsers
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
