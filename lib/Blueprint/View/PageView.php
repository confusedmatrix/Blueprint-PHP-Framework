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
	 * @param bool $echo (default: true)
	 * @return void
	 */
	public function pageInfo($key, $default='', $echo=true) {
	
		$val = !empty($this->page->$key) ? $$this->page->$key : $default;
		
		if ($echo === true)
			echo $val;
		else
			return $val;
	
	}
	
	/**
	 * displayCss function.
	 *
	 * Renders the HTML for all the registered CSS files.
	 * 
	 * @access public
	 * @return void
	 */
	public function displayCss() {
	
		foreach ($this->page->css as $css)
			echo '<link rel="stylesheet" type="text/less" href="' . $css . '" />' . "\n";
	
	}
	
	/**
	 * displayJs function.
	 *
	 * Renders the HTML for all the registered JavaScript files.
	 * 
	 * @access public
	 * @return void
	 */
	public function displayJs() {
	
		foreach ($this->page->js as $js)
			echo '<script type="text/javascript" src="' . $js . '"></script>' . "\n";		
	
	}
	
}