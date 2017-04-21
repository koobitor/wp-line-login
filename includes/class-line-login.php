<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/koobitor/wp-line-login
 * @since      1.0.0
 *
 * @package    Line_Login
 * @subpackage Line_Login/includess
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Line_Login
 * @subpackage Line_Login/includes
 * @author     Sakol Assawasagool <koobitor@gmail.com>
 */

 class Line_Login {
	/**
	 * Public class where all hooks are added
	 * @var Line_Login_Public   $linel
	 */
	public $linel;

  /**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Line_Login_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

  /**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * @var array of plugin settings
	 */
	protected $opts;

	/**
	 * Plugin Instance
	 * @since 1.0.0
	 * @var The Fbl plugin instance
	 */
	protected static $_instance = null;

	/**
	 * The plugin text domain for translations
	 *
	 * @since    1.1.3
	 * @access   protected
	 * @var      string    $text_domain    The string used to uniquely identify this plugin.
	 */
	protected $text_domain;

	private $shortcodes;

  /**
	 * Main Linel Instance
	 *
	 * Ensures only one instance of WSI is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see WSI()
	 * @return Linel - Main instance
	 */
  public static function instance() {
    if ( is_null( self::$_instance ) ) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  /**
	 * Cloning is forbidden.
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'wsi' ), '2.1' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'wsi' ), '2.1' );
	}

  /**
	 * Auto-load in-accessible properties on demand.
	 * @param mixed $key
	 * @since 1.0.0
	 * @return mixed
	 */
	public function __get( $key ) {
		if ( in_array( $key, array( 'payment_gateways', 'shipping', 'mailer', 'checkout' ) ) ) {
			return $this->$key();
		}
	}

  /**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name  = 'line-login';
		$this->text_domain  = 'linel';
		$this->version      = LINEL_VERSION;
		$this->opts         = get_option('linel_settings');

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

  /**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Line_Login_Loader. Orchestrates the hooks of the plugin.
	 * - Line_Login_i18n. Defines internationalization functionality.
	 * - Line_Login_Admin. Defines all hooks for the admin area.
	 * - Line_Login_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-line-login-loader.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-line-login-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-line-login-shortcodes.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-line-login-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-line-login-settings.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-line-login-public.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-linel-notices.php';

		$this->loader = new Line_Login_Loader();
		$this->shortcodes = new Line_Login_Shortcodes( $this->get_plugin_name(), $this->get_version() );

  }

 }