<?php
namespace Application\Controller;

use Application\Form\ConnexionForm;
use Application\Model\User;

class ConnexionController extends FonctionController
{
	public function connexionAction()
	{
		$request = $this->getRequest();
		
		if ($request->isPost())
		$data -$request ->getPost();
		print_r ($data);
		
		$connexionForm = new ConnexionForm();
		
		if(isset($data['mail']) && isset($data['password'])){
			$user =new User();
			$connexionForm->setData($data);
			
			$user->exchangeArray(connexionForm->getData());
			
			if ($this->getTableUser()->identifierUser($user->mail, $user->password))
			{
				$userInc =$this->getUserTable()->getUserbyMail($user->mail, $user->password);
				$this->classeSession->setSession("user",$user->exchangeUser($userInc));
			}
		}
		
		return new ViewModel (array(
			'connexionForm'=>$connexionForm;
		));
	}


}


