<?php 
class Webteam_Form_Registration extends Zend_Form
{
  public function init()
  {
    // initialize form
    $this->setAction('/signup')
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
         
         
    // create text input for name 
    $UserName = new Zend_Form_Element_Text('UserName');
    $UserName->setLabel('Username:')
             ->setOptions(array('size' => '50'))
             ->setRequired(true)
             ->addValidator('Alnum')            
             ->addFilter('HtmlEntities')            
             ->addFilter('StringTrim');            
         
    // create text input for password
    $Password = new Zend_Form_Element_Password('Password');
    $Password->setLabel('Password:')
             ->setOptions(array('size' => '50'))
             ->setRequired(true)
             ->addValidator('NotEmpty', true)
             ->addFilter('HtmlEntities')            
             ->addFilter('StringTrim');  
              
    // create text input for password confirmation
    $ConfirmPassword = new Zend_Form_Element_Password('ConfirmPassword');
    $ConfirmPassword->setLabel('Confirm Password:')
             ->setOptions(array('size' => '50'))
             ->setRequired(true)
             ->addValidator('NotEmpty', true)
             ->addFilter('HtmlEntities')            
             ->addFilter('StringTrim');                    
    
             
             
             
    // create submit button
    $submit = new Zend_Form_Element_Submit('register');
    $submit->setLabel('Register')
           ->setOptions(array('class' => 'submit'));
         
    // attach elements to form    
    $this->addElement($firstname)
         ->addElement($lastname)
         ->addElement($email)
         ->addElement($UserName)
         ->addElement($Password)
         ->addElement($ConfirmPassword)
         ->addElement($submit); 
  }
}
