<?php
class Webteam_Form_Password extends Webteam_Form_Registration
{
	public function init()
	{
		// get parent form
		parent::init();

		$this->removeElement('UserID');
		$this->removeElement('UserName');
		$this->removeElement('FirstName');
		$this->removeElement('LastName');
		$this->removeElement('Email');
		$this->removeElement('register');

		$submit = new Zend_Form_Element_Submit('save');
		$submit->setLabel('Save');
		$submit->setOptions(array('class' => 'submit'));
		
		$this->addElement($submit);

		// set form action (set to false for current URL)
		$this->setAction('/user/account/password');
	}
}
