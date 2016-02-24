<?php

namespace Library\Repository;

use Doctrine\ORM\EntityManager;

/**
 * Description of CountryRepository
 *
 * @author pandiaraj
 */
class CountryRepository extends BaseRepository implements CountryRepositoryInterface {
    
    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }
    
    public function find($id) {
        return $this->entityManager->find('Library\Entity\Country', (int)$id);
    }

    public function findAll() {
        return $this->entityManager->getRepository('Library\Entity\Country')->findAll();
    }
}
