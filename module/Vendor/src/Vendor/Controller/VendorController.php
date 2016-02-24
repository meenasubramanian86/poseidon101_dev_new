<?php

//Vendor

namespace Vendor\Controller;

use Exception;
use Vendor\Service\VendorServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

// use Corporate\Exception\InvalidCredentialsException;
// use Corporate\Exception\UserNotFoundException;


class VendorController extends AbstractActionController {

    /**
     *   @var VendorServiceInterface
     */
    protected $vendorService;

    public function __construct(VendorServiceInterface $vendorService) {


        $this->vendorService = $vendorService;
    }

    public function addVendorAction() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

        $body = $this->getRequest()->getContent();
        //$method = $this->getRequest()->getMethod();
        //print_r($body); exit;	
        $data = json_decode($body);
		//print_r($body); echo "FF";exit;
		if( !isset($data->first_name) || $data->first_name == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'First Name should not be empty');
          return new JsonModel($resp);
        }
         if( !isset($data->last_name) || $data->last_name == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Last Name should not be empty');
          return new JsonModel($resp);
        }
         if( !isset($data->email_id) || $data->email_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Email should not be empty');
          return new JsonModel($resp);
        }
        
        if( !isset($data->password) || $data->password == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Password should not be empty');
          return new JsonModel($resp);
        }
        
        if( !isset($data->user_type) || $data->user_type == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'User Type should not be empty');
          return new JsonModel($resp);
        }
        
        if( !isset($data->address1) || $data->address1 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Address 1 should not be empty');
          return new JsonModel($resp);
        }
		
		if( !isset($data->address2) || $data->address2 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Address 2 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->country) || $data->country == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Country should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->state) || $data->state == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'State should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->city) || $data->city == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'City should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->area) || $data->area == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Area should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->postal_code) || $data->postal_code == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Postal Code should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->latitude) || $data->latitude == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Latitude should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->longitude) || $data->longitude == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Longititud should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->gender) || $data->gender == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Gender should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->birthdate) || $data->birthdate == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Birth Date should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->phone) || $data->phone == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->phone2) || $data->phone2 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone 2 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->phone3) || $data->phone3 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Phone 3 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->mobile) || $data->mobile == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->mobile2) || $data->mobile2 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile 2 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->mobile3) || $data->mobile3 == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Mobile 3 should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->profile_picture) || $data->profile_picture == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Profile Picture should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->blood_group_id) || $data->blood_group_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Blood Group ID should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->blood_donation) || $data->blood_donation == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Blood Donation should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->verification_code) || $data->verification_code == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Verfication code should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_verified) || $data->is_verified == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Is Verified should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->last_login) || $data->last_login == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Last Login should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->role_default_id) || $data->role_default_id == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Role Default ID should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->secret_question) || $data->secret_question == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Secret Question should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->secret_answer) || $data->secret_answer == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Secret Answer should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_profile_completed) || $data->is_profile_completed == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Is Profile Completed should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->is_profile_ms_completed) || $data->is_profile_ms_completed == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Is Profile MS Completed should not be empty');
          return new JsonModel($resp);
        }
		if( !isset($data->created_by) || $data->created_by == '') {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'CreatedBy should not be empty');
          return new JsonModel($resp);
        }
        
       if(!is_numeric($data->is_active)) {
          $resp = array('status' => 'failure', 'errorCode' => 501, 'errorMessage' => 'Active should not be empty');
          return new JsonModel($resp);
        }
        
        
        try {

            $addVendorServicesInterface = $this->vendorService->insertVendor($data);
            // print_r($addVendorServicesInterface); exit;
            if (($addVendorServicesInterface['status'] == 'FAILURE') && ($addVendorServicesInterface['errorCode'] == '1021')) {
                $response = array(
                    "status" => 'FAILURE',
                    "errorMessage" => 'Vendor Already Exits',
                    'errorCode' => '1021',
                );
            } else if (($addVendorServicesInterface['status'] == 'FAILURE') && ($addVendorServicesInterface['errorCode'] == '1022')) {
                $response = array(
                    "status" => 'FAILURE',
                    "errorCode" => '1022',
                    "errorMessage" => 'Email Id Already Exits',
                    "exitsEmailIds" => $addVendorServicesInterface['exitsEmailId'],
                );
            } else {
                $response = array(
                    "status" => 'SUCCESS',
                    "errorMessage" => '',
                    'insertedVendorId' => $addVendorServicesInterface,
                );
            }
        } catch (Exception $ex) {
            $response = array('status' => 'FAILURE', 'errorCode' => 1001, 'errorMessage' => $ex->getMessage());
            $this->getResponse()->setStatusCode(500);
        }

        return new JsonModel($response);
    }

    
}
