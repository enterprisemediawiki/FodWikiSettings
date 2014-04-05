<?php

class JSCMOD {

	static public $IP;

	static public function setExtensionIP ($path) {
		self::$IP = $path;
		return $path;
	}
	
	static public function getExtensionIP () {
		return self::$IP;
	}

	static public function requireAuthSettings ( $auth_type ) {
		global $egJSCMOD_local_auth;
	
		// set local based on old way of setting local for backwards compatibility
		if ( isset($egJSCMOD_local_auth) ) {
			$egJSCMOD_auth_type = 'local_dev';
		}

		$egJSCMOD_auth_type_array = array(
			'local_dev',
			'ndc_closed',
			'ndc_openview',
			'ndc_open',	
		);

		if ( ! isset($egJSCMOD_auth_type) ) {
			throw new MWException( 'Use of Extension:JSCMOD requires $egJSCMOD_auth_type be set.' );
			$egJSCMOD_auth_type = 'error';
		} else if ( ! in_array($egJSCMOD_auth_type, $egJSCMOD_auth_type_array) ) {
			throw new MWException( 'Unsupported $egJSCMOD_auth_type set. See Extension:JSCMOD.' ); 
			$egJSCMOD_auth_type = 'error';
		}

		require_once self::getExtensionIP() . "/Config/Auth/settings_$auth_type.php";
	}
	
	static public function addJSandCSS ( $out ) {
		global $wgScriptPath;
		// $out->addScriptFile( $wgScriptPath .'/resources/session.min.js' );
		$out->addScriptFile( $wgScriptPath .'/extensions/JSCMOD/Lib/JSCMOD.js' );

		$out->addLink( array(
			'rel' => 'stylesheet',
			'type' => 'text/css',
			'media' => "screen",
			'href' => "$wgScriptPath/extensions/JSCMOD/Lib/JSCMOD.css"
		) );
		
		return true;
	}
	
	static public function loadExtension ( $ext_name ) {
	
		
	
	}
}