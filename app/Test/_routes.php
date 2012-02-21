<?php

$routes = array(

	array(
		'test\/(.*)-abc-(.*)', 	// regex pattern
		'Test',					// controller
		'test'					// action
	)
	
);

return $routes;