<?php
class StaticContentController extends Zend_Controller_Action
{
	public function preDispatch()
	{
		// set admin layout
		// check if user is authenticated
		// if not, redirect to login page
		$auth = Zend_Auth::getInstance(); 
		if ($auth->hasIdentity()) {
			//$this->_helper->layout->setLayout('admin');
			$this->view->identity = $auth->getIdentity(); 
			
		}
		else{
			//$this->_redirect('/login');
		}
	}
	// display static views
	public function displayAction()
	{
		$page = $this->getRequest()->getParam('page');
		if (file_exists($this->view->getScriptPath(null) .
      "/" . $this->getRequest()->getControllerName() . 
      "/$page." . $this->viewSuffix)) {
		$this->render($page);
      } else {
      	throw new Zend_Controller_Action_Exception('Page not found', 404);
      }
	}
}