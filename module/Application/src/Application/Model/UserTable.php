<?php
namespace UserTable\Model;

use Zend\Db\TableGateway\TableGateway;

class UserTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}
	
	public function saveUser(User $user)
	{
		$data = array(
				"nom" => $user->nom,
				"prenom" => $user->prenom,
				"adresse" => $user->adresse,
				"age" => $user->age,
				"tel" => $user->tel,
				"ville" => $user->ville,
				"mail" => $user->mail,
				"mdp" => md5($user->mdp),
				"pseudo" => $user->pseudo,
				"dateInscription" => $user->dateInscription,
		);
		
		$modif = array(
				"nom" => $user->nom,
				"prenom" => $user->prenom,
				"adresse" => $user->adresse,
				"age" => $user->age,
				"tel" => $user->tel,
				"ville" => $user->ville,
				"mail" => $user->mail,
				"mdp" => md5($user->mdp),
				"pseudo" => $user->pseudo,
		);

		$id = (int)$user->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
				
		} else {
			if ($this->getUser($id)) {
				$this->tableGateway->update($modif, array('id' => $id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}
	
	public function deleteUser($id)
	{
		$this->tableGateway->delete(array('id' => $id));
	}

}
