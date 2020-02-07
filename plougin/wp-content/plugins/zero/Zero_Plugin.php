<?php
class Zero_Plugin {
    public function __construct() {
        include_once __DIR__.'/Zero_Page_Title.php';
        include_once __DIR__.'/Zero_Newsletter.php';


        new Zero_Page_Title();
        new Zero_Newsletter();
    }
}
