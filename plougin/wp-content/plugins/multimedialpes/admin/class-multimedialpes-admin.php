<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       contact@leoboyer.fr
 * @since      1.0.0
 *
 * @package    Multimedialpes
 * @subpackage Multimedialpes/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Multimedialpes
 * @subpackage Multimedialpes/admin
 * @author     Léo Boyer <contact@leoboyer.fr>
 */
class Multimedialpes_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Multimedialpes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Multimedialpes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/multimedialpes-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Multimedialpes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Multimedialpes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/multimedialpes-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function create_candidat_cpt() {

        $labels = array(
            'name' => _x( 'Candidats', 'Post Type General Name', 'textdomain' ),
            'singular_name' => _x( 'Candidat', 'Post Type Singular Name', 'textdomain' ),
            'menu_name' => _x( 'Candidats', 'Admin Menu text', 'textdomain' ),
            'name_admin_bar' => _x( 'Candidat', 'Add New on Toolbar', 'textdomain' ),
            'archives' => __( 'Archives Candidat', 'textdomain' ),
            'attributes' => __( 'Attributs Candidat', 'textdomain' ),
            'parent_item_colon' => __( 'Parents Candidat:', 'textdomain' ),
            'all_items' => __( 'Tous Candidats', 'textdomain' ),
            'add_new_item' => __( 'Ajouter nouvel Candidat', 'textdomain' ),
            'add_new' => __( 'Ajouter', 'textdomain' ),
            'new_item' => __( 'Nouvel Candidat', 'textdomain' ),
            'edit_item' => __( 'Modifier Candidat', 'textdomain' ),
            'update_item' => __( 'Mettre à jour Candidat', 'textdomain' ),
            'view_item' => __( 'Voir Candidat', 'textdomain' ),
            'view_items' => __( 'Voir Candidats', 'textdomain' ),
            'search_items' => __( 'Rechercher dans les Candidat', 'textdomain' ),
            'not_found' => __( 'Aucun Candidattrouvé.', 'textdomain' ),
            'not_found_in_trash' => __( 'Aucun Candidattrouvé dans la corbeille.', 'textdomain' ),
            'featured_image' => __( 'Image mise en avant', 'textdomain' ),
            'set_featured_image' => __( 'Définir l’image mise en avant', 'textdomain' ),
            'remove_featured_image' => __( 'Supprimer l’image mise en avant', 'textdomain' ),
            'use_featured_image' => __( 'Utiliser comme image mise en avant', 'textdomain' ),
            'insert_into_item' => __( 'Insérer dans Candidat', 'textdomain' ),
            'uploaded_to_this_item' => __( 'Téléversé sur cet Candidat', 'textdomain' ),
            'items_list' => __( 'Liste Candidats', 'textdomain' ),
            'items_list_navigation' => __( 'Navigation de la liste Candidats', 'textdomain' ),
            'filter_items_list' => __( 'Filtrer la liste Candidats', 'textdomain' ),
        );
        $args = array(
            'label' => __( 'Candidat', 'textdomain' ),
            'description' => __( 'Candidat au ', 'textdomain' ),
            'labels' => $labels,
            'menu_icon' => '',
            'supports' => array('title', 'author'),
            'taxonomies' => array(),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => false,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'exclude_from_search' => false,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        );
        register_post_type( 'candidat', $args );

    }

    public function  create_concours_tax() {

        $labels = array(
            'name'              => _x( 'Concours', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Concours', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Search Concours', 'textdomain' ),
            'all_items'         => __( 'All Concours', 'textdomain' ),
            'parent_item'       => __( 'Parent Concours', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Concours:', 'textdomain' ),
            'edit_item'         => __( 'Edit Concours', 'textdomain' ),
            'update_item'       => __( 'Update Concours', 'textdomain' ),
            'add_new_item'      => __( 'Add New Concours', 'textdomain' ),
            'new_item_name'     => __( 'New Concours Name', 'textdomain' ),
            'menu_name'         => __( 'Concours', 'textdomain' ),
        );
        $args = array(
            'labels' => $labels,
            'description' => __( 'Councours de multimédialps', 'textdomain' ),
            'hierarchical' => false,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => false,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'show_in_quick_edit' => true,
            'show_admin_column' => false,
            'show_in_rest' => true,
        );
        register_taxonomy( 'concours', array('candidat'), $args );

    }

    function add_admin_menu() {
	    add_menu_page('Multimédialpes', 'Multimédialpes', 'manage_options', 'multimedialpes', '', '
dashicons-chart-area');

	    add_submenu_page('multimedialpes', 'Le plugin de Multimédialpes !', 'Aperçu', 'manage_options', 'multimedialpes', [$this, 'render_html']);

        add_submenu_page('multimedialpes', 'Concours', 'Concours', 'manage_options', 'edit-tags.php?taxonomy=concours&post_type=candidat', '');

        add_submenu_page('multimedialpes', 'Candidats', 'Candidats', 'manage_options', 'edit.php?post_type=candidat', '');
    }

    public function apply_menu_filters($parent_file) {
        global $current_screen,$submenu_file;

        $base = $current_screen->base;

        $action = $current_screen->action;

        $post_type = $current_screen->post_type;

        $taxonomy = $current_screen->taxonomy;

        if ($taxonomy == 'concours'){

            $parent_file = 'multimedialpes';

            $submenu_file = 'edit-tags.php?taxonomy='.'concours'.'&post_type='.'candidat';

        }

        elseif ($post_type == 'candidat') {

            $parent_file = 'multimedialpes';

            $submenu_file = 'edit.php?post_type='.'candidat';

        }


        return $parent_file;
    }

    public function render_html () {
	    include_once __DIR__.'/partials/multimedialpes-admin-display.php';
    }

}
