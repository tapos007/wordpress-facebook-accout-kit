<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       tutexp.com
 * @since      1.0.0
 *
 * @package    Tapospassword_less
 * @subpackage Tapospassword_less/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tapospassword_less
 * @subpackage Tapospassword_less/public
 * @author     tapos <tapos.aa@gmail.com>
 */
class Tapospassword_less_Public {

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
		$this->version = $version;

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
		 * defined in Tapospassword_less_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tapospassword_less_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tapospassword_less-public.css', array(), $this->version, 'all' );

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
		 * defined in Tapospassword_less_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tapospassword_less_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        wp_register_script( 'tutexp_fb_account_kit', plugin_dir_url( __FILE__ ) . 'js/tapospassword_less-public.js' );
        wp_localize_script( 'tutexp_fb_account_kit', 'tutexp_ajax', array( 'ajax_url' => admin_url('admin-ajax.php')) );
        wp_enqueue_script( $this->plugin_name, 'https://sdk.accountkit.com/en_US/sdk.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'tutexp_fb_account_kit',null , array( 'jquery' ), $this->version, true );

	}

}
