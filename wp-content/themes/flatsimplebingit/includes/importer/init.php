<?php
/**
 * Version 0.0.2
 *
 * This file is just the example, do to require it directly. Instead copy it to your theme and modify by your own needs.
 */

require_once( dirname( __FILE__ ) . '/importer/radium-importer.php' ); //load admin theme data importer

class Radium_Theme_Demo_Data_Importer extends Radium_Theme_Importer {

	/**
	 * Holds a copy of the object for easy reference.
	 *
	 * @since 0.0.1
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Set the key to be used to store theme options
	 *
	 * @since 0.0.2
	 *
	 * @var object
	 */
	public $content_demo_file_name  = 'content.xml';
	
	public $content_demo_file_name_woocommerce  = 'content-woo.xml';

	/**
	 * Constructor. Hooks all interactions to initialize the class.
	 *
	 * @since 0.0.1
	 */
	public function __construct() {

		$this->demo_files_path = dirname(__FILE__) . '/demo-files/';

		self::$instance = $this;
		parent::__construct();

	}

	/**
	 * Add menus
	 *
	 * @since 0.0.1
	 */
	public function set_demo_menus(){

		// Menus to Import and assign - you can remove or add as many as you want
		$top_menu    = get_term_by('name', 'Top menu', 'nav_menu');

		set_theme_mod( 'nav_menu_locations', array(
				'ktzmenu_1' => $top_menu->term_id
			)
		);
	}
}

new Radium_Theme_Demo_Data_Importer;