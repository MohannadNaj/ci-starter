<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =
	array(
		"base_url" => "/hauth/endpoint",

		"providers" => array (
			// openid providers
			"OpenID" => array (
				"enabled" => false
			),

			"Yahoo" => array (
				"enabled" => false,
				"keys"    => array ( "key" => getenv("YAHOO_KEY"), "secret" => getenv("YAHOO_SECRET") ),
			),

			"AOL"  => array (
				"enabled" => false
			),

			"Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => getenv("GOOGLE_ID"), "secret" => getenv("GOOGLE_SECRET") ),
				    "scope"           => "https://www.googleapis.com/auth/userinfo.profile " .
                   "https://www.googleapis.com/auth/userinfo.email"   , 
		          "access_type"     => "offline",   
		          "approval_prompt" => "force",
  		          "redirect_uri" => ""

					),

			"Facebook" => array (
				"enabled" => false,
				"keys"    => array ( "id" => getenv("FACEBOOK_ID") ,
									"secret" => getenv("FACEBOOK_SECRET") ),
				"trustForwarded" => false,
				"scope" => "email, user_about_me, user_birthday, read_page_mailboxes,user_hometown, user_website, user_friends, public_profile"
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => getenv("TWITTER_KEY"),
					"secret" => getenv("TWITTER_SECRET") )
			),

			// windows live
			"Live" => array (
				"enabled" => false,
				"keys"    => array ( "id" => getenv("LIVE_ID"), "secret" => getenv("LIVE_SECRET") )
			),

			"LinkedIn" => array (
				"enabled" => false,
				"keys"    => array ( "key" => getenv("LINKEDIN_KEY"), "secret" => getenv("LINKEDIN_SECRET") )
			),

			"Foursquare" => array (
				"enabled" => false,
				"keys"    => array ( "id" => getenv("FOURSQUARE_ID"), "secret" => getenv("FOURSQUARE_SECRET") )
			),
		),

		// If you want to enable logging, set 'debug_mode' to false.
		// You can also set it to
		// - "error" To log only error messages. Useful in production
		// - "info" To log info and error messages (ignore debug messages)
		"debug_mode" => false,

		// Path to file writable by the web server. Required if 'debug_mode' is not false
		"debug_file" => "",
	);

/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */