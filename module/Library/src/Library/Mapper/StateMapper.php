<?php

namespace Library\Mapper;

use Zend\Db\Adapter\AdapterInterface;
use Zend\StdLib\Hydrator\HydratorInterface;
use Zend\Db\Sql\Sql;
use Library\Model\State;
use Library\Exception\RecordNotFoundException;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Mapper class to interact with 'states' table and populate values
 *
 * @author pandiaraj
 */
class StateMapper extends AbstractDbMapper implements StateMapperInterface {

    protected $dbAdapter;
    protected $hydrator;
    protected $statePrototype;

    public function __construct(AdapterInterface $dbAdapter, HydratorInterface $hydrator, State $state) {
        $this->dbAdapter = $dbAdapter;
        $this->hydrator = $hydrator;
        $this->statePrototype = $state;
        parent::__construct($dbAdapter);
    }

    public function findAllStates($countryId) {
        try {
            $sql = new Sql($this->dbAdapter);
            $select = $sql->select();
            $select->columns(
                    array(
                        'id' => 'id',
                        'name' => 'name'
            ));
            $select->from('states');
            $select->where(array('country_id' => $countryId));
            $stmt = $sql->prepareStatementForSqlObject($select);
            $result = $stmt->execute();
            if ($result instanceof ResultInterface && $result->isQueryResult()) {
                $resultSet = new HydratingResultSet(new ClassMethods(), $this->statePrototype);
                return $resultSet->initialize($result);
            } else {
                throw new RecordNotFoundException(1002, 'States not found for countryId: ' . $countryId);
            }
        } catch (Exception $ex) {
            throw new Exception('Could not retrieve records from states table', 1003, $ex);
        }
    }
}
