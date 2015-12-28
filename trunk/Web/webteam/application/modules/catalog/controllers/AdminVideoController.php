<?php
class Catalog_AdminVideoController extends Zend_Controller_Action
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

	// action to display list of catalog items
	public function indexAction()
	{
		//$this->_forward('index', 'index', 'default');
		// set filters and validators for GET input
		$filters = array('page' => array('HtmlEntities', 'StripTags', 'StringTrim'));
		$validators = array('page' => array('Int'));
		$input = new Zend_Filter_Input($filters, $validators);
		$input->setData($this->getRequest()->getParams());

		if($input->isValid())
		{
			$q = Doctrine_Query::create()
			->from('Webteam_Model_Video i');
			//$result = $q->fetchArray();
			//$this->view->records = $result;
		
			
		// configure pager
		$perPage = 10;
		$numPageLinks = 9;

		// initialize pager
		$pager = new Doctrine_Pager($q, $input->page, $perPage);

		// execute paged query
		$result = $pager->execute(array(), Doctrine::HYDRATE_ARRAY);

		// initialize pager layout
		$pagerRange = new Doctrine_Pager_Range_Sliding(array('chunk' => $numPageLinks), $pager);
		$pagerUrlBase = $this->view->url(array(), 'admin-catalog-index', 1) . "/{%page}";
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

	// action to delete catalog items
	public function deleteAction()
	{
		// set filters and validators for POST input
		$filters = array(
      'ids' => array('HtmlEntities', 'StripTags', 'StringTrim')
		);
		$validators = array(
      'ids' => array('NotEmpty', 'Int')
		);
		$input = new Zend_Filter_Input($filters, $validators);
		$input->setData($this->getRequest()->getParams());

		// test if input is valid
		// read array of record identifiers
		// delete records from database
		if ($input->isValid()) {
			$q = Doctrine_Query::create()
			->delete('Webteam_Model_Video i')
			->whereIn('i.VideoID', $input->ids);
			$result = $q->execute();
			$this->_helper->getHelper('FlashMessenger')->addMessage('The records were successfully deleted.');
			$this->_redirect('/admin/catalog/video/success');
		} else {
			throw new Zend_Controller_Action_Exception('Invalid input');
		}
	}

	// action to modify an individual catalog item
	public function updateAction()
	{
		// generate input form
		$form = new Webteam_Form_VideoUpdate;
		$this->view->form = $form;

		if ($this->getRequest()->isPost()) {
			// if POST request
			// test if input is valid
			// retrieve current record
			// update values and replace in database
			$postData = $this->getRequest()->getPost();

			if ($form->isValid($postData)) {
				$input = $form->getValues();
				$item = Doctrine::getTable('Webteam_Model_Video')->find($input['VideoID']);
				$item->fromArray($input);
				$item->save();
				$this->_helper->getHelper('FlashMessenger')->addMessage('The record was successfully updated.');
				$this->_redirect('/admin/catalog/video/success');
			}
		} else {
			// if GET request
			// set filters and validators for GET input
			// test if input is valid
			// retrieve requested record
			// pre-populate form
			$filters = array(
        'id' => array('HtmlEntities', 'StripTags', 'StringTrim')
			);
			$validators = array(
        'id' => array('NotEmpty', 'Int')
			);
			$input = new Zend_Filter_Input($filters, $validators);
			$input->setData($this->getRequest()->getParams());
			if ($input->isValid()) {
				$q = Doctrine_Query::create()
				->from('Webteam_Model_Video i')
				->where('i.VideoID = ?', $input->id);
				$result = $q->fetchArray();
				if (count($result) == 1) {
					// perform adjustment for date selection lists
					$this->view->form->populate($result[0]);
				} else {
					throw new Zend_Controller_Action_Exception('Page not found', 404);
				}
			} else {
				throw new Zend_Controller_Action_Exception('Invalid input');
			}
		}
	}

	// action to display an individual catalog item
	public function displayAction()
	{
		// set filters and validators for GET input
		$filters = array(
      'id' => array('HtmlEntities', 'StripTags', 'StringTrim')
		);
		$validators = array(
      'id' => array('NotEmpty', 'Int')
		);
		$input = new Zend_Filter_Input($filters, $validators);
		$input->setData($this->getRequest()->getParams());

		// test if input is valid
		// retrieve requested record
		// attach to view
		if ($input->isValid()) {
			$q = Doctrine_Query::create()
			->from('Webteam_Model_Video i')
			->where('i.VideoID = ?', $input->id);
			$result = $q->fetchArray();
			if (count($result) == 1) {
				$this->view->item = $result[0];
			} else {
				throw new Zend_Controller_Action_Exception('Page not found', 404);
			}
		} else {
			throw new Zend_Controller_Action_Exception('Invalid input');
		}
	}

	// action to create full-text indices
	public function createFulltextIndexAction()
	{
		// create and execute query
		$q = Doctrine_Query::create()
		->from('Webteam_Model_Video i');
		$result = $q->fetchArray();

		// get index directory
		$config = $this->getInvokeArg('bootstrap')->getOption('indexes');
		$index = Zend_Search_Lucene::create($config['indexPath']);

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
		}

		// set number of documents in index
		$count = $index->count();
		$this->_helper->getHelper('FlashMessenger')->addMessage("The index was successfully created with $count documents.");
		$this->_redirect('/admin/catalog/video/success');
	}

	// success action
	public function successAction()
	{
		if ($this->_helper->getHelper('FlashMessenger')->getMessages()) {
			$this->view->messages = $this->_helper->getHelper('FlashMessenger')->getMessages();
		} else {
			$this->_redirect('/admin/catalog/video/index');
		}
	}


}
