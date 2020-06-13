<?php

namespace App\Repository;

use App\Entity\Mangas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mangas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mangas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mangas[]    findAll()
 * @method Mangas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MangasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mangas::class);
    }

    public function findFiveOrderByTitle() {

        // la même chose mais en versio QueryBuilder
        // on construit une requete 
        $builder = $this->createQueryBuilder('mangas');
        $builder->orderBy('mangas.title');
        $builder->setMaxResults(10);

        // on recupère la requete construite
        $query = $builder->getQuery();

        // je demande a doctrine d'éxecuter le requete et de me renvoyer les resultats
        return $query->getResult();
}
}
