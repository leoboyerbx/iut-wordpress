<?php
/*
Plugin Name: Zero plugin
Plugin URI: http://leoboyer.fr/web/qwwizzy
Description: Un plugin d'introduction pour le développement sous WordPress
Version: 0.1
Author: Léo Boyer
Author URI: http://leoboyer.fr
License: GPL2
*/

class Zero_Plugin {
    public function __construct() {
        include_once plugin_dir_path(  __FILE__ ).'/Zero_Page_Title.php';
        include_once plugin_dir_path(  __FILE__ ).'/Zero_Newsletter.php';


//        new Zero_Page_Title();
        new Zero_Newsletter();
    }
}


new Zero_Plugin();
