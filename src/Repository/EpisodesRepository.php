<?php

namespace App\Repository;

use App\Entity\Episodes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Episodes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Episodes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Episodes[]    findAll()
 * @method Episodes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EpisodesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Episodes::class);
    }

    public function findFiveOrderByTitle() {

        // la même chose mais en versio QueryBuilder
        // on construit une requete 
        $builder = $this->createQueryBuilder('episodes');
        $builder->orderBy('episodes.number');
        $builder->setMaxResults(30);

        // on recupère la requete construite
        $query = $builder->getQuery();

        // je demande a doctrine d'éxecuter le requete et de me renvoyer les resultats
        return $query->getResult();
}}
