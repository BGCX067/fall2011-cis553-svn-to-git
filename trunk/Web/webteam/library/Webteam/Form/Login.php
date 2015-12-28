<?php
class Webteam_Form_Login extends Zend_Form
{
  public function init()
  {
    // initialize form
    $this->setAction('/login')
         ->setMethod('post');
         
    // create text input for name 
    $UserName = new Zend_Form_Element_Text('UserName');
    $UserName->setLabel('Username:')
             ->setOptions(array('size' => '50'))
             ->setRequired(true)
             ->addValidator('Alnum')            
             ->addFilters(array(new Zend_Filter_HtmlEntities(), new Zend_Filter_StringTrim()));//this way is smarter because of autocompletion method
         
         
    // create text input for password
    $Password = new Zend_Form_Element_Password('Password');
    $Password->setLabel('Password:')
             ->setOptions(array('size' => '50'))
             ->setRequired(true)
             ->addFilter('HtmlEntities')            
             ->addFilter('StringTrim');            
         
    // create submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Log In')
           ->setOptions(array('class' => 'submit'));
         
    // attach elements to form    
    $this->addElement($UserName)
         ->addElement($Password)
         ->addElement($submit);         
  }
}
