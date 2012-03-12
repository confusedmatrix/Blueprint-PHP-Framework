#Templating
By default the view will load the functions.php file.

This file is intended to pull classes from the view's container and create closures that can be used in the templates:

    $p = $this->container->get('page');
    $page = function($key, $default='', $echo=true) use($p) {
        
        $val = !empty($p->$key) ? $p->$key : $default;
        if ($echo === true)
            echo $val;
        else
            return $val;
    
    };

These closures are now accessible in the templates like so: 

    $page('title');

If you do not define closures to pull variables into the page you can still use the view to get this data like so:

    $this->pageInfo('title');

We use closures as they are more convenient but also because it reduces the code needed to output variables in the templates.

