<?php
require("..\..\..\..\..\ZendServer\share\ZendFramework\library\Zend\Soap\Server.php");
require("..\..\..\..\..\ZendServer\share\ZendFramework\library\Zend\Soap\Wsdl.php");
require("..\..\..\..\..\ZendServer\share\ZendFramework\library\Zend\Soap\AutoDiscover.php");
require("..\..\..\..\..\ZendServer\share\ZendFramework\library\Zend\Soap\Client.php");
$client = new Zend_Soap_Client("http://localhost/WebTeamCode/CIS553WebTeam/public/authwebservice.php?wsdl");
$result1 = $client->ValidateUser("a", "b");
//print("Called web service successfully <br />");
print("Value returned is: ".$result1);
$client2 = new Zend_Soap_Client("http://localhost/WebTeamCode/CIS553WebTeam/public/authwebservice.php?wsdl");
$result2 = $client2->CreateStream("a", "b", "c");
print("<br /> stream value returned is: ".$result2);
$client3 = new Zend_Soap_Client("http://localhost/WebTeamCode/CIS553WebTeam/public/authwebservice.php?wsdl");
$result3 = $client3->VerifyStream("a", "b");
print("<br /> stream value returned is: ".$result3);
?>

