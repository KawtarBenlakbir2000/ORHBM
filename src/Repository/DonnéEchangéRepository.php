<?php

namespace App\Repository;

use App\Entity\DonnéEchangé;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DonnéEchangé>
 *
 * @method DonnéEchangé|null find($id, $lockMode = null, $lockVersion = null)
 * @method DonnéEchangé|null findOneBy(array $criteria, array $orderBy = null)
 * @method DonnéEchangé[]    findAll()
 * @method DonnéEchangé[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonnéEchangéRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DonnéEchangé::class);
    }

    public function add(DonnéEchangé $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DonnéEchangé $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DonnéEchangé[] Returns an array of DonnéEchangé objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DonnéEchangé
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
