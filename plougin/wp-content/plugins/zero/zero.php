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

include_once __DIR__.'/Zero_Plugin.php';

register_activation_hook(__FILE__, ['Zero_Newsletter', 'install']);
register_uninstall_hook(__FILE__, ['Zero_Newsletter', 'uninstall']);

new Zero_Plugin();
