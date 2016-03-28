<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://tspycher.com
 * @since      1.0.0
 *
 * @package    Wedding_Gifts
 * @subpackage Wedding_Gifts/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wedding_Gifts
 * @subpackage Wedding_Gifts/admin
 * @author     Thomas Spycher <me@tspycher.com>
 */
class Wedding_Gifts_Admin {

	const SETTINGS_GROUP = 'gifts-settings-group';

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

	public function menu() {
		add_management_page("Wedding Gifts","Wedding Gifts", "manage_options", "wedding_gifts", array(&$this, 'menu_display'));
	}

	public function menu_display() {
		$r = new Wedding_Gifts_Renderer();

		$donations = Wedding_Gifts_Donation_Entity::findAll();
		$gifts = Wedding_Gifts_Entity::findAll();

		print $r->template('options', $donations, 'admin');
		print $r->template('list_donations', $donations, 'admin');
		print $r->template('list_gifts', $gifts, 'admin');

	}

	public function register_settings() {
		//register our settings
		register_setting( static::SETTINGS_GROUP, 'gift_email_subject' );
		register_setting( static::SETTINGS_GROUP, 'gift_email_bcc' );
		register_setting( static::SETTINGS_GROUP, 'gift_bank_account' );

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
		 * defined in Wedding_Gifts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wedding_Gifts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wedding-gifts-admin.css', array(), $this->version, 'all' );

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
		 * defined in Wedding_Gifts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wedding_Gifts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wedding-gifts-admin.js', array( 'jquery' ), $this->version, false );

	}

}
