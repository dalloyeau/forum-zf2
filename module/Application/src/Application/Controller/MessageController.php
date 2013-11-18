<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Message;

class MessageController extends AbstractActionController
{
	protected $messageTable;
	
	public function messageAction()
	{
		$idDiscussion = $this->params()->fromRoute('idDiscussion',0);
		return new ViewModel(array(
				'messages'=>$this->getTableMessage()->MessageParDiscussion($idDiscussion),
				));
	}
	
	public function getTableMessage() {
		if (!$this->messageTable) {
			$sm = $this->getServiceLocator();
			$this->messageTable = $sm ->get('Application\Model\MessageTable');
			
		}
		return $this->messageTable;
	}

	
}
