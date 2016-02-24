<?php
namespace Library\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;

use Zend\View\Model\ViewModel;
use Register\Form\RegisterForm;

use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Db\ResultSet\ResultSet;

use Zend\Debug\Debug;

class LibraryTable extends AbstractTableGateway
{
    
   protected $table ='users';
   public $id;
   //public $doctor_id;
	
	 public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }
	
	
   
     
    public function getrandomdoctors($docnum)
    {
        
       $num = $docnum['num'];
     }
	 

      
 
	
	 public function checkadminToken($setdata)
    {
           
		$sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->columns( array(
			'user_id' => 'user_id',
			'token' => 'token',));
 		$select->from('axonytes_admin_token');
 		$select->where($setdata);
		//echo $select->getSqlString($this->adapter->getPlatform());    exit;
             
       $statement = $sql->prepareStatementForSqlObject($select);
 	   $result = $statement->execute();
 
	   if($result->count() > 0){
		   
		   //$rows = array_values(iterator_to_array($result));
 		    $response = array('errorCode' => 555, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 666, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
    
	
	
	 public function stateList($setdata)
    {
           
		$sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->columns( array(
			'id' => 'id',
			'state_name' => 'name',
			));
 		$select->from('states');
 		$select->where($setdata);
		//echo $select->getSqlString($this->adapter->getPlatform());    exit;
             
       $statement = $sql->prepareStatementForSqlObject($select);
 	   $result = $statement->execute();
 
	   if($result->count() > 0){
		   
		   $rows = array_values(iterator_to_array($result));
 		    $response = array('state_list' => $rows, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 666, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
    
	
	public function cityList($setdata)
    {
           
		$sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->columns( array(
			'id' => 'id',
			'city_name' => 'name',
			));
 		$select->from('cities');
 		$select->where($setdata);
		//echo $select->getSqlString($this->adapter->getPlatform());    exit;
             
       $statement = $sql->prepareStatementForSqlObject($select);
 	   $result = $statement->execute();
 
	   if($result->count() > 0){
		   
		   $rows = array_values(iterator_to_array($result));
 		    $response = array('city_list' => $rows, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 666, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
    
	
	public function areaList($setdata)
    {
           
		$sql = new Sql($this->adapter);
		$select = $sql->select();
		$select->columns( array(
			'id' => 'id',
			'area_name' => 'name',
			));
 		$select->from('areas');
 		$select->where($setdata);
		//echo $select->getSqlString($this->adapter->getPlatform());    exit;
             
       $statement = $sql->prepareStatementForSqlObject($select);
 	   $result = $statement->execute();
 
	   if($result->count() > 0){
		   
		   $rows = array_values(iterator_to_array($result));
 		    $response = array('area_list' => $rows, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 666, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
    
	
	
	public function activities()
    {
		
		$sql = new Sql($this->adapter);
 		$select = $sql->select();
		$select->columns( array(
			'id' => 'id',
			'user_id' => 'user_id',
			'source_user_id' => 'source_user_id',
			'from_user_type' => 'from_user_type',
			'to_user_type' => 'to_user_type',
			'is_read' => 'is_read',
			'message' => 'message',
			'created_at' => 'created_at',
 
		) );
		$select->from( array('activities' => 'activities'));
		//$select->join(array('users' => 'activities.from_user_type'), 'activities.source_user_id = users.id', array('first_name' => 'first_name', 'last_name' => 'last_name'), $select::JOIN_LEFT); 
		//$select->join(array('docto' => 'users'), 'messages.sent_to_id = docto.id', array('doc_id' => 'id', 'doc_first_name' => 'first_name'), $select::JOIN_LEFT); 
   
		//echo $select->getSqlString($this->adapter->getPlatform());    exit;
             
       $statement = $sql->prepareStatementForSqlObject($select);
 	   $result = $statement->execute();
 
	   if($result->count() > 0){
		   
		   $rows = array_values(iterator_to_array($result));
 		    $response = array('activities' => $rows, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 666, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
    
	public function numberofactivities()
    {
		
		$sql = new Sql($this->adapter);
 		$select = $sql->select();
		$select->columns( array(
			'id' => 'id',
			'user_id' => 'user_id',
			'source_user_id' => 'source_user_id',
			'from_user_type' => 'from_user_type',
			'to_user_type' => 'to_user_type',
			'message' => 'message',
			'created_at' => 'created_at',
 
		) );
		$select->from( array('activities' => 'activities'));
		$select->columns(array('numberofactivities' => new \Zend\Db\Sql\Expression('COUNT(*)')));
		//$select->join(array('users' => 'activities.from_user_type'), 'activities.source_user_id = users.id', array('first_name' => 'first_name', 'last_name' => 'last_name'), $select::JOIN_LEFT); 
		//$select->join(array('docto' => 'users'), 'messages.sent_to_id = docto.id', array('doc_id' => 'id', 'doc_first_name' => 'first_name'), $select::JOIN_LEFT); 
   
		//echo $select->getSqlString($this->adapter->getPlatform());    exit;
             
       $statement = $sql->prepareStatementForSqlObject($select);
 	   $result = $statement->execute();
 
	   if($result->count() > 0){
		   
		   $rows = array_values(iterator_to_array($result));
 		    $response = array('number' => $rows, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 666, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
	
	
	
	public function readactivities($setdata,$where)
    {
  		$sql = new Sql($this->adapter);
		$update = $sql->update();
		$update->table('activities');
		$update->set($setdata);
		$update->where($where);
		//echo $update->getSqlString($this->adapter->getPlatform());    exit;
		$statement  = $sql->prepareStatementForSqlObject( $update );
		$results    = $statement->execute();
		 
		if($results){
		   
 		    $response = array('errorCode' => 512, 'status' => 'success');
	   }
	   else
	   {
			$response = array('errorCode' => 513, 'status' => 'failure');   
	   }
		 
		  return $response;
        
	}
    
	
	
    
   
	
}