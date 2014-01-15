<?php

namespace Application\Model;

use Zend\Session\Container;

class SessionContainer {
	protected $container;
	
	public function__construct() {
		$this->container - new Container();
	}
	
	public function getSession($nameContainer){
		return $this->container->$nameContainer;
	}
	
	public function setSession ($name, $value) {
		$this->container ->offsetSet($name, $value);
	}
	
	public function removeSession() {
		$this->container->getManger()->getStorage()->clear();
	}
}
