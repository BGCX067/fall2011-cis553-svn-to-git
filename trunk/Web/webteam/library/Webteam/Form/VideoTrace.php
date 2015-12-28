<?php
class Webteam_Form_VideoTrace extends Zend_Form
{
  public function init()
  {
    // initialize form
    $this->setAction('/report/videotrace')
         ->setMethod('get');
         
    // create text input for keywords
    $query = new Zend_Form_Element_Text('q');
    $query->setLabel('Video ID:')
             ->setOptions(array('size' => '20'))
             ->addFilter('HtmlEntities')            
             ->addFilter('StringTrim');       

             
    // create submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Trace')
           ->setOptions(array('class' => 'submit'));

         
    // attach elements to form    
    $this->addElement($query)
         ->addElement($submit);    
  }
 
}