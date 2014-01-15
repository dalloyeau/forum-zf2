<?php
namespace User\Model;

class User
{
	public $id;
	public $nom;
	public $prenom;
	public $adresse;
	public $age;
	public $tel;
	public $ville;
	public $mail;
	public $mdp;
	public $pseudo;
	public $dateInscription;
	protected $inputFilter;

	public function exchangeArray($data)
	{
		$this->id     = (isset($data['id'])) ? $data['id'] : null;
		$this->nom = (isset($data['nom'])) ? $data['nom'] : null;
		$this->prenom  = (isset($data['prenom'])) ? $data['prenom'] : null;
		$this->adresse  = (isset($data['adresse'])) ? $data['adresse'] : null;
		$this->age  = (isset($data['age'])) ? $data['age'] : null;
		$this->tel     = (isset($data['tel'])) ? $data['tel'] : null;
		$this->ville = (isset($data['ville'])) ? $data['ville'] : null;
		$this->mail  = (isset($data['mail'])) ? $data['mail'] : null;
		$this->password  = (isset($data['password'])) ? $data['password'] : null;
		$this->pseudo  = (isset($data['pseudo'])) ? $data['pseudo'] : null;
		$this->dateInscription  = (isset($data['dateInscription'])) ? $data['dateInscription'] : null;
	}
	
	public function exchangeUser($user){
		$data = array();
		
		$data["id"]=$user->id;
		$data["nom"]=$user->nom;
		
		return $data;
		
	}
	
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used");
	}
	
	public function getInputFilter()
	{
		if(!$this->inputFilter)
		{
			$inputFilter = new InputFilter();
			$factory = new InputFactory();
			/*$inputFilter->add(array(
					'name' => 'id',
					'required' => false,
					'filters' =>array(
							array('name' => 'Int'),
					),
			));*/
			$inputFilter->add(array(
					'name' => 'nom',
					'required' => false,
			));
			$inputFilter->add(array(
					'name' => 'prenom',
					'required' => false,
			));
			$inputFilter->add(array(
					'name' => 'adresse',
					'required' => false,
			));
			$inputFilter->add(array(
					'name' => 'tel',
					'required' => false,
			));
			$inputFilter->add(array(
					'name' => 'age',
					'required' => false,
					'filters' =>array(
							array('name' => 'Int'),
					),
			));
			$inputFilter->add(array(
					'name' => 'ville',
					'required' => false,
			));
			$inputFilter->add(array(
					'name' => 'mail',
					'required' => true,
			));
			$inputFilter->add(array(
					'name' => 'password',
					'required' => true,
			));
			$inputFilter->add(array(
					'name' => 'pseudo',
					'required' => true,
			));
			$inputFilter->add(array(
					'name' => 'dateInscription',
					'required' => true,
			));
			$this->inputFilter = $inputFilter;
		}
		return $this->inputFilter;
	}
}
