<?php

$c = $this->container->get('config');
$p = $this->container->get('page');

/*  
	Closure to pull config variables
	e.g $site('baseurl'); to echo the sites base URL 
*/
$site = function($key, $default='', $echo=true) use($c) {
	
	$val = !empty($c->$key) ? $c->$key : $default;
	if ($echo === true)
		echo $val;
	else
		return $val;

};

/*  
	Closure to pull page variables
	e.g $page('h1'); to echo the page's H1
*/
$page = function($key, $default='', $echo=true) use($p) {
	
	$val = !empty($p->$key) ? $p->$key : $default;
	if ($echo === true)
		echo $val;
	else
		return $val;

};