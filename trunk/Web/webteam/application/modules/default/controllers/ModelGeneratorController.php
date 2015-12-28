<?php
class ModelGeneratorController extends Zend_Controller_Action
{
	

	public function preDispatch()
	{
		//$this->_helper->layout->setLayout('admin');
	$auth = Zend_Auth::getInstance(); 
		if ($auth->hasIdentity()) {
			//$this->_helper->layout->setLayout('admin');
			$this->view->identity = $auth->getIdentity(); 
			
		}
		else{
			$this->_redirect('/login');
		}
		
		
		include_once 'Doctrine.php';
		spl_autoload_register(array('Doctrine', 'autoload'));
		$manager = Doctrine_Manager::getInstance();

		$dsn = 'mysql:host=localhost;dbname=webteam';
		$user = 'root';
		$password = '';

		$dbh = new PDO($dsn, $user, $password);
		$conn = Doctrine_Manager::connection($dbh, 'doctrine');	
		
	}



	public function generateAction()
	{

		//auto-generate models
		//these files will be saved under c:/tmp/models
		$path = '/tmp/models';
		$result = Doctrine::generateModelsFromDb($path, array('doctrine'), array('classPrefix' => 'Webteam_Model_'));
		if($result)
		{
			$this->_helper->getHelper('FlashMessenger')->addMessage('The models were successfully generated under the folder ' . $path);
			$this->_redirect('/admin/doctrine/success');
		}
		else
		{
			throw new Zend_Controller_Action_Exception('Error while generating models.');
		}
	}

	
	public function successAction()
	{
		if ($this->_helper->getHelper('FlashMessenger')->getMessages()) {
			$this->view->messages = $this->_helper
			->getHelper('FlashMessenger')
			->getMessages();
		} else {
			$this->_redirect('/admin/catalog/video/index');
		}
	}


}
