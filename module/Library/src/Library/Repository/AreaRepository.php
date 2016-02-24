<?php

namespace Library\Repository;

use Doctrine\ORM\EntityManager;

/**
 * Description of AreaRepository
 *
 * @author pandiaraj
 */
class AreaRepository extends BaseRepository implements AreaRepositoryInterface {
    
    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function find($id) {
        return $this->entityManager->find('Library\Entity\Area', (int)$id);
    }

    public function findAll() {
        return $this->entityManager->getRepository('Library\Entity\Area')
                ->findBy(array('active' => true));
    }

    public function findByCity($cityId) {
        $qb = $this->entityManager->createQueryBuilder()
                ->from('Library\Entity\Area', 'a')
                ->select('a, c') // c is City entity
                ->join('a.city', 'c')
                ->where('c.id = :cityId AND c.active = true AND a.active = true')
                ->setParameter('cityId', $cityId);
        $query = $qb->getQuery();
        
        return $query->getResult();
    }
}
