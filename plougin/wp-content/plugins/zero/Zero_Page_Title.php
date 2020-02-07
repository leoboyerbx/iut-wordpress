<?php

class Zero_Page_Title {
    public function __construct() {
        add_filter('document_title_parts', [$this, 'filter_title']);
    }

    public function filter_title($title) {
        return array_merge($title, ['Zero Plugin Activé']);
    }
}
