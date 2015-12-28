<?php
class Catalog_VideoController extends Zend_Controller_Action
{


	public function init()
	{
			
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

	public function listPastByUserAction()
	{
		//$this->_forward('index', 'index', 'default');
		// set filters and validators for GET input

		$filters = array('page' => array('HtmlEntities', 'StripTags', 'StringTrim'),
						 'UserName' => array('HtmlEntities', 'StripTags', 'StringTrim') );
		$validators = array('page' => array('Int'), 'UserName' => array('Alnum'));
		$input = new Zend_Filter_Input($filters, $validators);

		//username and page number for paginator are passed here
		$input->setData($this->getRequest()->getParams());

		if($input->isValid())
		{
			$q = Doctrine_Query::create()
			->from('Webteam_Model_Video i')
			->where('i.UserName = ?', $input->UserName);
			//->addWhere('i.VideoType = ?', 'not-live');
			$result = $q->fetchArray();
			$this->view->records = $result;
		}
			
		// configure pager
		$perPage = 8;
		$numPageLinks = 9;

		// initialize pager
		$pager = new Doctrine_Pager($q, $input->page, $perPage);

		// execute paged query
		$result = $pager->execute(array(), Doctrine::HYDRATE_ARRAY);

		// initialize pager layout
		$pagerRange = new Doctrine_Pager_Range_Sliding(array('chunk' => $numPageLinks), $pager);
		$pagerUrlBase = $this->view->url(array(), 'catalog-user-video') . "?UserName=" . $input->UserName . "&page=" . "{%page}";
		$pagerLayout = new Doctrine_Pager_Layout($pager, $pagerRange, $pagerUrlBase);

		// set page link display template
		$pagerLayout->setTemplate('<a href="{%url}">{%page}</a>');
		$pagerLayout->setSelectedTemplate('<span class="current">{%page}</span>');
		$pagerLayout->setSeparatorTemplate('&nbsp;');

		// set view variables
		$this->view->UserName = $input->UserName;
		$this->view->records = $result;
		$this->view->pages = $pagerLayout->display(null, true);
			
			
			
	}














	public function listAllLiveAction()
	{
		//$this->_forward('index', 'index', 'default');
		// set filters and validators for GET input
		$filters = array('page' => array('HtmlEntities', 'StripTags', 'StringTrim'));
		$validators = array('page' => array('Int'));
		$input = new Zend_Filter_Input($filters, $validators);
		$input->setData($this->getRequest()->getParams());


		//grab all videos from database
		if($input->isValid())
		{
			$q = Doctrine_Query::create()
			->from('Webteam_Model_Video i');
			//->where('i.VideoType = ?', 'live');
			//$result = $q->fetchArray();
			//$this->view->records = $result;
		
			
		// configure pager
		$perPage = 8;
		$numPageLinks = 9;

		// initialize pager
		$pager = new Doctrine_Pager($q, $input->page, $perPage);

		// execute paged query
		$result = $pager->execute(array(), Doctrine::HYDRATE_ARRAY);

		// initialize pager layout
		$pagerRange = new Doctrine_Pager_Range_Sliding(array('chunk' => $numPageLinks), $pager);
		$pagerUrlBase = $this->view->url(array(), 'catalog-list-live', 1) . "/{%page}";
		$pagerLayout = new Doctrine_Pager_Layout($pager, $pagerRange, $pagerUrlBase);

		// set page link display template
		$pagerLayout->setTemplate('<a href="{%url}">{%page}</a>');
		$pagerLayout->setSelectedTemplate('<span class="current">{%page}</span>');
		$pagerLayout->setSeparatorTemplate('&nbsp;');

		// set view variables
		$this->view->records = $result;
		$this->view->pages = $pagerLayout->display(null, true);
		}	
			
			
	}




	public function listPastBroadcastsAction()
	{

		//$this->_forward('index', 'index', 'default');
		// set filters and validators for GET input
		$filters = array('page' => array('HtmlEntities', 'StripTags', 'StringTrim'));
		$validators = array('page' => array('Int'));
		$input = new Zend_Filter_Input($filters, $validators);
		$input->setData($this->getRequest()->getParams());


		//grab all videos from database
		if($input->isValid())
		{
			$q = Doctrine_Query::create()
			->from('Webteam_Model_Video i')
			->where('i.VideoType = ?', 'not-live');
			$result = $q->fetchArray();
			$this->view->records = $result;
		}
			
		// configure pager
		$perPage = 8;
		$numPageLinks = 9;

		// initialize pager
		$pager = new Doctrine_Pager($q, $input->page, $perPage);

		// execute paged query
		$result = $pager->execute(array(), Doctrine::HYDRATE_ARRAY);

		// initialize pager layout
		$pagerRange = new Doctrine_Pager_Range_Sliding(array('chunk' => $numPageLinks), $pager);
		$pagerUrlBase = $this->view->url(array(), 'catalog-list-past', 1) . "/{%page}";
		$pagerLayout = new Doctrine_Pager_Layout($pager, $pagerRange, $pagerUrlBase);

		// set page link display template
		$pagerLayout->setTemplate('<a href="{%url}">{%page}</a>');
		$pagerLayout->setSelectedTemplate('<span class="current">{%page}</span>');
		$pagerLayout->setSeparatorTemplate('&nbsp;');

		// set view variables
		$this->view->records = $result;
		$this->view->pages = $pagerLayout->display(null, true);
			
			

	}
	public function createAction()
	{
		$form = new Webteam_Form_VideoCreate;
		$this->view->form = $form;
			
		//test for valid input
		// if valid, populate model
		//assign default values for some fields
		// save to database
			
		if($this->getRequest()->isPost()){
			if($form->isValid($this->getRequest()->getPost())){
				$item = new Webteam_Model_Video;
				$item->fromArray($form->getValues());
				$item->save();
				$id = $item->VideoID;
				$this->_helper->getHelper('FlashMessenger')->addMessage('Your submission has been accepted as video #' . $id);
				$this->_redirect('/catalog/video/success');
			}
		}
	}




	public function displayAction()
	{
		// set filters and validators for GET input
		$filters = array('id' => array('HtmlEntities', 'StripTags', 'StringTrim'));
		$validators = array('id' => array('NotEmpty', 'Int'));

		// test if input is valid
		// retrieve requested record
		// attach to view
		$input = new Zend_Filter_Input($filters, $validators);
		$input->setData($this->getRequest()->getParams());
		
	
		if ($input->isValid()) {
			$q = Doctrine_Query::create()
			->from('Webteam_Model_Video i')
			->where('i.VideoID = ?', $input->id);
			$result = $q->fetchArray();
			if (count($result) == 1)
			{
				$this->view->item = $result[0];

				// initialize logging engine
				$logger = new Zend_Log();
				// add Doctrine writer
				//values on the right represent database attritubtes
				$columnMap = array(
				      'message' => 'LogMessage',
				      'user' => 'UserName',
				      'videoid' => 'VideoID',

				);
				$dbWriter = new Webteam_Log_Writer_Doctrine('Webteam_Model_Log', $columnMap);
				$logger->addWriter($dbWriter);

				// add additional data to log message
				$auth = Zend_Auth::getInstance();
				$identity = $auth->getIdentity();
				$user = $identity['UserName'];

					
				$logger->setEventItem('user', $user);
				$logger->setEventItem('videoid', $result[0]['VideoID']);

				// write log message
				$logger->log('user trace', Zend_Log::INFO);
			}
			else
			{
				throw new Zend_Controller_Action_Exception('Page not found', 404);
			}
		}
		else
		{
			throw new Zend_Controller_Action_Exception('Invalid input');
		}
	}

	// action to perform full-text search
	public function searchAction()
	{


		// generate input form
		$form = new Webteam_Form_Search;
		$this->view->form = $form;

		// get items matching search criteria
		if ($form->isValid($this->getRequest()->getParams())) {
			$input = $form->getValues();

			//create full index
			// create and execute query
			$q = Doctrine_Query::create()
			->from('Webteam_Model_Video i');
			$result = $q->fetchArray();

			// get index directory
			$config = $this->getInvokeArg('bootstrap')->getOption('indexes');
			$index = Zend_Search_Lucene::open($config['indexPath']);
				

			//delete all docments
			for ($count = 0; $count < $index->maxDoc(); $count++) {
				$index->delete($count);
			}



			foreach ($result as $r) {
				// create new document in index
				$doc = new Zend_Search_Lucene_Document();

				// index and store fields
				//becareful $hit->id, and $hit->score are reserved, use $hit->getDocument()->id instead if you are using id
				$doc->addField(Zend_Search_Lucene_Field::UnIndexed('VideoID', $r['VideoID']));
				$doc->addField(Zend_Search_Lucene_Field::Text('Title', $r['Title']));
				$doc->addField(Zend_Search_Lucene_Field::UnStored('Description', $r['Description']));


				// save result to index
				$index->addDocument($doc);
				$index->commit();//very important for the update, otherwise new documents won't be saved
			}



			if (!empty($input['q'])) {
				$config = $this->getInvokeArg('bootstrap')->getOption('indexes');
				$index = Zend_Search_Lucene::open($config['indexPath']);
				$results = $index->find(Zend_Search_Lucene_Search_QueryParser::parse($input['q']));
				$this->view->results = $results;
			}
		}
	}

	public function successAction()
	{
		if($this->_helper->getHelper('FlashMessenger')->getMessages())
		{
			$this->view->messages = $this->_helper->getHelper('FlashMessenger')->getMessages();
		}
		else{
			$this->_redirect('/');
		}
	}
}