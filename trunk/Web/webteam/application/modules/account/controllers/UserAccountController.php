<?php
class Account_UserAccountController extends Zend_Controller_Action
{

	// action to handle admin URLs
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
			$this->_redirect('/login');
		}
	}

	// action to display list of users
	public function indexAction()
	{

	}
	public function changePasswordAction()
	{
		// generate input form
		$form = new Webteam_Form_Password;
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
				else
				{
					unset($values['ConfirmPassword']);
					$q = Doctrine_Query::create()
					->update('Webteam_Model_User u')
					->set('u.Password', '?', $values['Password'])
					->addWhere('u.UserName = ?',  $this->identity['UserName']);
					$q->execute();
					$this->_helper->getHelper('FlashMessenger')->addMessage('The record was successfully updated.');
					$this->_redirect('/admin/account/success');
				}
			}
			else
			{
				$this->view->message = 'Please provide valid input.';
			}
		}
	}



		public function updateAction()
		{
			// generate input form
			$form = new Webteam_Form_UserAccountUpdate;
			$this->view->form = $form;

			if ($this->getRequest()->isPost()) {
				// if POST request
				// test if input is valid
				// retrieve current record
				// update values and replace in database
				$postData = $this->getRequest()->getPost();

				if ($form->isValid($postData)) {
					$input = $form->getValues();
					$q = Doctrine_Query::create()
					->update('Webteam_Model_User u')
					->set('u.FirstName', '?', $input['FirstName'])
					->set('u.LastName', '?', $input['LastName'])
					->set('u.Email', '?', $input['Email'])
					->addWhere('u.UserName = ?',  $this->identity['UserName']);
					$q->execute();
					$this->_helper->getHelper('FlashMessenger')->addMessage('The record was successfully updated.');
					$this->_redirect('/admin/account/success');
					
					
				}
			}
			else
			{
				$q = Doctrine_Query::create()
				->from('Webteam_Model_User i')
				->where('i.UserName = ?', $this->identity['UserName']);
				$result = $q->fetchArray();
				if (count($result) == 1) {
					$this->view->form->populate($result[0]);
				} else {
					throw new Zend_Controller_Action_Exception('Page not found', 404);
				}
			}
		}

		// action to display an individual catalog item
		public function displayAction()
		{

			$q = Doctrine_Query::create()
			->from('Webteam_Model_User i')
			->where('i.UserName = ?', $this->identity['UserName']);
			$result = $q->fetchArray();
			if (count($result) == 1) {
				$this->view->item = $result[0];
			} else {
				throw new Zend_Controller_Action_Exception('Page not found', 404);
			}

		}

		// success action
		public function successAction()
		{
			if ($this->_helper->getHelper('FlashMessenger')->getMessages()) {
				$this->view->messages = $this->_helper->getHelper('FlashMessenger')->getMessages();
			} else {
				$this->_redirect('/user/account/display');
			}
		}


	}
