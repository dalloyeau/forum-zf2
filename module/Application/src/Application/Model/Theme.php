<?php
namespace Application\Model;

class Theme
{
	public $id;
	public $titre;
	public $description;

	public function exchangeArray($data)
	{
		$this->id     = (!empty($data['id'])) ? $data['id'] : null;
		$this->titre  = (!empty($data['titre'])) ? $data['titre'] : null;
		$this->description  = (!empty($data['description'])) ? $data['description'] : null;
	}
}
