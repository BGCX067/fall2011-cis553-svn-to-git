<?php
class Webteam_Form_UserAccountUpdate extends Zend_Form
{

	public function init()
	{
		// initialize form
		$this->setAction('/user/account/update')
		->setMethod('post');

		$firstname = new Zend_Form_Element_Text('FirstName');
		$firstname->setLabel('First name:')
		->setOptions(array('size' => '35'))
		->setRequired(true)
		->addValidator('NotEmpty', true)
		->addValidator('Alpha', true)
		->addFilter('HtmlEntities')
		->addFilter('StringTrim');

		$lastname = new Zend_Form_Element_Text('LastName');
		$lastname->setLabel('Last name:')
		->setOptions(array('size' => '35'))
		->setRequired(true)
		->addValidator('NotEmpty', true)
		->addValidator('Alpha', true)
		->addFilter('HtmlEntities')
		->addFilter('StringTrim');

		// create text input for email address
		$email = new Zend_Form_Element_Text('Email');
		$email->setLabel('Email address:');
		$email->setOptions(array('size' => '50'))
		->setRequired(true)
		->addValidator('NotEmpty', true)
		->addValidator('EmailAddress', true)
		->addFilter('HtmlEntities')
		->addFilter('StringToLower')
		->addFilter('StringTrim');
		 
		 
		// create submit button
		$submit = new Zend_Form_Element_Submit('update');
		$submit->setLabel('Update')
		->setOptions(array('class' => 'submit'));
		 
		// attach elements to form
		$this->addElement($firstname)
		->addElement($lastname)
		->addElement($email)
		->addElement($submit);
	}
}