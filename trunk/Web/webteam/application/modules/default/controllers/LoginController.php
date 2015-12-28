<?php
class LoginController extends Zend_Controller_Action
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


	// login action
	public function loginAction()
	{
		$form = new Webteam_Form_Login;
		$this->view->form = $form;

		if ($this->getRequest()->isPost()) {
			if ($form->isValid($this->getRequest()->getPost())) {
				$values = $form->getValues();
				
				
				
				$adapter = new Webteam_Auth_Adapter_Doctrine($values['UserName'], $values['Password']);
				$auth = Zend_Auth::getInstance();
				$result = $auth->authenticate($adapter);
				if ($result->isValid()) {
					$storage = $auth->getStorage();//by defaut storage uses Sessions
					$storage->write($adapter->getResultArray('Password'));
					
					$identity = $auth->getIdentity();
					

					if ($identity['Role'] == 'admin') {
						$url = '/admin/catalog/video/index';
						$this->_redirect($url);
					} else {
						$url = '/user/catalog/video/index';
						$this->_redirect($url);
					}
				} else {
					$this->view->message = 'You could not be logged in. Please try again.';
				}
			}
		}
	}

	public function successAction()
	{
		if ($this->_helper->getHelper('FlashMessenger')->getMessages()) {
			$this->view->messages = $this->_helper
			->getHelper('FlashMessenger')
			->getMessages();
		} else {
			$this->_redirect('/');
		}
	}

	public function logoutAction()
	{
		Zend_Auth::getInstance()->clearIdentity();
		Zend_Session::destroy();
		$this->_redirect('/login');
	}

	public function signupAction()
	{
		$form = new Webteam_Form_Registration;
		$this->view->form = $form;

		 
		if ($this->getRequest()->isPost())
		{
			if ($form->isValid($this->getRequest()->getPost()))
			{
				$values = $form->getValues();
				if($values['Password'] != $values['ConfirmPassword'])
				{
					$this->view->message = 'Passwords do not match.';
					return;
				}
				//check if the user already exists in the database
				$adapter = new Webteam_Auth_Adapter_Doctrine($values['UserName'], $values['Password']);
				$result = $adapter->isUniqueUsername();
				 
				if ($result)
				{
					$user = new Webteam_Model_User;
					unset($values['ConfirmPassword']);
					$user->fromArray($values);
					$user->save();
					$this->_helper->getHelper('FlashMessenger')->addMessage('Your account has been successfully created.');
					$this->_redirect('/login/success');
				}
				else
				{
					$this->view->message = 'User name has been taken please choose another.';
				}
			}
			else
			{
				$this->view->message = 'Please provide valid input.';
			}
		}
	}

}

