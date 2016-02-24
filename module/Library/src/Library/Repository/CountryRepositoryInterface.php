<?php

namespace Library\Repository;

/**
 * This interface declares all the operations performed on country table
 *
 * @author pandiaraj
 */
interface CountryRepositoryInterface {
    /**
     * Retrieves all the countries
     * @return array Library\Entity\Country
     */
    public function findAll();
    
    /**
     * Retrieves country by the given entity
     * @param integer $id
     * @return Library\Entity\Country
     */
    public function find($id);
}
