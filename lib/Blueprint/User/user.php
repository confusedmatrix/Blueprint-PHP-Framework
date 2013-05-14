<?php

/*
 * This file is part of the Blueprint Framwork package.
 *
 * (c) Christopher Briggs <chris@jooldesign.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Blueprint\User;

/**
 * User class.
 *
 * Stores the state of a user and provides methods for getting details 
 * about a user.
 *
 * @package blueprint
 * @author Christopher <chris@jooldesign.co.uk>
 */
class User {

    /**
     * database
     * 
     * @var mixed
     * @access protected
     */
    protected $database;
    
    
    /**
     * session
     * 
     * @var mixed
     * @access protected
     */
    protected $session;
    
    /**
     * details
     * 
     * @var mixed
     * @access public
     */
    public $details;
    
    /**
     * logged_in
     * 
     * (default value: false)
     * 
     * @var bool
     * @access public
     */
    public $logged_in = false;
    
    /**
     * __construct function.
     *
     * Loads dependencies.
     * 
     * @access public
     * @param mixed $database
     * @param mixed $session
     * @return void
     */
    public function __construct($database, $session) {
    
        $this->database = $database;
        $this->session = $session;
        
        if ($this->session->exists('logged_in') && $this->session->get('logged_in') === true) {
        
            $user_id = $this->session->get('user_id');
            
            $this->details = $this->database->fetchRow(
                
                array(
                    'table'     => 'users',
                    'select'    => array('*'),
                    'where'     => array(
                        array(
                            'user_id',
                            '=',
                            $user_id
                        )
                    )
                )
            
            );
            
            $this->logged_in = true;
        
        }
    
    }

}