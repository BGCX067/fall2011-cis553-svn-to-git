<?php

class ReportController extends Zend_Controller_Action
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
			//$this->identity = $auth->getIdentity();

		}
		else{
			//$this->_redirect('/login');
		}
	}

	public function indexAction()
	{
		if($this->_helper->getHelper('FlashMessenger')->getMessages())
		{
			$this->view->messages = $this->_helper->getHelper('FlashMessenger')->getMessages();
		}

		// generate trace forms
		$userForm = new Webteam_Form_UserTrace;
		$videoForm = new Webteam_Form_VideoTrace;
		$this->view->userForm = $userForm;
		$this->view->videoFrom = $videoForm;

		$q = Doctrine_Query::create()
		->from('Webteam_Model_Video i');
		//->where('i.VideoType = ?', 'not-live');
		$result = $q->fetchArray();
		$this->view->videoRecords = $result;
			
			
		$q = Doctrine_Query::create()
		->from('Webteam_Model_User i');
		//->where('i.VideoType = ?', 'not-live');
		$result = $q->fetchArray();
		$this->view->userRecords = $result;

			
	}




	public function userTraceAction()
	{
		// set filters and validators for GET input
		$filters = array('UserName' => array('HtmlEntities', 'StripTags', 'StringTrim'));
		$validators = array('UserName' => array('Alnum'));
		$input = new Zend_Filter_Input($filters, $validators);
		$data = array('UserName' => $this->getRequest()->getParam('q'));
		$input->setData($data);

		if($input->isValid())
		{
			//check if user exists
			$q = Doctrine_Query::create()
			->from('Webteam_Model_User i')
			->where('i.UserName = ?', $input->UserName);
			$result = $q->fetchArray();
			$count = count($result);

			if($count >= 1)
			{
				$q = Doctrine_Query::create()
				->from('Webteam_Model_Log i')
				->where('i.UserName = ?', $input->UserName);
				//$result = $q->fetchArray();
				//$this->view->records = $result;
				$this->view->UserName = $input->UserName;



				$filters = array('page' => array('HtmlEntities', 'StripTags', 'StringTrim'));
				$validators = array('page' => array('Int'));
				$input = new Zend_Filter_Input($filters, $validators);

				$page = $this->getRequest()->getParam('page');
				if(!isset($page))
				{
					$data = array('page' => 1);
				}
				else{
					$data = array('page' => $this->getRequest()->getParam('page'));
				}


				$input->setData($data);

				if($input->isValid())
				{
					$perPage = 10;
					$numPageLinks = 9;
						
					// initialize pager
					$pager = new Doctrine_Pager($q, $input->page, $perPage);

					// execute paged query
					$result = $pager->execute(array(), Doctrine::HYDRATE_ARRAY);

					// initialize pager layout
					$pagerRange = new Doctrine_Pager_Range_Sliding(array('chunk' => $numPageLinks), $pager);
					$pagerUrlBase = $this->view->url(array(), 'report-user-trace', 1) . '?q=' . $this->view->UserName . '&page=' .  "{%page}";
					$pagerLayout = new Doctrine_Pager_Layout($pager, $pagerRange, $pagerUrlBase);

					// set page link display template
					$pagerLayout->setTemplate('<a href="{%url}">{%page}</a>');
					$pagerLayout->setSelectedTemplate('<span class="current">{%page}</span>');
					$pagerLayout->setSeparatorTemplate('&nbsp;');

					// set view variables
					$this->view->records = $result;
					$this->view->pages = $pagerLayout->display(null, true);
				}
				else
				{
					//invalid page
				}

			}
			else {
				//die('user does not exits');
				$this->_helper->getHelper('FlashMessenger')->addMessage('User does not exists.');
				$this->_redirect('/report');
			}




		}
		else{
			//die('invalid user');
			$this->_helper->getHelper('FlashMessenger')->addMessage('Invalid Username.');
			$this->_redirect('/report');

		}

	}

	public function videoTraceAction()
	{
		// set filters and validators for GET input
		$filters = array('VideoID' => array('HtmlEntities', 'StripTags', 'StringTrim'));
		$validators = array('VideoID' => array('Int'));
		$input = new Zend_Filter_Input($filters, $validators);
		$data = array('VideoID' => $this->getRequest()->getParam('q'));
		$input->setData($data);

		if($input->isValid())
		{
			//check if vidoe id exists
			$q = Doctrine_Query::create()
			->from('Webteam_Model_Video i')
			->where('i.VideoID = ?', $input->VideoID);
			$result = $q->fetchArray();
			$count = count($result);

			if($count >= 1)
			{
				$q = Doctrine_Query::create()
				->from('Webteam_Model_Log i')
				->where('i.VideoID = ?', $input->VideoID);
				$result = $q->fetchArray();
				//$this->view->records = $result;
				//$this->view->VideoID = $input->VideoID;
				$this->view->VideoID = $input->VideoID;

				$filters = array('page' => array('HtmlEntities', 'StripTags', 'StringTrim'));
				$validators = array('page' => array('Int'));
				$input = new Zend_Filter_Input($filters, $validators);

				$page = $this->getRequest()->getParam('page');
				if(!isset($page))
				{
					$data = array('page' => 1);
				}
				else{
					$data = array('page' => $this->getRequest()->getParam('page'));
				}


				$input->setData($data);

				if($input->isValid())
				{
					$perPage = 10;
					$numPageLinks = 9;
						
					// initialize pager
					$pager = new Doctrine_Pager($q, $input->page, $perPage);

					// execute paged query
					$result = $pager->execute(array(), Doctrine::HYDRATE_ARRAY);

					// initialize pager layout
					$pagerRange = new Doctrine_Pager_Range_Sliding(array('chunk' => $numPageLinks), $pager);
					$pagerUrlBase = $this->view->url(array(), 'report-video-trace', 1) . '?q=' . $this->view->VideoID . '&page=' .  "{%page}";
					$pagerLayout = new Doctrine_Pager_Layout($pager, $pagerRange, $pagerUrlBase);

					// set page link display template
					$pagerLayout->setTemplate('<a href="{%url}">{%page}</a>');
					$pagerLayout->setSelectedTemplate('<span class="current">{%page}</span>');
					$pagerLayout->setSeparatorTemplate('&nbsp;');

					// set view variables
					$this->view->records = $result;
					$this->view->pages = $pagerLayout->display(null, true);
				}
				else
				{
					//invalid page
				}

			}
			else {
				//die('VideoID does not exits');
				$this->_helper->getHelper('FlashMessenger')->addMessage('Vidoe ID does not exists.');
				$this->_redirect('/report');
			}




		}
		else{
			//die('invalid user');
			$this->_helper->getHelper('FlashMessenger')->addMessage('Invalid Video ID.');
			$this->_redirect('/report');

		}

	}









	//	public function successAction()
	//	{
	//		if ($this->_helper->getHelper('FlashMessenger')->getMessages()) {
	//			$this->view->messages = $this->_helper
	//			->getHelper('FlashMessenger')
	//			->getMessages();
	//		} else {
	//			$this->_redirect('/');
	//		}
	//	}



}

