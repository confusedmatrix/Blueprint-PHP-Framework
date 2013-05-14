<?php

namespace Sample\Model;

use Blueprint\Model\Model;
use Sample\Form\LoginForm;

/**
 * Login class.
 * 
 * @extends Model
 */
class Login extends Model {

    /**
     * setContainer function.
     * 
     * @access public
     * @param mixed $container
     * @return void
     */
    public function setContainer($container) {
    
        parent::setContainer($container);
        
        $this->request = $this->container->get('request');
        $this->form = $this->container->get('form');
        $this->session = $this->container->get('session');
        $this->auth = $this->container->get('authentication');
    
    }
    
    /**
     * run function.
     * 
     * @access public
     * @return void
     */
    public function run() {
    
        if ($this->session->get('logged_in') === true) {
        
            return 'You are logged in! <a href="secured/logout">Click here to log out</a>';
        
        } else {
        
            $this->form = new LoginForm($this->request);
            return $this->checkLogin();
        
        }    
    
    }
    
    /**
     * checkLogin function.
     * 
     * @access public
     * @return void
     */
    public function checkLogin() {
    
        if ($this->form->isSubmitted()) {
            
            $this->form->validate();
            $this->form->setSubmittedValues();
            
            if ($this->form->isValid()) {
            
                if ($this->auth->login($this->request->post('user_name'), $this->request->post('password')))
                    return 'Successful login';
            
            }
            
        }
        
        return $this->form->render();    
    
    }

}