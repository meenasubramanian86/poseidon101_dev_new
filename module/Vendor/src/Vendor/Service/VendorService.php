<?php
namespace Vendor\Service;
use Library\Service\AbstractBaseService;
use Vendor\Mapper\VendorMapperInterface;
use Vendor\Exception\InvalidCredentialsException; 
use Exception;
class VendorService extends AbstractBaseService implements VendorServiceInterface {

    protected $vendorMapper;

    public function __construct(VendorMapperInterface $vendorMapper) {
        $this->vendorMapper = $vendorMapper;
    }

    public function insertVendor($data) {
         //check If Vendor is already EXITS 
        $vendorName = $data->first_name;
        $vendorService = $this->vendorMapper->checkVendorExits($vendorName);
        $numberOfVendor = $vendorService->getNumberOfVendor();
        // print_r($numberOfVendor); exit;
        if ($numberOfVendor == 0) {
            try {
                 $this->vendorMapper->beginTransaction();

                // check User Email is already Exits
                $emailId = $data->email_id;
                $emailIdInterface = $this->vendorMapper->checkEmailExits($emailId);
                 
                 if (!empty($emailIdInterface)) {
                    $exitsEmailId = $emailIdInterface->getEmailId();
                    $response = array(
                        "status" => 'FAILURE',
                        "exitsEmailId" => $emailIdInterface->getEmailId(),
                        'errorCode' => '1022',
                    );
                    return $response;
                }
 
                // insert Vendor	
                $insertedVendorId = $this->vendorMapper->insertVendor($data);
                
                $this->vendorMapper->commit();

                return $insertedVendorId;
            } catch (\Exception $ex) {
				
                 $this->vendorMapper->rollback();
                throw new Exception("Could not insert Vendor into the table");
            }
        } else {
            $response = array(
                "status" => 'FAILURE',
                'errorCode' => '1021',
            );

            return $response;
        }
    }
    
    

}