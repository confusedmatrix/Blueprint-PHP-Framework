<?php

namespace Sample\Controller;

use Blueprint\Controller\Controller;
use Sample\View;

/**
 * Index class.
 * 
 * @extends Controller
 */
class Index extends Controller {

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
        
        $this->page_caching = $this->container->get('page_caching');
        $this->page = $this->container->get('page');
        
        $this->view->setContainer($this->container);
    
    }

    /**
     * indexAction function.
     * 
     * @access public
     * @return void
     */
    public function indexAction() {
    
        $this->page_caching->startCachingFile();
        
        $vars['content'] = 'index 200';
        $this->page->h1 = 'Home page';
        echo $this->view->render("index.php", $vars);
        
        $this->page_caching->stopCachingFile();
    
    }

}