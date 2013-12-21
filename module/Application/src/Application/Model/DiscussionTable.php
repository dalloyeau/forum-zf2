<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class DiscussionTable
{
	protected $tableGateway;
	protected $adapter;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
		$this->adapter = $this ->tableGateway ->getAdapter();
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}
	
	public function getDiscussionTable()
	{
		if (!$this->discussionTable) {
			$sm = $this->getServiceLocator();
			$this->discussionTable = $sm->get('Application\Model\DiscussionTable');
		}
		return $this->discussionTable;
	}
	
	public function saveDiscussion(Discussion $discussion)
	{
		$data = array(
				'id' => $discussion->id,
				'idTheme'  => $discussion->idTheme,
				'titre' => $discussion->titre,
		);
	
		$id = (int) $discussion->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getDiscussion($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Discussion n existe pas');
			}
		}
	}
	
	public function deleteDiscussion($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
	
	public function DiscussionParTheme($idTheme){
		$id = (int)$idTheme;
		$sql = "SELECT d.titre
				FROM discussion d
				WHERE d.idTheme = :idTheme";
		return $this ->adapter->query($sql,array(':idTheme'=>$id));
	}

	
}