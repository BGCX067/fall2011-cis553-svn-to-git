<?php
require("..\..\..\..\..\zend\ZendServer\share\ZendFramework\library\Zend\Soap\Server.php");
require("..\..\..\..\..\zend\ZendServer\share\ZendFramework\library\Zend\Soap\Wsdl.php");//
require("..\..\..\..\..\zend\ZendServer\share\ZendFramework\library\Zend\Soap\AutoDiscover.php");


$serviceURL = 'http://localhost/MyWebService/public/mywebservice.php';

class MyService {
    /**
     *
     * @param string $UserID
     * @param string $Password
     * @return boolean
     */

   
    public function IsValidUser($UserID,$Password) {
	//add database calls to validate the user and password
	return false;
    }
}

if (isset($_GET['wsdl'])){
    $autodiscover = new Zend_Soap_AutoDiscover();
    $autodiscover->setClass("MyService");
    $autodiscover->handle();
} else {
    $server = new Zend_Soap_Server($serviceURL . "?wsdl");
    $server->setClass('MyService');
    $server->setObject(new MyService());
    $server->handle();
}




?>


