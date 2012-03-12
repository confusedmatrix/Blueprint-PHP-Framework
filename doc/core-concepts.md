#Core concepts

1. All requests are routed through /public/index.php
2. This loads /app/bootstrap.php
3. This initialises the autoloader and a blank container to hold core dependencies
4. Store all the core dependencies in App class
5. Pass all this to Router
6. Register route maps with the router
7. Router determines what controller to invoke in /app/{namespace}/controller
8. Controller pulls out the dependencies it requires in setContainer()
9. Model is created (if required) to do the business logic
10. View is created in __construct() to pass output through
11. View loads template that is requested in /out/
12. /out/functions.php is loaded where you can create closures to manage the data needed in the template
13. Template files are very basic and should only contain the most rudimentary PHP

---------------------------------------------------------------------

Class name and class filenames must be camel case to avoid problems. 
    
e.g localhost/css-test maps to /app/{namespace}/Controller/CssTest.php and calls CssTest();
    
Controllers, models, views and forms must all extend the abstract version of class from Blueprint.

e.g. CssTest should extend Controller.
    
Follow the MVC concept as much as possible, even if it seems like a 
chore at the time, it will be so much easier in the long run.
    
* Controllers sole responsibility is to tie the request to a model and a view, so keep them light.
* Models should do all the grunt work. Create logical methods and don't let them get too big.
* Views should pass all the data etc to the template to be output to the browser.
* Templates should only contain the most rudimentary of PHP and a web designer with very little PHP experience should be able to work with them with only the knowledge of what variables they need for the data they want to display.
* This separation of concerns makes it much easier for designers and developers to work together as well as making it easier to debug problems and keep the application flexible to modify.
* For the love of god don't do business code in the template files!
    
