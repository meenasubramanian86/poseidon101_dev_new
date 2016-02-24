<?php

namespace Library\Repository;

use Doctrine\ORM\EntityManager;

/**
 * Description of CityRepository
 *
 * @author pandiaraj
 */
class CityRepository extends BaseRepository implements CityRepositoryInterface {
    
    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function find($id) {
        return $this->entityManager->find('Library\Entity\City', (int)$id);
    }

    public function findAll() {
        return $this->entityManager->getRepository('Library\Entity\City')
                ->findBy(array('active' => true));

    }

    public function findByState($stateId) {
        $qb = $this->entityManager->createQueryBuilder()
                ->from('Library\Entity\City', 'c')
                ->select('c, s') // s is State entity
                ->join('c.state', 's')
                ->where('s.id = :stateId AND c.active = true AND s.active = true')
                ->setParameter('stateId', $stateId);
        $query = $qb->getQuery();
        
        return $query->getResult();
    }
}
