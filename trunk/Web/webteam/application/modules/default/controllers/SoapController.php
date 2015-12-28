<?php
require_once realpath(APPLICATION_PATH . '/../library/').'/Webteam/Api/Service.php';

class SoapController extends Zend_Controller_Action
{
	private $_WSDL_URI = "http://webteam/soap?wsdl";

	public function init()
	{
	}

	public function indexAction()
	{
		$this->_helper->viewRenderer->setNoRender();
		$this->_helper->layout->disableLayout();

		 
		if(isset($_GET['wsdl'])) {
			//return the WSDL
			$this->hadleWSDL();


		} else {
			//handle SOAP request
			$this->handleSOAP();

		}
	}

	private function hadleWSDL() 
	{
		$autodiscover = new Zend_Soap_AutoDiscover();
		$autodiscover->setClass('Webteam_Api_Service');
		$autodiscover->handle();
	}
	//Publisher
	private function handleSOAP() 
	{
		$soap = new Zend_Soap_Server($this->_WSDL_URI);
		$soap->setClass('Webteam_Api_Service');
		$soap->handle();
	}

	public function clientAction() 
	{
		 
		//need to consume other webservices
		$client = new Zend_Soap_Client("http://webteam/soap?wsdl");
		$result1 = $client->ValidateUser("admin1", "pass1");
		$this->view->result1 = $result1;
		
		$client2 = new Zend_Soap_Client("http://webteam/soap?wsdl");
		$result2 = $client2->CreateStream($result1, "title", "description");
		$this->view->result2 = $result2;
		
		$client3 = new Zend_Soap_Client("http://webteam/soap?wsdl");
		$result3 = $client3->VerifyStream("admin1", $result2);
		$this->view->result3 = $result3;
		
		 
	}

}

