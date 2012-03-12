<?php

/*
    This file shows how to use the form builder to 
    build forms, add validation and render to the page.
    
    This file is not designed to be run but to just 
    give an idea of the different ways to use the 
    form builder.
*/

/***************** SELECTING *****************/

/* 
    Set the options you want the select statement to 
    contain. The minimum is 'table' and 'select'
    
    By nesting the where array, the SQL will use the
    OR command instead of the default AND.
*/
$options = array(            
            
    'table'        => 'table1',
    'select'     => array('*'),
    'join'        => 'INNER JOIN table2 ON table1.field1 = table2.field2',
    'where'        => array(
        array(
            'field1',
            '=',
            $var1
        ),                 // AND (
        array(
            array(
                'field2',
                '=',
                $var2
            ),             // OR
            array(
                'field3',
                '=',
                $var3
            )
        )                // )
    ),
    'group'     => array('field4', 'field5'),
    'order'        => array('field6' => 'ASC'),
    'limit'        => array(0 ,2)
        
);

// pass the options to the fetchRow or fetchRows method
$rows = $database->fetchRows($options);

// You can loop through the data as an array
foreach ($rows as $row) {

    // do something

}

// OR
// this will only pull one row
$row = $database->fetchRow($options);

/***************** INSERTING *****************/

$database->insert(
    
    // table
    'table1',
    
    // values
    array(
        'field1' => $var1,
        'field2' => $var2
    )
    
);

/***************** UPDATING *****************/

$database->update(
    
    // table
    'table1',
    
    // values
    array(
        'field1' => $var1,
        'field2' => $var2
    ),
    
    // where
    array(
        array(
            'field3',
            "LIKE",
            $var3
        )
    )
    
);

/***************** DELETING *****************/

$database->delete(
    
    // table
    'table1',
    
    // where
    array(
        array(
            'field1',
            "!=",
            $var1
        )
    )
    
);