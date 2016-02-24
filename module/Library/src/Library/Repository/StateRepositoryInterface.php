<?php

namespace Library\Repository;

/**
 * Declares operations performed on states table
 * 
 * @author pandiaraj
 */
interface StateRepositoryInterface {
    
    /**
     * Retrieves all records from the states table
     * @return array \Library\Entity\State
     */
    public function findAll();
    
    /**
     * Retrieves state for the given id
     * @param integer $id
     */
    public function find($id);
    
    /**
     * Retrieve all states associated with the given country id
     * @param integer $countryId
     * @return array \Library\Entity\State
     */
    public function findByCountry($countryId);
}
