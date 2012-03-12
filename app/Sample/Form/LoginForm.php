<?php

namespace Sample\Form;

use Blueprint\Form\Form;
use Blueprint\Form\FormField;
use Blueprint\Form\FormValidation;

/**
 * LoginForm class.
 * 
 * @extends Form
 */
class LoginForm extends Form {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        
        parent::__construct('', 'post', array());
        
        $this->buildForm();
        
    }
    
    /**
     * buildForm function.
     * 
     * @access private
     * @return void
     */
    private function buildForm() {
    
        $this->user_name = new FormField('text', 'user_name', 'Username');
        $this->user_name->addValidation('required');
        
        $this->password = new FormField('password', 'password', 'Password');
        $this->password->addValidation('required');
    
        $this->submit = new FormField('submit', 'submit');
        $this->submit->setValue('Login');
        $this->submit->setAttr('class', 'btn btn-primary');
    
    }

}