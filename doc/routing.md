#Routing
There are 2 ways to route URLs to controllers in the blueprint framework.

##Default Routing
This form of routing is the most basic and tested before any regex routes. To register a namespace in /app/ to use with the application simply do:
    
    $router->registerRouteMap('{namespace}');
    
Any controllers in that namespace can now be accessed when a URL matches like so:

    localhost/test/test/3 will load: /app/{namespace}/controller/Test.php
        
and call: 
    
    {namespace}\Controller\Test->testAction(3);
    
The controller, action and parameters are determined from the URL once it is exploded by directory separator.

##Regex routing
The other form of routing is by matching URLs to predefined patterns and determining the controller, action and parameters that way.
    
To register a route map that uses regex routes do:
    
    $router->registerRouteMap('{namespace}', 'path/to/routes/file');
        
By convention it is a good idea to keep your routes file in:
    
    /app/{namespace}/_routes.php
        
Your file should look like so:
    
    <?php

    $routes = array(
        
        array(
            'test\/(.*)-abc-(.*)',     // regex pattern
            'Test',                    // controller
            'test'                    // action
        ),
            
        array(
            'test\/(.*)-xyz-(.*)',     // regex pattern
            'Test',                    // controller
            'test'                    // action
        )
            
    );
        
    return $routes;
        
The regex capture groups (.*) pass the capture as parameters in the controller's action in the same order they were found.
    
So if the URL was:
    
    localhost/test/8-xyz-4
        
it would match the second regex pattern above:
        
    test\/(.*)-xyz-(.*)
        
This will load: 

    /app/{namespace}/controller/Test.php
        
and call: 
    
    {namespace}\Controller\Test->testAction(8, 4);
        
Routing will always check the namespaces for routes in the order they were loaded, so be aware when you are registering route maps that contain the same controller and action names that only the first one encountered will be invoked.

