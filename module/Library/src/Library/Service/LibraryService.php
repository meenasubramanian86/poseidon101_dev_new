<?php

namespace Library\Service;

use Library\Mapper\StateMapperInterface;
use Library\Model\LibraryTable;
use Library\Repository\StateRepositoryInterface;
use Library\Repository\CityRepositoryInterface;
use Library\Repository\AreaRepositoryInterface;
use Library\Repository\ActivityRepositoryInterface;

class LibraryService extends AbstractBaseService implements LibraryServiceInterface {
    
    private $stateMapper;
    private $stateRepository;
    private $cityRepository;
    private $areaRepository;
    private $activityRepository;

    public function __construct(StateMapperInterface $stateMapper, 
            StateRepositoryInterface $stateRepository,
            CityRepositoryInterface $cityRepository,
            AreaRepositoryInterface $areaRepository,
            ActivityRepositoryInterface $activityRepository) {
        //$this->adapter = $adapter;
        $this->stateMapper = $stateMapper;
        $this->stateRepository = $stateRepository;
        $this->cityRepository = $cityRepository;
        $this->areaRepository = $areaRepository;
        $this->activityRepository = $activityRepository;
    }

    public function checkToken($headers) {

        $token = $headers->get('X-AUTH-TOKEN')->getFieldValue();
        $id = $headers->get('ID')->getFieldValue();
        $role = $headers->get('ROLE')->getFieldValue();


        if ($role == 'admin') {
            $setdata = array();
            $setdata['user_id'] = $id;
            $setdata['token'] = $token;
            $libraryTable = new LibraryTable($this->adapter);
            $tokenstatus = $libraryTable->checkadminToken($setdata);
            return $tokenstatus;
        }
    }

    // TODO Implement this method!
    public function recordAlreadyExist($params) {
        return true;
    }

    public function getStatesForCountry($countryId) {
        //echo $countryId; exit;
        return $this->stateRepository->findByCountry($countryId);
    }

    public function getAllStates() { 
        return $this->stateRepository->findAll();
    }
    
    public function getState($stateId) {
        return $this->stateRepository->find($stateId);
    }

    public function getAllCities() {
        return $this->cityRepository->findAll();
    }

    public function getCitiesForState($stateId) {
        return $this->cityRepository->findByState($stateId);
    }

    public function getCity($cityId) {
        return $this->cityRepository->find($cityId);
    }

    public function getAllAreas() {
        return $this->areaRepository->findAll();
    }

    public function getArea($id) {
        return $this->areaRepository->find($id);
    }

    public function getAreasForCity($cityId) {
        return $this->areaRepository->findByCity($cityId);
    }

    public function readUnreadActivitiesForUser($userId) {
        return $this->activityRepository->findAllUnreadMessagesForUser($userId);
    }

    public function getLatestActivitiesForUser($userId, $count) {
        return $this->activityRepository->findLastestActivitiesForUser($userId, $count);
    }
}
