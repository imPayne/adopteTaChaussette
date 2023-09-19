<?php

namespace App\Repository;

use App\Entity\CarRegistration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarRegistration>
 *
 * @method CarRegistration|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarRegistration|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarRegistration[]    findAll()
 * @method CarRegistration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRegistrationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarRegistration::class);
    }

//    /**
//     * @return CarRegistration[] Returns an array of CarRegistration objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CarRegistration
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
