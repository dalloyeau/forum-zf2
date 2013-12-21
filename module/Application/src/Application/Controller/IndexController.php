<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Discussion;
use Application\Model\Theme;

class IndexController extends AbstractActionController
{
	protected $discussionTable;
	protected $messageTable;
	protected $themeTable;
	protected $userTable;
	
	
    public function indexAction()
    {
    	
        return new ViewModel(array(
        	"discussions" =>$this->getDiscussionTable()->fetchAll(),
       		"themes" =>$this->getThemeTable()->fetchAll(),
        ));
    }
    
    public function getDiscussionTable()
    {
    	if (!$this->discussionTable) {
    		$sm = $this->getServiceLocator();
    		$this->discussionTable = $sm->get('Application\Model\DiscussionTable');
    	}
    	return $this->discussionTable;
    }
    
    public function getThemeTable()
    {
    	if (!$this->themeTable) {
    		$sm = $this->getServiceLocator();
    		$this->themeTable = $sm->get('Application\Model\ThemeTable');
    	}
    	return $this->themeTable;
    }
    
    public function getMessageTable()
    {
    	if (!$this->messageTable) {
    		$sm = $this->getServiceLocator();
    		$this->messageTable = $sm->get('Application\Model\MessageTable');
    	}
    	return $this->messageTable;
    }
}
