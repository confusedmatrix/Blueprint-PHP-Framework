<?php

namespace Sample\Controller;

use Blueprint\Controller\Controller;
use Sample\Model;
use Sample\View;

/**
 * Secured class.
 * 
 * @extends Controller
 */
class Secured extends Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		$this->view = new View\Index();
		
	}
	
	/**
	 * setContainer function.
	 * 
	 * @access public
	 * @param mixed $container
	 * @return void
	 */
	public function setContainer($container) {
	
		parent::setContainer($container);
        
        $this->view->setContainer($this->container);
        
        $this->page = $this->container->get('page');
        $this->page->h1 = 'Secured Page';
        
    }

	/**
	 * indexAction function.
	 * 
	 * @access public
	 * @return void
	 */
	public function indexAction() {
	
		$this->model = new Model\Login();
		$this->model->setContainer($this->container);
		
		$vars['content'] = $this->model->run();
		
		echo $this->view->render("index.php", $vars);
	
	}
	
	/**
	 * logoutAction function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logoutAction() {
	
		$this->container->get('authentication')->logout();
		
		$vars['content'] = 'You have been  logged out. <a href="../secured">Log in again</a>';
		echo $this->view->render("index.php", $vars);
		
	}

}