<?php
class Webteam_Form_VideoCreate extends Zend_Form
{
  public function init()
  {
    // initialize form
    $this->setAction('/catalog/video/create')
         ->setMethod('post');
         
    
    $id= new Zend_Form_Element_Text('VideoID');
    $id->setLabel('ID:')
         ->setOptions(array('size' => '10'))
         ->setRequired(true)
         ->addFilter('HtmlEntities')            
         ->addFilter('StringTrim')
         ->addFilter('Digits')
         ->addFilter('Int');
         
         $userid= new Zend_Form_Element_Text('UserID');
    $userid->setLabel('User ID:')
         ->setOptions(array('size' => '10'))
         ->setRequired(true)
         ->addFilter('HtmlEntities')            
         ->addFilter('StringTrim')
         ->addFilter('Digits')
         ->addFilter('Int');
    
	$type= new Zend_Form_Element_Text('VideoType');
    $type->setLabel('Video Type:')
          ->setOptions(array('size' => '60'))
          ->setRequired(true)
          ->addFilter('HtmlEntities')            
          ->addFilter('StringTrim');  
          
          
    $title= new Zend_Form_Element_Text('Title');
    $title->setLabel('Title:')
          ->setOptions(array('size' => '60'))
          ->setRequired(true)
          ->addFilter('HtmlEntities')            
          ->addFilter('StringTrim');            
     
    $UserName= new Zend_Form_Element_Text('UserName');
    $UserName->setLabel('User Name:')
          ->setOptions(array('size' => '60'))
          ->setRequired(true)
          ->addFilter('HtmlEntities')            
          ->addFilter('StringTrim');  
          
    $imageURL= new Zend_Form_Element_Text('ImageURL');
    $imageURL->setLabel('Image URL:')
          ->setOptions(array('size' => '60'))
          ->setRequired(true)
          ->addFilter('HtmlEntities')            
          ->addFilter('StringTrim');  
          
     $videoPath= new Zend_Form_Element_Text('VideoPath');
     $videoPath->setLabel('Video Path:')
          ->setOptions(array('size' => '60'))
          ->setRequired(true)
          ->addFilter('HtmlEntities')            
          ->addFilter('StringTrim'); 
       
     $videoFileName= new Zend_Form_Element_Text('VideoFileName');
     $videoFileName->setLabel('Video File Name:')
          ->setOptions(array('size' => '60'))
          ->setRequired(true)
          ->addFilter('HtmlEntities')            
          ->addFilter('StringTrim');   
                 
    // create text input for item description
    $desc = new Zend_Form_Element_Textarea('Description');
    $desc->setLabel('Description:')
          ->setOptions(array('rows' => '15','cols' => '60'))
          ->setRequired(true)
          ->addFilter('HtmlEntities')            
          ->addFilter('StripTags')            
          ->addFilter('StringTrim');           

 
          
    // create submit button
    $submit = new Zend_Form_Element_Submit('submit');
    $submit->setLabel('Submit Entry')
           ->setOrder(100)
           ->setOptions(array('class' => 'submit'));
                
       
    $this->addElement($id)
         ->addElement($title)
         ->addElement($type)
         ->addElement($userid)
         ->addElement($UserName)
         ->addElement($imageURL)
         ->addElement($videoPath)
         ->addElement($videoFileName)
         ->addElement($desc);
         
   
    $this->addDisplayGroup(
    array('VideoID', 'VideoType', 'Title', 'Description' , 'id' , 'UserName', 
    'ImageURL', 'VideoPath', 'VideoFileName' ), 'Video Information');
    $this->getDisplayGroup('Video Information')
         ->setOrder(10)
         ->setLegend('Video Information');
         
  
 
         
    // attach element to form    
    $this->addElement($submit);    
  }
      
}
