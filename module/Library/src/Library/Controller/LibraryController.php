<?php

//register

namespace Library\Controller;

use Library\Service\LibraryServiceInterface;
use Zend\View\Model\JsonModel;
use Library\Util\ErrorCodeConstants;
use Library\Util\Constants;

class LibraryController extends AbstractBaseController {

    private $libraryService;

    public function __construct(LibraryServiceInterface $libraryService) {
        $this->libraryService = $libraryService;
    }

    /**
     * This method will return all states associated with the given country id
     * @return JsonModel
     */
    public function stateListAction() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

        $response = array();

        $countryId = $this->params('id');
        if (!isset($countryId) || $countryId <= 0) {
            $response['status'] = Constants::FAILURE;
            $response['errorCode'] = ErrorCodeConstants::INVALID_COUNTRY_ID;
            $response['errorMessage'] = "Invalid countryId: {$countryId}";
        } else {
            $states = $this->libraryService->getStatesForCountry($countryId);
            if (isset($states) && count($states) > 0) {
                $response[] = $this->createStatesResponse($states);
            } else {
                $response['status'] = Constants::FAILURE;
                $response['errorCode'] = ErrorCodeConstants::NO_STATES_FOUND_FOR_COUNTRY;
                $response['errorMessage'] = "No active states found for countryId: {$countryId}";
            }
        }
        return new JsonModel($response);
    }

    /**
     * This method return all states (irrespective of country)
     * @return JsonModel
     */
    public function getAllStatesAction() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

        $response = array();

        $states = $this->libraryService->getAllStates();
        if (isset($states) && count($states) > 0) {
            $response[] = $this->createStatesResponse($states);
        } else {
            $response['status'] = Constants::FAILURE;
            $response['errorCode'] = ErrorCodeConstants::NO_STATES_FOUND;
            $response['errorMessage'] = "No active states found";
        }

        return new JsonModel($response);
    }

    public function getStateAction() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

        $stateId = $this->params('id');
        $response = array();

        if (!isset($stateId) || $stateId <= 0) {
            $response['status'] = Constants::FAILURE;
            $response['errorCode'] = ErrorCodeConstants::INVALID_STATE_ID;
            $response['errorMessage'] = "Invalid stateId: {$stateId}";
        } else {
            $state = $this->libraryService->getState($stateId);
            if (isset($state)) {
                $response['id'] = $state->getId();
                $response['name'] = $state->getName();
                $response['status'] = Constants::SUCCESS;
            } else {
                $response['status'] = Constants::FAILURE;
                $response['errorCode'] = ErrorCodeConstants::NO_STATE_FOUND_FOR_ID;
                $response['errorMessage'] = "No active states found for stateId: {$stateId}";
            }
        }
        return new JsonModel($response);
    }

    public function cityListAction() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

        $stateId = $this->params('id');
        $response = array();

        if (!isset($stateId) || $stateId <= 0) {
            $response['status'] = Constants::FAILURE;
            $response['errorCode'] = ErrorCodeConstants::INVALID_STATE_ID;
            $response['errorMessage'] = "Invalid stateId: {$stateId}";
        } else {
            $cities = $this->libraryService->getCitiesForState($stateId);
            if (isset($cities) && count($cities) > 0) {
                $response[] = $this->createCitiesResponse($cities);
            } else {
                $response['status'] = Constants::FAILURE;
                $response['errorCode'] = ErrorCodeConstants::NO_CITIES_FOUND_FOR_STATE;
                $response['errorMessage'] = "No active cities found for stateId: {$stateId}";
            }
        }
        return new JsonModel($response);
    }

    public function getAllCitiesAction() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

        $response = array();

        $cities = $this->libraryService->getAllCities();
        if (isset($cities) && count($cities) > 0) {
            $response[] = $this->createCitiesResponse($cities);
        } else {
            $response['status'] = Constants::FAILURE;
            $response['errorCode'] = ErrorCodeConstants::NO_CITIES_FOUND;
            $response['errorMessage'] = "No active cities";
        }
        return new JsonModel($response);
    }

    public function getCityAction() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

        $cityId = $this->params('id');

        if (!isset($cityId) || $cityId <= 0) {
            $response['status'] = Constants::FAILURE;
            $response['errorCode'] = ErrorCodeConstants::INVALID_CITY_ID;
            $response['errorMessage'] = "Invalid cityId: {$cityId}";
        } else {
            $city = $this->libraryService->getCity($cityId);
            if (isset($city)) {
                $response['id'] = $city->getId();
                $response['name'] = $city->getName();
                $response['status'] = Constants::SUCCESS;
            } else {
                $response['status'] = Constants::FAILURE;
                $response['errorCode'] = ErrorCodeConstants::NO_CITIES_FOUND_FOR_ID;
                $response['errorMessage'] = "No active cities found for cityId: {$cityId}";
            }
        }
        return new JsonModel($response);
    }

    public function areaListAction() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

        $response = array();

        $cityId = $this->params('id');
        if (!isset($cityId) || $cityId <= 0) {
            $response['status'] = Constants::FAILURE;
            $response['errorCode'] = ErrorCodeConstants::INVALID_CITY_ID;
            $response['errorMessage'] = "Invalid cityId: {$cityId}";
        } else {
            $areas = $this->libraryService->getAreasForCity($cityId);
            if (isset($areas) && count($areas) > 0) {
                $response[] = $this->createAreasResponse($areas);
            } else {
                $response['status'] = Constants::FAILURE;
                $response['errorCode'] = ErrorCodeConstants::NO_AREAS_FOUND_FOR_CITY;
                $response['errorMessage'] = "No active areas found for cityId: {$cityId}";
            }
        }
        return new JsonModel($response);
    }

    public function getAllAreasAction() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

        $response = array();

        $areas = $this->libraryService->getAllAreas();
        if (isset($areas) && count($areas) > 0) {
            $response[] = $this->createAreasResponse($areas);
        } else {
            $response['status'] = Constants::FAILURE;
            $response['errorCode'] = ErrorCodeConstants::NO_AREAS_FOUND;
            $response['errorMessage'] = "No active areas found";
        }

        return new JsonModel($response);
    }

    public function getAreaAction() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

        $areaId = $this->params('id');

        if (!isset($areaId) || $areaId <= 0) {
            $response['status'] = Constants::FAILURE;
            $response['errorCode'] = ErrorCodeConstants::INVALID_AREA_ID;
            $response['errorMessage'] = "Invalid areaId: {$areaId}";
        } else {
            $area = $this->libraryService->getArea($areaId);
            if (isset($area)) {
                $response['id'] = $area->getId();
                $response['name'] = $area->getName();
                $response['status'] = Constants::SUCCESS;
            } else {
                $response['status'] = Constants::FAILURE;
                $response['errorCode'] = ErrorCodeConstants::NO_AREA_FOUND_FOR_ID;
                $response['errorMessage'] = "No active areas found for areaId: {$areaId}";
            }
        }
        return new JsonModel($response);
    }

    public function readActivitiesAction() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");
        
        $userId = $this->params('id');
        $count = $this->params('count');
        if (!isset($count)) {
            $count = 10; // show last 10 activities
        }
        $response = array();

        if (!isset($userId) || $userId <= 0) {
            $response['status'] = Constants::FAILURE;
            $response['errorCode'] = ErrorCodeConstants::USER_ID_EMPTY;
            $response['errorMessage'] = 'User Id should not be empty';
        } else {
            $activities = $this->libraryService->getLatestActivitiesForUser($userId, $count);
            if (isset($activities) && count($activities) > 0) {
                $response[] = $this->createActivitiesResponse($activities);
            } else {
                $response['status'] = Constants::FAILURE;
                $response['errorCode'] = ErrorCodeConstants::NO_ACTIVITY_FOR_USER;
                $response['errorMessage'] = "No activities found for userId: {$userId}";
            }
        }
        return new JsonModel($response);
    }

    /**
     * Iterates the given states array and creates response array used for JSON rendering
     * @param array $states
     */
    private function createStatesResponse($states) {
        $statesArray = array();
        $response = array();
        foreach ($states as $state) {
            $statesArray[] = ['id' => $state->getId(),
                'name' => $state->getName()
            ];
        }
        $response['status'] = Constants::SUCCESS;
        $response['totalRecords'] = count($statesArray);
        $response['states'] = $statesArray;

        return $response;
    }

    private function createCitiesResponse($cities) {
        $citiesArray = array();
        $response = array();
        foreach ($cities as $city) {
            $citiesArray[] = ['id' => $city->getId(),
                'name' => $city->getName()
            ];
        }
        $response['status'] = Constants::SUCCESS;
        $response['totalRecords'] = count($citiesArray);
        $response['cities'] = $citiesArray;

        return $response;
    }

    private function createAreasResponse($areas) {
        $areasArray = array();
        $response = array();
        foreach ($areas as $area) {
            $areasArray[] = ['id' => $area->getId(),
                'name' => $area->getName()
            ];
        }
        $response['status'] = Constants::SUCCESS;
        $response['totalRecords'] = count($areasArray);
        $response['areas'] = $areasArray;

        return $response;
    }
    
    private function createActivitiesResponse($activities) {
        $activitiesArray = array();
        $response = array();
        foreach ($activities as $activity) {
            $activitiesArray[] = ['id' => $activity->getId(),
                'userName' => $activity->getUser(),
                'message' => $activity->getMessage(),
                'messageTime' => $activity->getCreatedAt()];
        }
        $response['status'] = Constants::SUCCESS;
        $response['totalRecords'] = count($activitiesArray);
        $response['activities'] = $activitiesArray;
        
        return $response;
    }
}
