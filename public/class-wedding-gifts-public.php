<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://tspycher.com
 * @since      1.0.0
 *
 * @package    Wedding_Gifts
 * @subpackage Wedding_Gifts/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wedding_Gifts
 * @subpackage Wedding_Gifts/public
 * @author     Thomas Spycher <me@tspycher.com>
 */
class Wedding_Gifts_Public {

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
		 * defined in Wedding_Gifts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wedding_Gifts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wedding-gifts-public.css', array(), $this->version, 'all' );

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
		 * defined in Wedding_Gifts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wedding_Gifts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wedding-gifts-public.js', array( 'jquery' ), $this->version, false );

	}

	public function post() {
		if(array_key_exists('wedding_gift_action', $_POST)) {
			call_user_func(array(&$this, $_POST['wedding_gift_action']), $_POST);
		}

	}

	public function donate($data) {
		global $gift_notifications;
		$gift = Wedding_Gifts_Entity::find($data['gift_id']);

		$donation = new Wedding_Gifts_Donation_Entity();
		$donation
			->setAmount($data['_amount'])
			->setComment($data['_comment'])
			->setGiftId($gift->getId())
			->setEmail(array_key_exists('_email', $data) ? $data['_email'] : null)
			->setWho($data['_name']);
		$donation->store();

		$renderer = new Wedding_Gifts_Renderer();

		self::sendMail(
			sprintf("%s <%s>", $donation->getWho(), $donation->getEmail()),
			get_option('gift_email_subject'),
			$renderer->template('email', array('donation'=>$donation, 'account'=>get_option('gift_bank_account'))));

		$gift_notifications[] = "thank_you";
	}

	static public function sendMail($to, $subject, $body, $headers=array()) {
		if(!$subject) $subject = 'Dein Geschenk';

		if(get_option('gift_email_bcc')) {
			$bcc     = array_map( function ( $x ) {
				return sprintf( "BCC: %s", $x );
			},
				explode( ',', get_option( 'gift_email_bcc' ) ) );
			$headers = array_merge( $headers, $bcc );
		}

		return wp_mail($to, $subject, $body,$headers);
	}

}
