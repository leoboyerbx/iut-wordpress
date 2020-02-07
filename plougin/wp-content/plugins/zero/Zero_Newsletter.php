<?php
include_once __DIR__.'/Zero_Newsletter_Widget.php';

class Zero_Newsletter {
    public function __construct() {
        add_action('widgets_init', function() { register_widget('Zero_Newsletter_Widget'); });
    }
}
