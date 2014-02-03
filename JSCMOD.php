<?php

// development: error reporting
if ( $egJSCMOD_debug ) {

	// turn error logging on
	error_reporting( -1 );
	ini_set( 'display_errors', 1 );
	ini_set("log_errors", 1);
	
	// Output errors to log file
	ini_set("error_log", "$egJSCMOD_FileSystemPath/$egJSCMOD_GroupName/extensions/JSCMOD/php.log");

	// MediaWiki Debug Tools
	$wgShowExceptionDetails = true;
	$wgDebugToolbar = true;
	$wgShowDebug = true;

}

// production: no error reporting
else {

	error_reporting(0);
	ini_set("display_errors", 0);

}

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath       = "/wiki/$egJSCMOD_GroupName";
$wgScriptExtension  = ".php";


## The relative URL path to the skins directory
$wgStylePath        = "$wgScriptPath/skins";


## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo             = "$wgScriptPath/extensions/JSCMOD/Groups/$egJSCMOD_GroupName/logo.png";
$wgFavicon          = "$wgScriptPath/extensions/JSCMOD/Groups/$egJSCMOD_GroupName/favicon.ico";
$wgAppleTouchIcon   = "$wgScriptPath/extensions/JSCMOD/Groups/$egJSCMOD_GroupName/apple-touch-icon.png";


/**
 *  JSC-MOD specific javascript modifications
 **/
$wgHooks['AjaxAddScript'][] = 'addJSCMODjavascript';
function addJSCMODjavascript( $out ){
	global $wgScriptPath;
	// $out->addScriptFile( $wgScriptPath .'/resources/session.min.js' );
	$out->addScriptFile( $wgScriptPath .'/extensions/JSCMOD/script.js' );

	return true;
}


## The following included script gets programmatically modified 
## during backup operations to set read-only prior to backup and
## unset when backup is complete
include "$IP/extensions/JSCMOD/wgReadOnly.php";

require_once dirname( __FILE__ ) . "/DefaultSettings.php";