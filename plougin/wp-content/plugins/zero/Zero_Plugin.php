<?php
class Zero_Plugin {
    public function __construct() {
        include_once __DIR__.'/Zero_Page_Title.php';
        include_once __DIR__.'/Zero_Newsletter.php';

        add_action('admin_menu', [$this, 'add_admin_menu'], 10);

        new Zero_Page_Title();
        new Zero_Newsletter();
    }

    public function add_admin_menu () {
        add_menu_page('Notre Newsletter', 'Zero plugin', 'manage_options', 'zero', [$this, 'menu_html'], 'dashicons-email');
        add_submenu_page('zero', 'Apercu', 'Aperçu', 'manage_options', 'zero', array($this, 'menu_html'));
    }

    public function menu_html () {
        echo "<h1>".get_admin_page_title()."</h1>";
        echo "<p>Bienvenue sur la page d'accueil du plugin</p>";
    }
}
