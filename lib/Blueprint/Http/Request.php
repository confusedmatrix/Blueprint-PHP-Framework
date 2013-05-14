<?php

/*
 * This file is part of the Blueprint Framwork package.
 *
 * (c) Christopher Briggs <chris@jooldesign.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Blueprint\Http;

/**
 * Request class.
 *
 * Contains all details related to an HTTP request from the client
 * 
 * @package blueprint
 * @abstract
 * @author Christopher <chris@jooldesign.co.uk>
 */
class Request {

	private $_raw = array();

	private $_get = array();
	private $_post = array();
	private $_cookies = array();
	private $_files = array();
	private $_server = array();

	public function __construct($get=array(), $post=array(), $cookies=array(), $files=array(), $server=array()) {

		$this->setGetData($get);
		$this->setPostData($post);
		$this->setCookieData($cookies);
		$this->setFileData($files);
		$this->setServerData($server);

	}

	/**
     * __call function.
     * 
     * Method for accessing globals
     *
     * @access public
     * @param mixed $method
     * @param mixed $attributes
     * @return void
     */
    public function __call($method, $attributes) {
    
        if (!empty($method)) {
            
            $vars = empty($attributes[1]) ? $this->{'_'.$method} : $this->_raw['method'];
            if (empty($attributes[0])) {
            	
            	return $vars;

            } else {

           		return empty($vars[$attributes[0]]) ? null : $vars[$attributes[0]];

            }
            
        } else {
            
            throw new \Exception('Method or property ' . $method . ' does not exist.');
            
        }
    
    }

	public function setGetData($get=array()) {

		$this->_raw['get'] = $get;
		$this->_get = $this->filter($get);

	}

	public function setPostData($post=array()) {

		$this->_raw['post'] = $post;
		$this->_post = $this->filter($post);

	}

	public function setCookieData($cookies=array()) {

		$this->_raw['cookies'] = $cookies;
		$this->_cookies = $this->filter($cookies);

	}

	public function setFileData($files=array()) {

		$this->_raw['files'] = $files;
		$this->_files = $this->filter($files);

	}

	public function setServerData($server=array()) {

		$this->_raw['server'] = $server;
		$this->_server = $this->filter($server);

	}

	protected function filter($vars=array()) {

		if (empty($vars)) return null;
		if (!is_array($vars)) 
			return filter_var($vars, FILTER_SANITIZE_STRING, array('flags' => array(FILTER_FLAG_ENCODE_LOW, FILTER_FLAG_ENCODE_HIGH)));

		foreach($vars as $k => $v)
			$vars[$k] = $this->filter($v);

		return $vars;

	}
    
}