<?php

namespace Library\Mapper;

/**
 * Mapper class to interact with 'states' table
 * @author pandiaraj
 */
interface StateMapperInterface {
    
    /**
     * Fetches all states associated with the country id
     * @param int $countryId
     * @return array \Library\Model\State
     */
    public function findAllStates($countryId);
}
