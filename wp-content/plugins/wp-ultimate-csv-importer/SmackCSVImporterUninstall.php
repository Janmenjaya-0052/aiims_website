<?php
/**
 * WP Ultimate CSV Importer plugin file.
 *
 * Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 */

namespace Smackcoders\FCSV;

if ( ! defined( 'ABSPATH' ) )
exit; // Exit if accessed directly

/**
 * Class SmackUCIUnInstall
 * @package Smackcoders\FCSV
 */

class SmackUCIUnInstall {
	/**
	 * UnInstall UCI Pro.
	 */
	protected static $instance = null,$plugin;
	public function __construct() {
		$plugin = Plugin::getInstance();
	}

	public static function getInstance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public static function unInstall() {

		global $wpdb;

		$wpdb->hide_errors();

		include_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		$ucisettings = get_option('sm_uci_pro_settings');
		$prefix = $wpdb->prefix;
		$droptable = isset($ucisettings['drop_table']) ? $ucisettings['drop_table'] : '';
		if(!empty($droptable) && $droptable == 'true'){
			$tables[] = "drop table {$prefix}ultimate_csv_importer_mappingtemplate";
			$tables[] = "drop table {$prefix}import_detail_log";
			$tables[] = "drop table {$prefix}import_log_detail";
			$tables[] = "drop table {$prefix}smackcsv_file_events";
			$tables[] = "drop table {$prefix}ultimate_csv_importer_media";
			$tables[] = "drop table {$prefix}ultimate_csv_importer_shortcode_manager";
			$tables[] = "drop table {$prefix}import_postID";
			$tables[] = "drop table {$prefix}smackuci_events";
			$tables[] = "drop table {$prefix}ultimate_post_entries";
			$tables[] = "drop table {$prefix}ultimate_csv_importer_acf_fields";
			$tables[] = "drop table {$prefix}cli_csv_template";

			foreach($tables as $table) {
				$wpdb->query($table, array());
			}
		}
	}
}
