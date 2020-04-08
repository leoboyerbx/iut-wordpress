<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       contact@leoboyer.fr
 * @since      1.0.0
 *
 * @package    Multimedialpes
 * @subpackage Multimedialpes/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Multimedialpes
 * @subpackage Multimedialpes/public
 * @author     Léo Boyer <contact@leoboyer.fr>
 */
class Multimedialpes_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;

	}

    public function candidates_html ($atts, $content) {
	    include_once __DIR__.'/partials/multimedialpes-public-display.php';

      return multimedialpes_public_display($atts, $content);
    }

    public function candidate_single_html ( $content ) {
	    if (get_post_type() === "candidat") {
            include_once __DIR__.'/partials/multimedialpes-public-display_single.php';
            return multimedialpes_public_display_single( $content );
        }
	    return $content;
    }

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/multimedialpes-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( 'isotope', plugin_dir_url( __FILE__ ) . 'js/isotope.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/multimedialpes-public.js', array( 'jquery', 'isotope' ), $this->version, false );
		

	}

}
