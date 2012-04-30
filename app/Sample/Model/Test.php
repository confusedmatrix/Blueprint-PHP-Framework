<?php

namespace Sample\Model;

use Blueprint\Model\Model;
use Blueprint\Table\Table;

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
            
            'table'        => 'table1',
            'select'     => array('*'),
            'where'        => array(
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
    
        if ($rows = $this->cache->get('test.getrows'))
            return $rows;
        
        // find total number of rows
        $options = array(
                
            'table'        => 'table1',
            'select'     => array('t1_id')
                
        );
        
        $num_rows = count($this->database->fetchRows($options));
        
        // return a subset the of the rows (with all fields this time)
        $options['select'] = array('*');
        $options['limit'] = array(0,3);
        
        $rows = $this->database->fetchRows($options);
            
        $this->cache->set('test.getrows', $rows);
        
        $table = new Table($rows);
        $table->setColumnData(
        
            array(
                't1_id'     => 'ID',
                't1_name'   => 'Name'              
            )
            
        );
        
        $table->setAttr('class', 'table table-striped');
        $table->addAction('Add', 'some/link', 'btn-primary');
        
        return $table->render();
    
    }

}