<?php

/*
*  Upgrader Class
*
*  @description: Upgrade rutines and upgrade messages
*  @since 1.0.0
*  @version 1.0
*/

class Linel_Upgrader {

	public function upgrade_plugin() {
		global $wpdb;
		$current_version = get_option('linel_version');

		if( !get_option('linel_plugin_updated') ) {
			// show feedback box if updating plugin
			if ( ! empty( $current_version ) && version_compare( $current_version, LINEL_VERSION, '<' ) ) {
				update_option( 'linel_plugin_updated', true );
			}
		}
		// to prevent unauthorized access , delete all line_user_ids
		if ( ! empty( $current_version ) && version_compare( $current_version, '1.0.7.2', '<' ) &&  version_compare( $current_version, '1.0.5', '>' ) ) {
			$wpdb->query( "DELETE FROM $wpdb->usermeta WHERE meta_key = '_line_user_id'");
		}
	}
}