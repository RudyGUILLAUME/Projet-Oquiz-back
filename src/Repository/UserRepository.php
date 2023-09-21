<?php

namespace App\Repository;

use App\Entity\User;
use App\Model\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function add(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findBySearch(SearchData $searchData, PaginatorInterface $paginator): PaginationInterface
    {
        // Création d'un objet QueryBuilder pour l'entité représentée par 'a'.

        $data = $this->createQueryBuilder('u')
            ->where('u.username LIKE :username_published')
            ->setParameter('username_published', '%USERNAME_PUBLISHED%');
                // Si le critère 'q' dans l'objet SearchData n'est pas vide,
        // on ajoute une autre condition dans la clause WHERE : le champ 'response' doit être similaire à la valeur du critère 'q'.

        if(!empty($searchData->q)) {
            $data = $data
                ->orWhere('u.username LIKE :q')
                ->setParameter('q', "%{$searchData->q}%");
        }

        // Exécution de la requête en récupérant les résultats à l'aide de getResult().
        $data = $data
            ->getQuery()
            ->getResult();

        // Les résultats sont ensuite paginés à l'aide de PaginatorInterface avec la méthode paginate().
        $answers = $paginator->paginate($data, $searchData->page, 9);

        return $answers;
    }

//    /**
//     * @return User[] Returns an array of User objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
