<?php

/**
 * Class that handle all admin notices
 *
 * @since      1.0.0
 * @package    Line_Login
 * @subpackage Line_Login/includes
 * @author     Sakol Assawasagool <koobitor@gmail.com>
 */
class Linel_Notices {


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct( ) {

		if( isset( $_GET['linel_notice'])){
			update_option('linel_'.esc_attr($_GET['linel_notice']), true);
		}
	}


	public function rate_plugin(){
		if( get_option('linel_plugin_updated') && !get_option('linel_rate_plugin') ) {
			?>
			<div class="updated notice">
			<h3><i class=" dashicons-before dashicons-shield-alt"></i>Line Login Plugin</h3>

			<p><?php echo sprintf( __( 'We noticed that you have been using our plugin for a while and we would like to ask you a little favour. If you are happy with it and can take a minute please <a href="%s" target="_blank">leave a nice review</a> on WordPress. It will be a tremendous help for us!', 'linel' ), 'https://wordpress.org/support/view/plugin-reviews/wp-line-login?filter=5' ); ?></p>
			<ul>
				<li><?php echo sprintf( __( '<a href="%s" target="_blank">Leave a nice review</a>' ), 'https://wordpress.org/support/view/plugin-reviews/wp-line-login?filter=5' ); ?></li>
				<li><?php echo sprintf( __( '<a href="%s">I already did</a>' ), '?linel_notice=rate_plugin' ); ?></li>
			</ul>
			</div><?php
		}
	}
}