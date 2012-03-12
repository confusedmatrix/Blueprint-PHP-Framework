#Caching
There are 2 types of caching that come with the blueprint framework.

##Page caching
This allows you to cache the entire output of the page (usually run from the controller) like so:
        
    $page_caching->startCachingFile();
        
Once all the actions are complete, call:
    
    $page_caching->stopCachingFile();
        
Next time the page is called, the startCachingFile() method will check to see if a cache file has already been created and serve that instead.

#Fragment caching
This allows you to cache the output from a method like so:
        
    //do some hardcore processing here
    
    $cache->set('class.method', $value);
        
This will store the value in /tmp/fragment-cache, Next time the method is run you can check to see if the cache is already primed to save having to do the processing again:
    
    if ($value = $cache->get('class.method'))
        return $value;
            
When a piece of data changes you will need to remove the old cache like so:
    
    $cache->clear('class.method');
            
All the options for turning the caches on or off and setting their expiry times, are located in /etc/config.php under defaults

