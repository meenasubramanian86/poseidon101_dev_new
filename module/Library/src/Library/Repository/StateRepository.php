<?php

namespace Library\Repository;

use Doctrine\ORM\EntityManager;

class StateRepository extends BaseRepository implements StateRepositoryInterface {
    
    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function find($id) {
        return $this->entityManager->find('Library\Entity\State', (int)$id);
    }

    public function findAll() {
        return $this->entityManager->getRepository('Library\Entity\State')
                ->findBy(array('active' => true));
    }

    /**
     * Returns all the states associated with the given country id
     * This method uses Doctrine's query builder because the query has to check the owning
     * side's field (i.e. Country table's is_active field), which is not supported
     * by Doctrine findBy method.
     * 
     * @param integer $countryId
     * @return array \Library\Entity\Sate
     */
    public function findByCountry($countryId) {
        $qb = $this->entityManager->createQueryBuilder()
                ->from('Library\Entity\State', 's')
                ->select('s, c') // c is Country entity
                ->join('s.country', 'c')
                ->where('c.id = :countryId')
                ->setParameter('countryId', $countryId);
        $query = $qb->getQuery();
        
        return $query->getResult();
    }
}
