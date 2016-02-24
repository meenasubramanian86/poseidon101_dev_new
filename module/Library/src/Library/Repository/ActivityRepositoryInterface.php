<?php

namespace Library\Repository;

interface ActivityRepositoryInterface {

    public function findAllUnreadMessagesForUser($userId);
    public function findLastestActivitiesForUser($userId, $count);
}
