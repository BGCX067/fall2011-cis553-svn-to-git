<?php
class Webteam_Form_VideoUpdateUser extends Webteam_Form_VideoUpdate
{
	public function init()
	{
		// get parent form
		parent::init();

		$VideoID = $this->getElement('VideoID');
		//$VideoID->setAttrib('disabled', true);
        $VideoID->setAttrib('readonly',true);
		$this->removeElement('UserID');
		$this->removeElement('VideoType');
		$this->removeElement('UserName');
		$this->removeElement('ImageURL');
		$this->removeElement('VideoPath');
		$this->removeElement('VideoFileName');




		// set form action (set to false for current URL)
		$this->setAction('/user/catalog/video/update');


	}
}
