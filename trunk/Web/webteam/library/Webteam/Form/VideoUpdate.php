<?php
class Webteam_Form_VideoUpdate extends Webteam_Form_VideoCreate
{
  public function init()
  {
    // get parent form
    parent::init();
    
    // set form action (set to false for current URL)
    $this->setAction('/admin/catalog/video/update');

  
  }
}
