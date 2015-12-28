<?php
class Webteam_Controller_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{
	public function preDispatch(Zend_Controller_Request_Abstract $request)
	{
		// set up acl
		$acl = new Zend_Acl();
		// add the roles
		$acl->addRole(new Zend_Acl_Role('guest'));
		$acl->addRole(new Zend_Acl_Role('user'));
		$acl->addRole(new Zend_Acl_Role('admin'));
		//$acl->addRole(new Zend_Acl_Role('user'), 'guest');
		//$acl->addRole(new Zend_Acl_Role('admin'), 'user');

		// add the resources
		//Controllers in the Default module
		//the names of the reourses are the names of the default conroller in the custom routes in the application.ini
		$acl->addResource(new Zend_Acl_Resource('index'));
		$acl->addResource(new Zend_Acl_Resource('static-content'));
		$acl->addResource(new Zend_Acl_Resource('error'));
		$acl->addResource(new Zend_Acl_Resource('login'));
		$acl->addResource(new Zend_Acl_Resource('video'));
		$acl->addResource(new Zend_Acl_Resource('soap'));
		$acl->addResource(new Zend_Acl_Resource('report'));
		$acl->addResource(new Zend_Acl_Resource('soap-client'));
		$acl->addResource(new Zend_Acl_Resource('admin.video'));
		$acl->addResource(new Zend_Acl_Resource('admin.account'));
		$acl->addResource(new Zend_Acl_Resource('user.video'));
		$acl->addResource(new Zend_Acl_Resource('user.account'));
		$acl->addResource(new Zend_Acl_Resource('model.generator'));







		// add the resources
		//Controllers in the catalog module, specifiy on controllers and modules here, actions are set with allow or deny functions
		//		$acl->addResource(new Zend_Acl_Resource('catalog'));
		//		$acl->addResource(new Zend_Acl_Resource('admin.item'));
		//		$acl->addResource(new Zend_Acl_Resource('item', 'catalog'));
		//
		//		$acl->addResource(new Zend_Acl_Resource('user.item'));

		//		 // set up the access rules
		//        $acl->allow(null, array('index', 'error'));
		//
		//        // a guest can only read content and login
		//        $acl->allow('guest', 'page', array('index', 'open'));
		//        $acl->allow('guest', 'menu', array('render'));
		//        $acl->allow('guest', 'user', array('login'));
		//        $acl->allow('guest', 'search', array('index', 'search'));
		//        $acl->allow('guest', 'feed');
		//
		//        // cms users can also work with content
		//        $acl->allow('user', 'page', array('list', 'create', 'edit', 'delete'));
		//
		//        // administrators can do anything
		//        $acl->allow('admin', null);
		//



		// set up the access rules for all roles
		//$acl->allow(null, array('index', 'error', 'login', 'static-content'));




		// cms users can also work with content
		//$acl->allow('user', 'page', array('list', 'create', 'edit', 'delete'));
		// set up the access rules
		
		$acl->allow(null, null);
		//$acl->allow('user', null);
		//$acl->allow('admin', null);
		//$acl->deny('guest', null);
		

		//$acl->deny('guest', 'static-content' );



		// fetch the current user
		$auth = Zend_Auth::getInstance();
		if($auth->hasIdentity()) {
			$identity = $auth->getIdentity();
			$role = strtolower($identity['Role']);
		}else{
			$role = 'guest';
		}
		$controller = $request->controller;
		$action = $request->action;





		if($acl->has($controller)){
			if (!$acl->isAllowed($role, $controller, $action)) {
				if ($role == 'guest') {
					$request->setModuleName('default');
					$request->setControllerName('login');
					$request->setActionName('login');
				} else {
					$request->setModuleName('default');
					$request->setControllerName('error');
					$request->setActionName('noauth');
				}
			}
		}
		else{
			//throw new Zend_Controller_Action_Exception;
		}
	}
}

