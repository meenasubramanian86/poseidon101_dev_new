<?php
namespace Library\Mapper;

use Zend\Db\Adapter\AdapterInterface;
use Zend\StdLib\Hydrator\HydratorInterface;
use Zend\Db\Sql\Sql;
use Library\Exception\QueryExecutionException;


class RecordExistLibraryMapper implements RecordExistLibraryMapperInterface
{
    protected $dbAdapter;
	protected $hydrator;

    public function __construct(AdapterInterface $dbAdapter,
        HydratorInterface $hydrator)
    {
        $this->dbAdapter = $dbAdapter;
		 $this->hydrator = $hydrator;
	
    }
        public function recordAlreadyExist($params)
        {
            $sql = new Sql($this->dbAdapter);
            $select = $sql->select();
            $select->from($params['table_name']);
            $select->where($params['where_cond']);
            //echo $select->getSqlString($this->dbAdapter->getPlatform()); exit;
            $statement = $sql->prepareStatementForSqlObject($select);
            $result=$statement->execute();
            if($result->isQueryResult() && $result->getAffectedRows())
            {
                throw new QueryExecutionException(implode(',',$params['column_names']).' '.$GLOBALS['MYSQLERRORRES']['recordexist']);
            }
            return true;
        }
}
