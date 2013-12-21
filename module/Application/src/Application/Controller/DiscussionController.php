<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Discussion;

class DiscussionController extends AbstractActionController
{
	protected $discussionTable;
	
	public function discussionAction()
	{
		$idTheme = $this->params()->fromRoute('idTheme',0);
		return new ViewModel(array(
				'discussions'=>$this->getTableDiscussion()->DiscussionParTheme($idTheme),
				));
	}
	
	public function getTableDiscussion() {
		if (!$this->discussionTable) {
			$sm = $this->getServiceLocator();
			$this->discussionTable = $sm ->get('Application\Model\DiscussionTable');
			
		}
		return $this->discussionTable;
	}

	
}