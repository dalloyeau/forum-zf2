<?php
namespace Application\Model;

class Discussion
{
	public $id;
	public $idTheme;
	public $titre;

	public function exchangeArray($data)
	{
		$this->id     = (!empty($data['id'])) ? $data['id'] : null;
		$this->idTheme = (!empty($data['idTheme'])) ? $data['idTheme'] : null;
		$this->titre  = (!empty($data['titre'])) ? $data['titre'] : null;
	}
}
