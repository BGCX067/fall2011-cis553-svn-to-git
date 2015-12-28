<?php

class IndexController extends Zend_Controller_Action
{

	public function init()
	{
		/* Initialize action controller here */

			
	}
	public function preDispatch()
	{
		// set admin layout
		// check if user is authenticated
		// if not, redirect to login page
		$auth = Zend_Auth::getInstance(); 
		if ($auth->hasIdentity()) {
			//$this->_helper->layout->setLayout('admin');
			$this->view->identity = $auth->getIdentity(); 
			$this->identity = $auth->getIdentity();
			
		}
		else{
			//$this->_redirect('/login');
		}
	}

	public function indexAction()
	{
		//query tester
		$q = Doctrine_Query::create()
		->from('Webteam_Model_Video r')
		->where('r.UserName = ?', 'user10')
		->addWhere('r.StreamID = ?', '{16E85E58-3C2D-45FF-B69A-8DFDA76AA239}');
		$result = $q->fetchArray();
		$this->view->records = $result;

			
	}


}

