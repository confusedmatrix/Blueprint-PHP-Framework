<?php

namespace Sample\Controller;

use Blueprint\Controller\Controller;
use Sample\View;

/**
 * CssTest class.
 * 
 * @extends Controller
 */
class CssTest extends Controller {

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
        $this->page->h1 = 'Title 01 Heading';
    
    }

    /**
     * indexAction function.
     * 
     * @access public
     * @return void
     */
    public function indexAction() {
    
        echo $this->view->render("lipsum.php");
        
    }

}