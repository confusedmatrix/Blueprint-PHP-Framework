<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title><?php $page('title'); ?></title>
    <meta name="description" content="<?php $page('meta_description'); ?>" />
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <?php $this->displayCss(); ?>
    
    <link rel="icon" type="image/png" href="_images/graphics/favicon.png" />
</head>

<body id="<?php $page('body_id', 'default'); ?>">

    <div class="container">
        <div id="header">
            <h1><?php $page('h1'); ?></h1>
        </div>
        
        <br />