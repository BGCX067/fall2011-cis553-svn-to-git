<?php
require("..\..\..\..\..\ZendServer\share\ZendFramework\library\Zend\Soap\Server.php");
require("..\..\..\..\..\ZendServer\share\ZendFramework\library\Zend\Soap\Wsdl.php");
require("..\..\..\..\..\ZendServer\share\ZendFramework\library\Zend\Soap\AutoDiscover.php");

$serviceURL = 'http://localhost/WebTeamCode/CIS553WebTeam/public/authwebservice.php';

class MyService {
	/**
	 *
	 * @param string $UserID
	 * @param string $Password
	 * @return string
	 */
	public function ValidateUser($UserID,$Password) {
		//add database calls to validate the user and password
		//create a $SessionID
		$Message = com_create_guid();
		return $Message;//this is the $SessionID
	}
	/**
	 *
	 * @param string $SessionID
	 * @param string $StreamName
	 * @param string $Keywords
	 * @return string
	 */
	public function CreateStream($SessionID,$StreamName,$Keywords) {
		//check if the $SessionID is valid then create a record in the video table with stream id
		//returns the stream id
		$Message = com_create_guid();
		return $Message;
	}
	/**
	 *
	 * @param string $UserID
	 * @param string $StreamID
	 * @return boolean
	 */
	public function VerifyStream($UserID,$StreamID) {
		//check if UserID and StreamID are vaild
		return true;
	}
}


//Subscriber
if (isset($_GET['wsdl'])){
	$autodiscover = new Zend_Soap_AutoDiscover();
	$autodiscover->setClass("MyService");
	$autodiscover->handle();
	//Publisher
} else {
	$server = new Zend_Soap_Server($serviceURL . "?wsdl");
	$server->setClass('MyService');
	$server->setObject(new MyService());
	$server->handle();
}




?>


