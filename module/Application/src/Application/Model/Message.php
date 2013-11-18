<?php
namespace Application\Model;

class Message
{
	public $id;
	public $idDiscussion;
	public $idUser;
	public $dateCreation;
	public $message;

	public function exchangeArray($data)
	{
		$this->id     = (!empty($data['id'])) ? $data['id'] : null;
		$this->idDiscussion = (!empty($data['idDiscussion'])) ? $data['idDiscussion'] : null;
		$this->idUser  = (!empty($data['idUser'])) ? $data['idUser'] : null;
		$this->dateCreation     = (!empty($data['dateCreation'])) ? $data['dateCreation'] : null;
		$this->message     = (!empty($data['message'])) ? $data['message'] : null;
	}
}