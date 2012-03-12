<?php

/*
    This file shows how to use the databse class to 
    select, insert, update and delete data.
    
    This file is not designed to be run but to just 
    give an idea of the different ways to use the 
    database.
*/

/***************** STEP 1 *****************/

// Setup the form (method 1)
$form = new Form(

    '#',                     // form handler URL
    'post',                    // form method
    array(                    // form attributes
        'id'     => 'form1',
        'name'    => 'form1'
    )

);


// Setup the form (method 1)
$form = new Form('#', 'post');
$form->setAttr('id', 'form1');
$form->setAttr('name', 'form1');

/***************** STEP 2 *****************/

// Build form (method 1)
$form->name = new FormField('text', 'name', 'Name');
$form->email = new FormField('text', 'email', 'Email Address');
$form->comments = new FormField('textarea', 'comments', 'Comments');

$form->colour = new FormField(

    'select',                         // field type
    'colour',                         // field name
    'Choose a colour',                 // field label
    array(                            // field attributes
        'multiple' => 'multiple'    
    ),
    array(                            // field options
        'Red'         => 'red',
        'Green'        => 'green',        
        'Blue'        => 'blue',
        'Yellow'    => 'yellow'
    ),
    array(                            // pre-selected field options
        'Blue',
        'Green'
    )

);

$form->submit = new FormField(
    
    'submit',                         // field type
    'submit',                        // field name
    false,                            // field label
    array(                            // field attributes
        'value' => 'Send'
    )

);


// Build form (method 2)
$form->addFields(

    array(
        'name'         => array('text', 'name', 'Name'),
        'email'     => array('text', 'email', 'Email Address'),
        'comments'     => array('textarea', 'comments', 'Comments'),
        'colour'    => array(
            'select',                         // field type
            'colour',                         // field name
            'Choose a colour',                 // field label
            array(                            // field attributes
                'multiple' => 'multiple'    
            ),
            array(                            // field options
                'Red'         => 'red',
                'Green'        => 'green',        
                'Blue'        => 'blue',
                'Yellow'    => 'yellow'
            ),
            array(                            // pre-selected field options
                'Blue',
                'Green'
            )    
        ),
        'submit' => array('submit', 'submit', false, array('value' => 'Send'))
    )
    
);


// Build form (method 3)
$form->name = new FormField('text', 'name', 'Name');
$form->email = new FormField('text', 'email', 'Email Address');
$form->email->addValidation('required');
$form->email->addValidation('email');
$form->comments = new FormField('textarea', 'comments', 'Comments');
$form->comments->addValidation('required');

$form->colour = new FormField('select', 'colour', 'Choose a colour', array('multiple' => 'multiple'));
$form->colour->setOption('Red', 'red');
$form->colour->setOption('Green', 'green');
$form->colour->setOption('Blue', 'blue');
$form->colour->setOption('Yellow', 'yellow');
$form->colour->setSelected('Blue');
$form->colour->setSelected('Green');

$form->submit = new FormField('submit', 'submit');
$form->submit->setValue('Send');


/***************** STEP 3 *****************/

// validate the form on submission
if ($form->isSubmitted())
    $form->validate();

// Render form (method 1)
echo $form->renderFormStartTag();
echo $form->name->render();
echo '<br />'."\n";
echo $form->email->render();
echo '<br />'."\n";
echo $form->comments->renderLabel().'<br />'."\n"; // example of rendering the label
echo $form->comments->renderField(); // and form field separately
echo '<br />'."\n";
echo $form->colour->render();
echo '<br />'."\n";
echo $form->submit->render();
echo '<br />'."\n";
echo $form->renderFormStartTag();


// Render form (method 2)
echo $form->render();


// Once submitted
echo $form->renderMessages();