<?php

namespace App\Repository;

use App\Entity\Animation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Movies|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movies|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movies[]    findAll()
 * @method Movies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animation::class);
    }

    public function findFiveOrderByTitle() {

        // la même chose mais en versio QueryBuilder
        // on construit une requete 
        $builder = $this->createQueryBuilder('animation');
        $builder->orderBy('animation.title');
        $builder->setMaxResults(10);

        // on recupère la requete construite
        $query = $builder->getQuery();

        // je demande a doctrine d'éxecuter le requete et de me renvoyer les resultats
        return $query->getResult();
}}