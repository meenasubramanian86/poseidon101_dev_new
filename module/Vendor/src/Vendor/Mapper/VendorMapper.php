<?php
namespace Vendor\Mapper;
use Vendor\Model\VendorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Zend\StdLib\Hydrator\HydratorInterface;
use Library\Mapper\AbstractDbMapper;
//use Vendor\Exception\CorporateNotFoundException;

class VendorMapper extends AbstractDbMapper implements VendorMapperInterface
{
    protected $dbAdapter;
    protected $hydrator;
    protected $vendorPrototype;

    public function __construct(AdapterInterface $dbAdapter,
        HydratorInterface $hydrator, VendorInterface $vendorPrototype)
    {
         $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->vendorPrototype = $vendorPrototype;
		
		parent::__construct($dbAdapter); //calling the Parent class construtor i.e AbstractDbMapper class
    }
	
    public function checkVendorExits($vendorName)
    {
        $where = array();
        $where['first_name'] = $vendorName;
        $sql = new Sql($this->dbAdapter);
        $select = $sql->select();
        $select->columns( array(
        'first_name' => 'first_name'));
        $select->from('users');
        $select->where($where);
        $select->columns(array('numberOfVendor' => new \Zend\Db\Sql\Expression('COUNT(*)')));
        //echo $select->getSqlString($this->dbAdapter->getPlatform());    exit;

        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        if($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows())
        {

        return $this->hydrator->hydrate($result->current(), $this->vendorPrototype);
//            $resultSet = new HydratingResultSet(new \Zend\Stdlib\Hydrator\ClassMethods(), new \Healthcenter\Model\Healthcenter());
//            return $resultSet->initialize($result);

        } 
        //throw new CorporateNotFoundException("corporateId not found for corporateId: ${corporateId}");

    }
    
    
     public function checkEmailExits($emailId)
    {
            $where = array();
            $where['email_id'] = $emailId;
            $sql = new Sql($this->dbAdapter);
            $select = $sql->select();
            $select->columns( array(
            'emailId' => 'email_id'));
            $select->from('users');
            $select->where($where);
            //echo $select->getSqlString($this->dbAdapter->getPlatform());    exit;

            $statement = $sql->prepareStatementForSqlObject($select);
            $result = $statement->execute();

            if($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows())
            {
                  return $this->hydrator->hydrate($result->current(), $this->vendorPrototype);
                //$resultSet = new HydratingResultSet(new \Zend\Stdlib\Hydrator\ClassMethods(), new \Vendor\Model\Vendor());
                //return $resultSet->initialize($result);
            } 
 
    }
    
    
    public function insertVendor($data)
    {
        $action = new Insert('users');
        $action->values(array( 
        'first_name' => $data->first_name,
		'last_name' => $data->last_name,
		'email_id' => $data->email_id,
		'password' => $data->password,
		'user_type' => $data->user_type,
		'address1' => $data->address1,
		'address2' => $data->address2,
		'country' => $data->country,
		'state' => $data->state,
		'city' => $data->city,
		'area' => $data->area,
		'postal_code' => $data->postal_code,
		'latitude' => $data->latitude,
		'longitude' => $data->longitude,
		'gender' => $data->gender,
		'birthdate' => $data->birthdate,
		'phone' => $data->phone,
        'phone2' => $data->phone2,
        'phone3' => $data->phone3,
        'mobile' => $data->mobile,
        'mobile2' => $data->mobile2,
        'mobile3' => $data->mobile3,
        'profile_picture' => $data->profile_picture,
        'blood_group_id' => $data->blood_group_id,
        'blood_donation' => $data->blood_donation,
        'verification_code' => $data->verification_code,
		'is_verified' => $data->is_verified,
		'blood_donation' => $data->blood_donation,
		'last_login' => $data->last_login,
		'role_default_id' => $data->role_default_id,
		'secret_question' => $data->secret_question,
		'secret_answer' => $data->secret_answer,
		'is_profile_completed' => $data->is_profile_completed,
		'is_profile_ms_completed' => $data->is_profile_ms_completed,
		'created_by' => $data->created_by,
        'is_active' => '1'
         ));

        $sql = new Sql($this->dbAdapter);
        $stmt = $sql->prepareStatementForSqlObject($action);
		//echo $sql->getSqlString($this->dbAdapter->getPlatform()); exit;
       //echo $action->getSqlString($this->dbAdapter->getPlatform()); exit;
        $result = $stmt->execute();

        if($result instanceof ResultInterface)
        {
        if($insertedVendorId = $result->getGeneratedValue())
        {
         return $insertedVendorId;
        }
        }
        throw new CorporateNotFoundException("Vendor is not Inserted");

    }
   
    	
}