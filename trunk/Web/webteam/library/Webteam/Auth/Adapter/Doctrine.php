<?php
class Webteam_Auth_Adapter_Doctrine implements Zend_Auth_Adapter_Interface
{
  // array containing authenticated user record
  protected $_resultArray;
  
  // constructor
  // accepts username and password    
  public function __construct($UserName, $Password)
  {
    $this->UserName = $UserName;
    $this->Password = $Password;
  }

  // main authentication method
  // queries database for match to authentication credentials
  // returns Zend_Auth_Result with success/failure code
  public function authenticate()
  {
    $q = Doctrine_Query::create()
          ->from('Webteam_Model_User u')
          ->where('u.UserName = ? AND u.Password = ?',
                    array($this->UserName, $this->Password)
          );
    $result = $q->fetchArray();
    if (count($result) == 1) {
      $this->_resultArray = $result[0];
      return new Zend_Auth_Result(
        Zend_Auth_Result::SUCCESS, $this->UserName, array());
    } else {
      return new Zend_Auth_Result(
        Zend_Auth_Result::FAILURE, null, 
          array('Authentication unsuccessful')
      );      
    }
  }
  
  // check username uniqueness
  // returns Zend_Auth_Result with success/failure code
  public function isUniqueUsername()
  {
    $q = Doctrine_Query::create()
          ->from('Webteam_Model_User u')
          ->where('u.UserName = ? ', array($this->UserName)
          );
    $result = $q->fetchArray();
    if (count($result) >= 1) {
      	return false;
    } else {
      return true;
     
    }
  }
  
  // returns result array representing authenticated user record
  // excludes specified user record fields as needed
  public function getResultArray($excludeFields = null)
  {
    if (!$this->_resultArray) {
      return false;
    } 

    if ($excludeFields != null) {
      $excludeFields = (array)$excludeFields;
      foreach ($this->_resultArray as $key => $value) {
        if (!in_array($key, $excludeFields)) {  
          $returnArray[$key] = $value;  
        }
      }
      return $returnArray;      
    } else {
      return $this->_resultArray;        
    }      
  }
}
