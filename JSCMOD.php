<?php

require_once "Includes/JSCMOD.body.php";
$extensionIP = JSCMOD::setExtensionIP( __DIR__ );

if ( ! isset($egJSCMOD_independentExtensions) )
	$egJSCMOD_independentExtensions = false;

// development: error reporting
if ( $egJSCMOD_debug ) {

	// turn error logging on
	error_reporting( -1 );
	ini_set( 'display_errors', 1 );
	ini_set("log_errors", 1);
	
	// Output errors to log file
	ini_set("error_log", dirname( __FILE__ ). "/php.log");

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
$wgLogo             = "$extensionIP/Groups/$egJSCMOD_GroupName/logo.png";
$wgFavicon          = "$extensionIP/Groups/$egJSCMOD_GroupName/favicon.ico";
$wgAppleTouchIcon   = "$extensionIP/Groups/$egJSCMOD_GroupName/apple-touch-icon.png";


/**
 *  JSC-MOD specific javascript modifications
 **/
$wgHooks['AjaxAddScript'][] = 'JSCMOD::addJSandCSS';


require_once "$extensionIP/Config/Extensions.php";

## The following included script gets programmatically modified 
## during backup operations to set read-only prior to backup and
## unset when backup is complete
include "$extensionIP/Config/wgReadOnly.php";

require_once "$extensionIP/Config/DefaultSettings.php";