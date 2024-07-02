<?php

namespace App\Repository;

use App\Entity\Fonctionnalité;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fonctionnalité>
 *
 * @method Fonctionnalité|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fonctionnalité|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fonctionnalité[]    findAll()
 * @method Fonctionnalité[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FonctionnalitéRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fonctionnalité::class);
    }

    public function add(Fonctionnalité $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Fonctionnalité $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Fonctionnalité[] Returns an array of Fonctionnalité objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Fonctionnalité
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
