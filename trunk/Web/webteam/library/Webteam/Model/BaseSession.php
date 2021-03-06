<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Webteam_Model_Session', 'doctrine');

/**
 * Webteam_Model_BaseSession
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $SessionID
 * @property string $UserName
 * @property timestamp $DateCreated
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Webteam_Model_BaseSession extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('session');
        $this->hasColumn('SessionID', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('UserName', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('DateCreated', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}