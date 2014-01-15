<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class ThemeTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
		$this->adapter = $this->tableGateway->getAdapter();
	}

	public function fetchAll()
	{
		$sql = "SELECT *
		FROM theme";
		$resultSet = $this->adapter->query($sql,array());
		/*$resultSet = $this->tableGateway->select();*/
		return $resultSet;
	}

}
