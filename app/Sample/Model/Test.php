<?php

namespace Sample\Model;

use Blueprint\Model\Model;

/**
 * Test class.
 * 
 * @extends Model
 */
class Test extends Model {

	/**
	 * setContainer function.
	 * 
	 * @access public
	 * @param mixed $container
	 * @return void
	 */
	public function setContainer($container) {
	
		parent::setContainer($container);
		
		$this->database = $this->container->get('database');
		$this->cache = $this->container->get('fragment_caching');
	
	}
	
	/**
	 * getRow function.
	 * 
	 * @access public
	 * @param mixed $id
	 * @return void
	 */
	public function getRow($id) {
	
		$options = array(			
			
			'table'		=> 'table1',
			'select' 	=> array('*'),
			'where'		=> array(
				array(
					't1_id',
					'=',
					$id
				)
			)
		
		);
		
		$row = $this->database->fetchRow($options);
		return implode(", ", $row);
	
	}
	
	/**
	 * getRows function.
	 * 
	 * @access public
	 * @return void
	 */
	public function getRows() {
	
		if ($out = $this->cache->get('test.getrows'))
			return $out;
		
		// find total number of rows
		$options = array(
				
			'table'		=> 'table1',
			'select' 	=> array('t1_id')
				
		);
		
		$num_rows = count($this->database->fetchRows($options));
		
		// return a subset the of the rows (with all fields this time)
		$options['select'] = array('*');
		$options['limit'] = array(0,2);
		
		$rows = $this->database->fetchRows($options);
		
		$out = '';
		foreach ($rows as $row)
			$out .= implode(", ", $row) . '<br />';
			
		$this->cache->set('test.getrows', $out);
		
		return $out;
	
	}

}