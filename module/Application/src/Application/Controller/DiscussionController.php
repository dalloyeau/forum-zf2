<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Discussion;
use Application\Model\DiscussionTable;
use Application\Form\DiscussionForm;

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

	public function addAction()
{
    $form = new DiscussionForm();
    $form->get('submit')->setAttribute('label', 'Add');
    $request = $this->getRequest();
    if ($request->isPost()) {
        $discussion = new Discussion();
        $form->setInputFilter($discussion->getInputFilter());
        $form->setData($request->post());
        if ($form->isValid()) {
            $album->populate($form->getData());
            $this->getDiscussionTable()->saveDiscussion($discussion);
            
            return $this->redirect()->toRoute('discussion');
        }
    }
    return array('form' => $form);
}
}