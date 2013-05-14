<?php

/*
 * This file is part of the Blueprint Framwork package.
 *
 * (c) Christopher Briggs <chris@jooldesign.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Blueprint\View;

/**
 * PageView class.
 *
 * Provides a set of methods for rendering a web page.
 * 
 * @package blueprint
 * @extends View
 * @author Christopher <chris@jooldesign.co.uk>
 */
class PageView extends View {

    /**
     * page
     * 
     * @var mixed
     * @access protected
     */
    protected $page;
    
    /**
     * setContainer function.
     * 
     * @access public
     * @param mixed $container
     * @return void
     */
    public function setContainer($container) {
    
        parent::setContainer($container);

        $this->page = $this->container->get('page');

    }

    /**
     * pageInfo function.
     *
     * Provides access to page properties.
     * 
     * @access public
     * @param mixed $key
     * @param string $default (default: '')
     * @return void
     */
    public function pageInfo($key, $default='') {
    
        $val = !empty($this->page->$key) ? $this->page->$key : $default;
        return $val;
    
    }
    
    /**
     * getCss function.
     *
     * Renders the HTML for all the registered CSS files.
     * 
     * @access public
     * @return void
     */
    public function getCss() {
    
        $html = '';
        foreach ($this->page->css as $css)
            $html .= '<link rel="stylesheet" type="text/css" href="' . $css . '" />' . "\n";

        return $html;
    
    }
    
    /**
     * getJs function.
     *
     * Renders the HTML for all the registered JavaScript files.
     * 
     * @access public
     * @return void
     */
    public function getJs() {
        
        $html = '';
        foreach ($this->page->js as $js)
            $html .= '<script type="text/javascript" src="' . $js . '"></script>' . "\n";        
            
        return $html;
    }

    /**
     * renderFlashMessage function.
     *
     * Renders the HTML for flash messages that might be associated with form errors etc
     * 
     * @access public
     * @param mixed $flash
     * @return void
     */
    public function renderFlashMessage($flash) {
    
        if (empty($flash['message']))
            return '';
        
        $html = '<div class="alert';
        
        switch ($flash['type']) {
        
            case 'error':
            
                $html .= ' alert-error';
                break;
                
            case 'success':
            
                $html .= ' alert-success';
                break;
                
            case 'info':
            
                $html .= ' alert-info';
                break;
                
            default:
            
                $html .= '';                
        
        }
        
        $html .= '">' . $flash['message'] . '</div>';
        
        return $html;
    
    }
    
    /**
     * renderBreadcrumbs function.
     *
     * Renders the HTML for breadcrumbs
     * 
     * @access public
     * @param mixed $breadcrumbs
     * @return void
     */
    public function renderBreadcrumbs($breadcrumbs) {
        
        if (empty($breadcrumbs))
            return '';
      
        $html = '<ul class="breadcrumb">';
        foreach ($breadcrumbs as $k => $bc) {
        
            if ($k > 0)
                $html .= '<span class="divider">/</span>';

            $html .= '<li>';
            if (is_array($bc)) {
                
                $html .= '<a href="' . $bc[1] . '">' . $bc[0] . '</a> ';

            } else {
      
                $html .= $bc;
      
            } 
      
            $html .= '</li> ';

        }
    
        $html .= '</ul>';
        
        return $html;
        
    }

    /**
     * render function.
     *
     * Adds breadcrumbs and flash message to scope before calling render
     * 
     * @access public
     * @param mixed $template
     * @param boolean $vars
     * @return void
     */
    public function render($template, $vars=false) {
    
        $breadcrumbs = $this->pageInfo('breadcrumbs', false);
        $vars['breadcrumbs'] = $this->renderBreadcrumbs($breadcrumbs);
    
        $flash_message = $this->pageInfo('flash_message', false);
        $vars['flash_message'] = $this->renderFlashMessage($flash_message);
        
        return parent::render($template, $vars);
    
    }
    
}