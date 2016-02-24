<?php

namespace Library\Repository;

use Doctrine\ORM\EntityManager;

/**
 * Description of ActivityRepository
 *
 * @author pandiaraj
 */
class ActivityRepository extends BaseRepository implements ActivityRepositoryInterface {
    
    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }
    public function findAllUnreadMessagesForUser($userId) {
        return $this->entityManager->getRepository('Library\Entity\Activity')
                ->findBy(['user' => $userId, 'read' => false]);
    }

    public function findLastestActivitiesForUser($userId, $count) {
        $query = $this->entityManager
                ->createQuery('SELECT a FROM Library\Entity\Activity a WHERE a.active = true '
                        . 'AND a.user = :userId ORDER BY a.createdAt DESC')
                ->setParameter('userId', $userId)
                ->setMaxResults($count);
        return $query->getResult();
    }
}
