<?php

namespace App\Repository;

use App\Entity\BookingItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookingItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookingItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookingItem[]    findAll()
 * @method BookingItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookingItem::class);
    }


    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\ORMException
     */
    public function create($data)
    {
        $item = new BookingItem();
        $item->setQuantity($data->quantity);
        $item->setUnitPrice($data->price);
        $item->setProduct($data->product);
        $item->setBooking($data->order);

        $this->_em->persist($item);
        $this->_em->flush();

    }

    // /**
    //  * @return BookingItem[] Returns an array of BookingItem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BookingItem
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
