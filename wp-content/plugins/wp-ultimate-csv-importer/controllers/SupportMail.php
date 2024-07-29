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
 * Class SupportMail
 * @package Smackcoders\FCSV
 */
class SupportMail {

	protected static $instance = null,$plugin;

	public static function getInstance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
			self::$instance->doHooks();
		}
		return self::$instance;
	}

	/**
	 * SupportMail constructor.
	 */
	public function __construct() {
		$plugin = Plugin::getInstance();
	}

	/**
	 * SupportMail hooks.
	 */
	public function doHooks(){
		add_action('wp_ajax_support_mail', array($this,'supportMail'));
		add_action('wp_ajax_send_subscribe_email', array($this,'sendSubscribeEmail'));
	}

	public static function supportMail(){
		check_ajax_referer('smack-ultimate-csv-importer', 'securekey');
		if($_POST){
			$email = sanitize_email($_POST['email']);
			$url = get_option('siteurl');
			$site_name = get_option('blogname');
			$headers = "From: " . $site_name . "<$email>" . "\r\n";
			$headers.= 'MIME-Version: 1.0' . "\r\n";
			$headers= array( "Content-type: text/html; charset=UTF-8");
			$to = 'support@smackcoders.com';
			$subject = sanitize_text_field($_POST['query']);
			$message = "Site URL: " . $url . "\r\n<br>";
			$message .= "Email: " . $email . "\r\n<br>";
			$message .= "Plugin Name: WP Ultimate CSV Importer" . "\r\n<br>";
			$message .= "Message: "."\r\n" . sanitize_text_field($_POST['message']) . "\r\n<br>";
			if(wp_mail($to, $subject, $message, $headers)) {
				$success_message = 'Mail Sent!';
				echo wp_json_encode($success_message);
			} else {
				$error_message = "Please draft a mail to support@smackcoders.com. If you doesn't get any acknowledgement within an hour!";
				echo wp_json_encode($error_message);
			}
			wp_die();
		}
	}

	public static function sendSubscribeEmail(){
				check_ajax_referer('smack-ultimate-csv-importer', 'securekey');
				if($_POST){
			$email = sanitize_email($_POST['subscribe_email']);
			$url = get_option('siteurl');
			$site_name = get_option('blogname');
			$headers = "From: " . $site_name . "<$email>" . "\r\n";
			$headers.= 'MIME-Version: 1.0' . "\r\n";
			$headers.= "Content-type: text/html; charset=iso-8859-1 \r\n";
			$to = 'marketing@smackcoders.com';
			$subject = 'New Newsletter Subscription';
			$message = "Site URL: " . $url . "\r\n<br>";
			$message .= "Email: " . $email . "\r\n<br>";
			 $message .= "Plugin Name: WP Ultimate CSV Importer" . "\r\n<br>";
			$message .= "Message: Hi Team, I want to subscribe to your newsletter." . "\r\n<br>";
						if(wp_mail($to, $subject, $message, $headers)) {
				$success_message = 'Mail Sent!';
								echo wp_json_encode($success_message);
			} else {
				$error_message = "Please draft a mail to marketing@smackcoders.com. If you doesn't get any acknowledgement within an hour!";
								echo wp_json_encode($error_message);
			} 
			wp_die();
		}
	}
}
