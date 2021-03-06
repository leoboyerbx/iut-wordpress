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
      wp_enqueue_style('wp-color-picker');
      wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/multimedialpes-admin.js', array( 'wp-color-picker' ), $this->version, false );
    }
    
    public function create_candidat_cpt() {
      
      $labels = array(
          'name' => _x( 'Candidatures', 'Candidatures au concours', 'textdomain' ),
          'singular_name' => _x( 'Candidature', 'Candidature au concours', 'textdomain' ),
          'menu_name' => _x( 'Candidatures', 'Candidatures', 'textdomain' ),
          'name_admin_bar' => _x( 'Candidatures', 'Add New on Toolbar', 'textdomain' ),
          'archives' => __( 'Archives Candidatures', 'textdomain' ),
          'attributes' => __( 'Attributs Candidat', 'textdomain' ),
          'parent_item_colon' => __( 'Parents Candidat:', 'textdomain' ),
          'all_items' => __( 'Toutes Candidatures', 'textdomain' ),
          'add_new_item' => __( 'Ajouter nouvelle candidature', 'textdomain' ),
          'add_new' => __( 'Ajouter', 'textdomain' ),
          'new_item' => __( 'Nouvel Candidat', 'textdomain' ),
          'edit_item' => __( 'Modifier Candidature', 'textdomain' ),
          'update_item' => __( 'Mettre à jour Candidature', 'textdomain' ),
          'view_item' => __( 'Voir Candidature', 'textdomain' ),
          'view_items' => __( 'Voir Candidatures', 'textdomain' ),
          'search_items' => __( 'Rechercher dans les Candidatures', 'textdomain' ),
          'not_found' => __( 'Aucune Candidature trouvé.', 'textdomain' ),
          'not_found_in_trash' => __( 'Aucune Candidature trouvé dans la corbeille.', 'textdomain' ),
          'featured_image' => __( 'Image mise en avant', 'textdomain' ),
          'set_featured_image' => __( 'Définir l’image mise en avant', 'textdomain' ),
          'remove_featured_image' => __( 'Supprimer l’image mise en avant', 'textdomain' ),
          'use_featured_image' => __( 'Utiliser comme image mise en avant', 'textdomain' ),
          'insert_into_item' => __( 'Insérer dans Candidature', 'textdomain' ),
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
    
    public function create_candidat_metaboxes () {
      global $wpdb;
      $types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}multimedialpes_contest_types");
      
      
      $prefix = 'candidat_';
      
      /**
       * Metabox to add fields to categories and tags
       */
      $general_info = new_cmb2_box( array(
          'id'               => $prefix . 'edit',
          'title'            => esc_html__( 'Infos sur la candidature', 'cmb2' ), // Doesn't output for term boxes
          'object_types'     => array( 'candidat' ), // Tells CMB2 to use term_meta vs post_meta
          'show_in_rest' => WP_REST_Server::READABLE,
      ) );
      $general_info->add_field( array(
          'id'   => 'new_candidat_trigger',
          'type' => 'hidden',
      ) );
      
      $general_info->add_field( array(
          'name'           => 'Candidature au concours',
          'desc'           => 'Sélectionner le concours où vous voulez inscrire la création',
          'id'             => $prefix.'concours_select',
          'taxonomy'       => 'concours', //Enter Taxonomy Slug
          'type'           => 'taxonomy_select',
          'remove_default' => 'true', // Removes the default metabox provided by WP core.
        // Optionally override the args sent to the WordPress get_terms function.
//            'query_args' => array(
//                // 'orderby' => 'slug',
//                // 'hide_empty' => true,
//            ),
      ) );
      
      $types_select_options = [];
      foreach ($types as $type) {
        $types_select_options[$type->id] = $type->title;
      }
      $general_info->add_field( array(
          'name' => 'Type de création',
          'id'   => $prefix.'type',
          'type'             => 'select',
          'show_option_none' => false,
          'default'          => 'custom',
          'options'          => $types_select_options,
      ) );
      $general_info->add_field( array(
          'name'    => 'Contributeurs',
          'desc'    => 'Les noms de tous les contributeurs au projet)',
          'id'      => $prefix.'contributors',
          'type'    => 'text',
          'repeatable' => true,
          'text' => array(
              'add_row_text' => 'Ajouter un contributeur',
          ),
      ) );
      $general_info->add_field( array(
          'name' => 'Date de réalisation',
          'id'   => $prefix.'date',
          'type' => 'text_date',
//          'date_format' => 'l j F Y',
        // 'timezone_meta_key' => 'wiki_test_timezone',
      ) );
      $general_info->add_field( array(
          'name' => 'Image d\'illustration',
          'desc' => 'Une image pour illustrer le projet',
          'id'   => $prefix.'thumbnail',
          'type' => 'file',
        // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
          'query_args' => array( 'type' => 'image' ), // Only images attachment
        // Optional, override default text strings
      ) );
      $general_info->add_field( array(
          'name'    => 'Description du projet',
          'desc'    => 'Expliquez votre démarche, les choses à savoir pour le projet, etc...',
          'id'      => $prefix.'description',
          'type'    => 'wysiwyg',
          'options' => array(),
      ) );
      
      foreach ($types as $type) {
        $new_box = new_cmb2_box( array(
            'id'               => $prefix . 'details_' . $type->id,
            'title'            => esc_html__( 'Détails : ' . $type->title, 'cmb2' ),
            'object_types'     => array( 'candidat' ),
            'priority'  => 'low',
        ) );
        $localprefix = $prefix . "details_{$type->id}_";
        
        if ($type->media_type === 'video') {
          $new_box->add_field( array(
              'name'     => 'URL (YouTube, SoundCloud, ...)',
              'id'       => $localprefix . 'av_url',
              'type'     => 'oembed',
          ) );
          
          $new_box->add_field( array(
              'name'     => 'Catégorie',
              'id'       => $localprefix . 'av_categorie',
              'type'     => 'select',
              'options' => array(
                  'Reportage' => __('Reportage', 'cmb2'),
                  'Fiction' => __('Fiction', 'cmb2'),
                  'Motion Design' => __('Motion Design', 'cmb2'),
                  'Autre' => __('Autre', 'cmb2'),
              ),
          ) );
        } else if ($type->media_type === 'web') {
          
          $new_box->add_field( array(
              'name'			   => 'URL du site',
              'id'               => $localprefix . 'web_url',
              'type'  		   => 'text_url',
          ) );
          
          $new_box->add_field( array(
              'name'			   => 'Type de site',
              'id'               => $localprefix . 'web_type',
              'type'  		   => 'select',
              'options' => array(
                  'portfolio' => __('Portfolio', 'cmb2'),
                  'vitrine' => __('Vitrine', 'cmb2'),
                  'e-commerce' => __('E-commerce', 'cmb2'),
                  'other' => __('Autre', 'cmb2'),
              ),
          ) );
          
          $new_box->add_field( array(
              'id'               => $localprefix . 'web_dynamique',
              'type'  		   => 'radio_inline',
              'name'             => 'Le site est...',
              'options'          => array(
                  'statique' => __( 'Statique', 'cmb2' ),
                  'dynamique' => __( 'Dynamique', 'cmb2' ),
              ),
          ) );
          
        } else if ($type->media_type === 'graphics') {
          $new_box->add_field( array(
              'name' => 'Image(s)',
              'desc' => 'La ou les images composant votre projet',
              'id'   => $localprefix.'graphisme_images',
              'type' => 'file_list',
            // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
              'query_args' => array( 'type' => 'image' ), // Only images attachment
            // Optional, override default text strings
              'text' => array(
                  'add_upload_files_text' => 'Ajouter ou Uploader des images', // default: "Add or Upload Files"
                  'remove_image_text' => 'Enelever l\'image', // default: "Remove Image"
                  'file_text' => 'Fichier:', // default: "File:"
                  'file_download_text' => 'Télécharger', // default: "Download"
                  'remove_text' => 'Enlever', // default: "Remove"
              ),
          ) );
          $new_box->add_field( array(
              'name' => 'Type de création',
              'id'   => $localprefix.'graphisme_type',
              'type'             => 'select',
              'show_option_none' => false,
              'default'          => 'custom',
              'options'          => array(
                  'infographie'   =>   __( 'Infographie', 'cmb2' ),
                  'dessin'     =>    __( 'Dessin', 'cmb2' ),
                  'other' => __( 'Autre', 'cmb2' ),
              ),
          ) );
          
        }
      }
      
    }
    
    
    public function create_coucours_metaboxes () {
      $prefix = 'concours_';
      
      /**
       * Metabox to add fields to categories and tags
       */
      $cmb_term = new_cmb2_box( array(
          'id'               => $prefix . 'edit',
          'title'            => esc_html__( 'Infos du concours', 'cmb2' ), // Doesn't output for term boxes
          'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
          'taxonomies'       => array( 'concours' ), // Tells CMB2 which taxonomies should have these fields
          'new_term_section' => true, // Will display in the "Add New Category" section
      ) );
      
      $cmb_term->add_field( array(
          'name' => 'Start Date',
          'id'   => $prefix.'start_date',
          'type' => 'text_datetime_timestamp',
          'column' => array(
              'position' => 2
          ),
        // 'timezone_meta_key' => 'wiki_test_timezone',
        // 'date_format' => 'l jS \of F Y',
      ) );
      
      $cmb_term->add_field( array(
          'name' => 'End Date',
          'id'   => $prefix.'end_date',
          'type' => 'text_datetime_timestamp',
          'column' => array(
              'position' => 3
          ),
        // 'timezone_meta_key' => 'wiki_test_timezone',
        // 'date_format' => 'l jS \of F Y',
      ) );
      
      $cmb_term->add_field( array(
          'name' => 'Type of contest',
          'id'   => $prefix.'type',
          'type'             => 'select',
          'show_option_none' => false,
          'column' => array(
              'position' => 4,
          ),
          'default'          => 'custom',
          'options'          => array(
              'various' => __( 'Various', 'cmb2' ),
              'audiovisuel'   => __( 'Audiovisuel', 'cmb2' ),
              'web'     => __( 'Web', 'cmb2' ),
              'graphisme'     => __( 'Graphisme', 'cmb2' ),
          ),
      ) );
    }
    
    function add_admin_menu() {
      add_menu_page('Multimédialpes', 'Multimédialpes', 'manage_options', 'multimedialpes', '', '
dashicons-chart-area');
      
      add_submenu_page('multimedialpes', 'Le plugin de Multimédialpes !', 'Réglages', 'manage_options', 'multimedialpes', [$this, 'admin_settings_page']);
      
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
    
    public function register_concours_columns ($columns) {
      $new_columns_before = array(
          'id' => esc_html__( 'Id', 'text_domain' ),
      );
      $new_columns_after= array(
          'shortcode' => esc_html__( 'Shortcode', 'text_domain' ),
      );
      return array_merge($new_columns_before, $columns, $new_columns_after);
    }
    
    public function register_concours_columns_display ( $column, $col_name,  $item_id) {
      if ($col_name === "id") {
        return $item_id;
      }
      if ($col_name === "shortcode") {
        return "[multimedialpes id=$item_id]";
      }
      return $column;
    }
    
    public function admin_settings_page () {
      global $wpdb;
      if ($_POST['action'] === 'add' && !empty($_POST['title']) && !empty($_POST['media_type']) && !empty($_POST['color'])) {
        $wpdb->insert($wpdb->prefix . 'multimedialpes_contest_types', array(
            'title' => $_POST['title'],
            'media_type' => $_POST['media_type'],
            'color' => $_POST['color']
        ));
      } else if ($_POST['action'] === "delete" && !empty($_POST['id'])) {
        $wpdb->delete($wpdb->prefix . 'multimedialpes_contest_types', ['id' => $_POST['id']]);
      } else if ($_POST['action'] === "edit" && !empty($_POST['id']) && !empty($_POST['media_type']) && !empty($_POST['color'])) {
        $wpdb->update($wpdb->prefix . 'multimedialpes_contest_types', [
            'media_type' => $_POST['media_type'],
            'color' => $_POST['color']
        ],['id' => $_POST['id']]);
      }
      $types = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}multimedialpes_contest_types");
      include_once __DIR__.'/partials/multimedialpes-admin-display.php';
    }
    
    
  }
