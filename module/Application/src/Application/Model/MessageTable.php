<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;

class MessageTable
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
	
	public function getMessageTable()
	{
		if (!$this->messageTable) {
			$sm = $this->getServiceLocator();
			$this->messageTable = $sm->get('Application\Model\MessageTable');
		}
		return $this->messageTable;
	}
	
	public function saveMessage(Message $message)
	{
		$data = array(
				'id' => $message->id,
				'idTheme'  => $message->idDiscussion,
				'idUser' => $message->idUser,
				'daeCreation' => $message->dateCreation,
				'message' => $message->message,
		);
	
		$id = (int) $message->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getMessage($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Message existe pas');
			}
		}
	}
	
	public function deleteMessage($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
	
	public function MessageParDiscussion($idDiscussion){
		$id = (int)$idDiscussion;
		$sql = "SELECT m.message
				FROM message m
				WHERE m.idDiscussion = :idDiscussion";
		return $this ->adapter->query($sql,array(':idDiscussion'=>$id));
}


}