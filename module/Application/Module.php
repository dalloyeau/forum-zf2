<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

 // Add these import statements:
 use Application\Model\Discussion;
 use Application\Model\DiscussionTable;
 use Application\Model\Message;
 use Application\Model\MessageTable;
 use Application\Model\Theme;
 use Application\Model\ThemeTable;
 use Application\Model\User;
 use Application\Model\UserTable;
 use Zend\Db\ResultSet\ResultSet;
 use Zend\Db\TableGateway\TableGateway;

 class Module
 {
     // getAutoloaderConfig() and getConfig() methods here

//  	public function onBootstrap(MvcEvent $e)
//  	{
//  		$eventManager        = $e->getApplication()->getEventManager();
//  		$moduleRouteListener = new ModuleRouteListener();
//  		$moduleRouteListener->attach($eventManager);
//  	}
 	
 	
 	
 	public function getConfig()
 	{
 		return include __DIR__ . '/config/module.config.php';
 	}
 	
 	public function getAutoloaderConfig()
 	{
 		return array(
 				'Zend\Loader\StandardAutoloader' => array(
 						'namespaces' => array(
 								__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
 						),
 				),
 		);
 	}
 	
     public function getServiceConfig()
     {
         return array(
             'factories' => array(
             		
             	// for Discussion	
                 'Application\Model\DiscussionTable' =>  function($sm) {
                     $tableGateway = $sm->get('DiscussionTableGateway');
                     $table = new DiscussionTable($tableGateway);
                     return $table;
                 },
                 'DiscussionTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Discussion());
                     return new TableGateway('discussion', $dbAdapter, null, $resultSetPrototype);
                 },
                 
                // for Message
                 'Application\Model\MessageTable' =>  function($sm) {
                 $tableGateway = $sm->get('MessageTableGateway');
                 $table = new MessageTable($tableGateway);
                 return $table;
                 },
                 'MessageTableGateway' => function ($sm) {
                 $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                 $resultSetPrototype = new ResultSet();
                 $resultSetPrototype->setArrayObjectPrototype(new Message());
                 return new TableGateway('message', $dbAdapter, null, $resultSetPrototype);
                 },
                 
                //for Theme
                 'Application\Model\ThemeTable' =>  function($sm) {
                 $tableGateway = $sm->get('ThemeTableGateway');
                 $table = new ThemeTable($tableGateway);
                 return $table;
                 },
                 'ThemeTableGateway' => function ($sm) {
                 $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                 $resultSetPrototype = new ResultSet();
                 $resultSetPrototype->setArrayObjectPrototype(new Theme());
                 return new TableGateway('theme', $dbAdapter, null, $resultSetPrototype);
                 },
                 
                // for User
                 'Application\Model\UserTable' =>  function($sm) {
                 $tableGateway = $sm->get('UserTableGateway');
                 $table = new UserTable($tableGateway);
                 return $table;
                 },
                 'UserTableGateway' => function ($sm) {
                 $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                 $resultSetPrototype = new ResultSet();
                 $resultSetPrototype->setArrayObjectPrototype(new User());
                 return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
                 },
                 
             ),
         );
     }
     
     public function onBoostrap(MvcEvent $e){
     	
     	$events = $e->getApplication()->getEventManager()->getSharedManager();
     	$events->attach('ZfcUser\Form\Register','init', function($e) {
     		$form = $e->getTarget();
     		// Do what you please with the form instance ($form)
     		$form->add(array(
     				'type' => 'Zend\Form\Element\Radio',
     				'name' => 'formule',
     				'options' => array(
     						'label' => 'Choisir formule',
     						'value_options' => array(
     								'1' => '1 Mo',
     								'10' => '10 Mo',
     								'100' => '100 Mo'
     						),
     				)
     		));
     		/*$form->add(array(
     		 'type' => 'Zend\Form\Element\Hidden',
     				'name' => 'role',
     				'attributes' => array(
     						'values' => '2'
     				)
     		));*/
     	});
     	$events->attach('ZfcUser\Form\RegisterFilter','init', function($e) {
     		$filter = $e->getTarget();
     		// Do what you please with the filter instance ($filter)
     		$filter->add(array(
     				'name'       => 'formule',
     				'required'   => true,
     				'validators' => array(
     						array(
     								'name' => 'NotEmpty'
     						)
     				)
     		)
     		);
     	});
     	
     }
 }
