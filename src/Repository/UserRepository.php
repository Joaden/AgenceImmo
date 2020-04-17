<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }


    // Construct

    // Function For Users


    public function getVerifMailExist($mail)
    {
        $mail = htmlspecialchars($mail);
        $qb = $this->createQueryBuilder('a')
            ->select('COUNT(a)')
            ->where('a.mail = :mail')
            ->setParameter('mail', $mail);

        return $qb->getQuery()->getResult();
//        return $qb->getQuery()->getSingleScalarResult();
    }

    public function loadUserByUsername ( $usernameOrEmail )
    {
        return $this -> createQuery (
            'SELECT u
                FROM App\Entity\User u
                WHERE u.username = :query
                OR u.email = :query'
        )
            -> setParameter ( 'query' , $usernameOrEmail )
            -> getQuery ()
            -> getOneOrNullResult ();
    }

    /**
      * @return User[] Returns an array of User objects
      */
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getListAbo($date1, $date2)
    {
        $date1 = $date1->format('Y-m-d 00:00:00');
        $date2 = $date2->format('Y-m-d 23:59:59');

        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.userInfos', 'userInfos')
            ->leftJoin('a.userAddress', 'userAddress')
            ->leftJoin('a.roles', 'roles')

            ->where('userInfos.dateInscription >= :date1')
            ->setParameter('date1', $date1)
            ->andWhere('userInfos.dateInscription <= :date2')
            ->setParameter('date2', $date2)
            ->andWhere('roles.id > :idrole')
            ->setParameter('idrole', '5')
            ->orderBy('userInfos.dateInscription', 'DESC')
        ;

        return $qb->getQuery()
            ->getResult();
    }

    public function getForListAbo()
    {
        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.roles', 'roles')
            ->where("roles.name = 'ROLE_PREMIUM' or
                     roles.name = 'ROLE_FREEMIUM'")
        ;

        return $qb->getQuery()->getResult();
    }

    public function getUserPremium()
    {
        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.roles', 'roles')
            ->where("roles.name = 'ROLE_PREMIUM' ")
        ;

        return $qb->getQuery()->getResult();
    }

    public function getUsersByDate($date1, $date2)
    {

        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.userInfos', 'userInfos')
            ->leftJoin('a.userAddress', 'userAddress')
            ->leftJoin('a.roles', 'roles')
            ->where('userInfos.dateInscription >= :date1')
            ->setParameter('date1', $date1)
            ->andWhere('userInfos.dateInscription <= :date2')
            ->setParameter('date2', $date2)
            ->andWhere('a.mail is not Null')
            ->andWhere('roles.id > :idrole')
            ->setParameter('idrole', '5')
            ->orderBy('userInfos.dateInscription', 'DESC')
        ;

        return $qb->getQuery()
            ->getResult();
    }

    public function getAdmin()
    {
        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.roles', 'roles')
            ->where("roles.name = 'ROLE_SUPER_ADMIN' or
                     roles.name = 'ROLE_ADMIN' or
                     roles.name = 'ROLE_MODERATOR' or
                     roles.name = 'ROLE_AFFILIE' or
                     roles.name = 'ROLE_ASSO' or
                     roles.name = 'ROLE_COLIS'")
        ;

        return $qb->getQuery()->getResult();
    }

    public function findOneByRoleAdmin($admin): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.roles = :val')
            ->setParameter('val', $admin)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findOneByRoleUser($user): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.roles = :val')
            ->setParameter('val', $user)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function getUserByCallUnsubscribe($mail, $key)
    {
        $qb = $this->createQueryBuilder('a')
            ->where('a.mail = :mail')
            ->setParameter('mail', $mail)
            ->leftJoin('a.userInfos', 'userInfos')
            ->andWhere('a.callUnsubscribe = :callUnsubscribe')
            ->setParameter('callUnsubscribe', $key)
        ;
        return $qb->getQuery()
            ->getOneOrNullResult();
    }

}
