<?php

class FodWikiSettings {

	static public $IP;

	static public function requireAuthSettings ( $auth_type=false ) {

		$auth_types = array(
			'local_dev',
			'ndc_closed',
			'ndc_openview',
			'ndc_open',	
		);

		if ( ! $auth_type ) {
			throw new MWException( 'Use of Extension:FodWikiSettings requires $egFodWikiSettings_auth_type be set.' );
			global $egFodWikiSettings_auth_type;
			$egFodWikiSettings_auth_type = 'error';
		} else if ( ! in_array($auth_type, $auth_types) ) {
			throw new MWException( 'Unsupported $egFodWikiSettings_auth_type set. See Extension:FodWikiSettings.' ); 
			global $egFodWikiSettings_auth_type;
			$egFodWikiSettings_auth_type = 'error';
		}

		require_once $GLOBALS['egFodWikiSettings_install_path'] . "/Includes/Auth/settings_$auth_type.php";
	}
	
	static public function addJSandCSS ( $out ) {
		global $wgScriptPath;
		// $out->addScriptFile( $wgScriptPath .'/resources/session.min.js' );
		$out->addScriptFile( $wgScriptPath .'/extensions/FodWikiSettings/Lib/FodWikiSettings.js' );

		$out->addLink( array(
			'rel' => 'stylesheet',
			'type' => 'text/css',
			'media' => "screen",
			'href' => "$wgScriptPath/extensions/FodWikiSettings/Lib/FodWikiSettings.css"
		) );
		
		return true;
	}
	
}