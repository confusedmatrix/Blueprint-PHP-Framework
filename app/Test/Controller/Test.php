<?php

namespace Test\Controller;

use Blueprint\Controller\Controller;
use Test\View;

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
    
    }
    
    /**
     * testAction function.
     * 
     * @access public
     * @param int $id (default: 1)
     * @return void
     */
    public function testAction($var1, $var2) {    
        
        $vars['content'] = 'VAR1 = ' . $var1 . ' & VAR2 = ' . $var2;
        echo $this->view->render("index.php", $vars);
    
    }

}