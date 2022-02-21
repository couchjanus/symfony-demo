<?php

namespace App\Repository;

use App\Entity\Booking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Booking|null find($id, $lockMode = null, $lockVersion = null)
 * @method Booking|null findOneBy(array $criteria, array $orderBy = null)
 * @method Booking[]    findAll()
 * @method Booking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Booking::class);
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\ORMException
     */
    public function create($data): Booking
    {
        $order = new Booking();

        $order->setCustomer($data->customer);
        $order->setShippingPrice($data->shipping_price);
        $order->setShippingMethod($data->shipping_method);
        $order->setShippingCity($data->shipping_city);
        $order->setShippingState($data->shipping_state);
        $order->setShippingStreet($data->shipping_street);
        $order->setFirstName($data->first_name);
        $order->setLastName($data->last_name);
        $order->setZipCode($data->zip_code);
        $order->setPhoneNumber($data->phone_number);
        $order->setTotalPrice(number_format($data->total_price, 2, '.', ''));

        $this->_em->persist($order);
        $this->_em->flush();
        return $order;
    }

    // /**
    //  * @return Booking[] Returns an array of Booking objects
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
    public function findOrdersByCustomer($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.customer = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }
//
    /*
    public function findOneBySomeField($value): ?Booking
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
