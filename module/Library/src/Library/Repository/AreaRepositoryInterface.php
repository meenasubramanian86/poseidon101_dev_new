<?php

namespace Library\Repository;

interface AreaRepositoryInterface {

    public function find($id);

    public function findAll();

    public function findByCity($cityId);
}
