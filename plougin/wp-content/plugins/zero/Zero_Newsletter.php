<?php
include_once __DIR__.'/Zero_Newsletter_Widget.php';

class Zero_Newsletter {
    public function __construct () {
        add_action('widgets_init', function() { register_widget('Zero_Newsletter_Widget'); });
        add_action('wp_loaded', array($this, 'save_email'));
        add_action('admin_menu', [$this, 'add_admin_menu'], 20);
    }

    public function save_email() {
        if(!empty($_POST['zero_newsletter_email'])) {
            global $wpdb;
            $email = $_POST['zero_newsletter_email'];

            $row = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}zero_newsletter_email WHERE email = '$email'");
            if (is_null($row)) {
                $wpdb->insert("{$wpdb->prefix}zero_newsletter_email", array('email' => $email));
            }
        }
    }

    public function add_admin_menu () {
        add_submenu_page('zero', 'Newsletter', 'Newsletter', 'manage_options', 'zero_newsletter', [$this, 'menu_html']);
    }

    public function menu_html () {
        echo "<h1>".get_admin_page_title()."</h1>";
        echo "<p>Bienvenue sur la page d'accueil du plugin</p>";
    }

    public static function install () {
        global $wpdb;

        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}zero_newsletter_email (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL);");
    }

    public static function uninstall () {
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}zero_newsletter_email");
    }
}
