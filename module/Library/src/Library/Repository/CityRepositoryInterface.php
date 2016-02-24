<?php

namespace Library\Repository;

/**
 * Description of CityRepositoryInterface
 *
 * @author pandiaraj
 */
interface CityRepositoryInterface {

    public function findAll();

    public function find($id);

    public function findByState($stateId);
}
