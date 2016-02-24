<?php

namespace Library\Service;

/**
 * LibraryServiceInterface
 *
 * @author pandiaraj
 */
interface LibraryServiceInterface {
    /**
     * Returns all states for the given country id
     * 
     * @param int $countryId
     * @param array Library\Model\State
     */
    public function getStatesForCountry($countryId);
    
    public function getAllStates();
    
    public function getState($stateId);
    
    public function getCitiesForState($stateId);
    
    public function getAllCities();
    
    public function getCity($cityId);
    
    public function getAreasForCity($cityId);
    
    public function getAllAreas();
    
    public function getArea($id);
    
    public function readUnreadActivitiesForUser($userId);
    
    public function getLatestActivitiesForUser($userId, $count);
}
