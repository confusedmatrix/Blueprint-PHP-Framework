<?php

namespace Sample\Controller;

use Blueprint\Controller\Controller;
use Sample\Model;
use Sample\View;

/**
 * Test class.
 * 
 * @extends Controller
 */
class Test extends Controller {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        
        $this->model = new Model\Test();
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
        
        $this->model->setContainer($this->container);
        $this->view->setContainer($this->container);
        
        $this->page = $this->container->get('page');
        $this->page->h1 = 'Test';
    
    }

    /**
     * indexAction function.
     * 
     * @access public
     * @return void
     */
    public function indexAction() {
        
        $vars['content'] = $this->model->getRows();
        echo $this->view->render("index.php", $vars);
        
    }
    
    /**
     * testAction function.
     * 
     * @access public
     * @param int $id (default: 1)
     * @return void
     */
    public function testAction($id=1) {    
        
        $vars['content'] = $this->model->getRow($id);
        echo $this->view->render("index.php", $vars);
    
    }

}