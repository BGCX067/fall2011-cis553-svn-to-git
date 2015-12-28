<?php
//99
class Webteam_Api_Service  {
	/**
	 *
	 * @param string $UserID
	 * @param string $Password
	 * @return string
	 */
	public function ValidateUser($UserID,$Password) {
		//if true return guid else return INVALID_CREDENTIALS
		$data = array('UserName' => $UserID, 'Password' => $Password);

		$filters = array(
        'UserName' => array('HtmlEntities', 'StringTrim', 'StripTags'),
        'Password' => array('HtmlEntities', 'StringTrim', 'StripTags'));
			
		$validators = array(
        'UserName' => array('NotEmpty'),
        'Password' => array('NotEmpty'));


		$input = new Zend_Filter_Input($filters, $validators);
		$input->setData($data);

		if($input->isValid())
		{
			$adapter = new Webteam_Auth_Adapter_Doctrine($input->UserName, $input->Password);
			$auth = Zend_Auth::getInstance();
			$result = $auth->authenticate($adapter);
			if ($result->isValid())
			{
				$storage = $auth->getStorage();//by defaut storage uses Sessions
				//store only username and role in the session
				$storage->write($adapter->getResultArray('Password'));

				//save guid in the database and return it
				$record = new Webteam_Model_Session;
				$record->SessionID  = uniqid();
				$record->UserName = $input->UserName;
				$record->save();

				return $record->SessionID;
			}
			else
			{
				return 'INVALID_CREDENTIALS';
			}

		}
		else
		{
			return 'INVALID_INPUT';
		}
	}
	/**
	 *
	 * @param string $SessionID
	 * @param string $StreamName
	 * @param string $Keywords
	 * @return string
	 */
	public function CreateStream($SessionID,$StreamName,$Keywords) {//streamName is video title, keywords is the description  for the video
		//check if the $SessionID is valid then create a record in the video table with stream id, Session ID age must be no longer than 2 hours
		//returns the stream id
		//validate and filer input
		$data = array('sessionid' => $SessionID, 'title' => $StreamName, 'description' => $Keywords);

		$filters = array(
        'sessionid' => array('HtmlEntities', 'StringTrim', 'StripTags'),
        'title' => array('HtmlEntities', 'StringTrim', 'StripTags'),
		'description' =>  array('HtmlEntities', 'StringTrim', 'StripTags'));
			
		//@"^(\{{0,1}([0-9a-fA-F]){8}-([0-9a-fA-F]){4}-([0-9a-fA-F]){4}-([0-9a-fA-F]){4}-([0-9a-fA-F]){12}\}{0,1})$"
		//$validators = array('title' => array('StringLength(50)'), 'description' => array('StringLength(50)'),
        //'sessionid' => array( 'NotEmpty'));


		$input = new Zend_Filter_Input($filters, null);
		$input->setData($data);

		if($input->isValid())
		{
			//age should be less than 2 hours
			$q = Doctrine_Query::create()
			->from('Webteam_Model_Session r')
			->where('r.SessionID = ?', $input->sessionid);
			$result = $q->fetchArray();
			$UserName = $result[0]['UserName'];
			if (count($result) >= 1)
			{
				$record = new Webteam_Model_Video;
				$record->StreamID = uniqid();
				$record->Title = $input->title;
				$record->Description = $input->description;
				$record->UserName = $UserName; 
				$record->save();
				return $record->StreamID;

			}
			else
			{
				return 'INVALID_SESSIONID';
			}
		}
		else
		{
			return 'INVALID_PARAMETERS';
		}
	}
	/**
	 *
	 * @param string $UserID
	 * @param string $StreamID
	 * @return boolean
	 */
	public function VerifyStream($UserID,$StreamID) {
		//check if UserID and StreamID are vaild
		//
		//return false;
		//if true return guid else return INVALID_CREDENTIALS
		$data = array('UserName' => $UserID, 'streamid' => $StreamID);

		$filters = array(
        'UserName' => array('HtmlEntities', 'StringTrim', 'StripTags'),
        'streamid' => array('HtmlEntities', 'StringTrim', 'StripTags'));
			
		$validators = array(
        'UserName' => array('NotEmpty'),
        'streamid' => array('NotEmpty'));


		$input = new Zend_Filter_Input($filters, $validators);
		$input->setData($data);

		if($input->isValid())
		{
			$q = Doctrine_Query::create()
			->from('Webteam_Model_Video r')
			->where('r.StreamID = ?', $input->streamid)
			->addWhere('r.UserName = ?', $input->UserName);
			$result = $q->fetchArray();
			if (count($result) >= 1)
			{
				return true;
			}
			else
			{
				return false;
			}

		}
		else
		{
			return false;//returns false if input is not valid
		}
	}
}