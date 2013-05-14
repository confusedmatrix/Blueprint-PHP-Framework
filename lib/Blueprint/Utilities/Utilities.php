<?php

/*
 * This file is part of the Blueprint Framwork package.
 *
 * (c) Christopher Briggs <chris@jooldesign.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Blueprint\Utilities;

/**
 * Utilities class.
 *
 * Provides a set of handy methods for common tasks
 *
 * @package blueprint
 * @extends View
 * @author Christopher <chris@jooldesign.co.uk>
 */
class Utilities {

    /*public function __construct($response) {

        $this->response = $response;

    }*/
    
    public function redirect($url, $method=301) {
        
        switch ($method) {
        
            case 302:
            
                header('HTTP/1.1 302 Found');
                break;
                
            default:
            
                header('HTTP/1.1 301 Moved Permanently');
                break;
        
        }
               
        header('Location: ' . $url);
        exit();
    
    }
    
    public function throw404() {
        
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        
        echo '<h1>404 Not Found</h1>';
        exit();
                
    }

}