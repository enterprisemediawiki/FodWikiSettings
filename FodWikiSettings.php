<?php

$egFodWikiSettings_GroupPathName = str_replace(' ','',$egFodWikiSettings_GroupName);

$wgSitename = $egFodWikiSettings_GroupName . ' Wiki';
$wgMetaNamespace = str_replace(' ','_',$wgSitename);

$wgEmergencyContact = str_replace(' ','-',$wgSitename) . '-Wiki@fod2.jsc.nasa.gov';
$wgPasswordSender = $wgEmergencyContact;

require_once "Includes/FodWikiSettings.body.php";
$egFodWikiSettings_install_path = __DIR__;

// development: error reporting
if ( $egFodWikiSettings_debug ) {

	// turn error logging on
	error_reporting( -1 );
	ini_set( 'display_errors', 1 );
	ini_set( 'log_errors', 1 );
	
	// Output errors to log file
	ini_set( 'error_log', __DIR__ . '/php.log' );

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

## JSC FOD Wikis use mysql
$wgDBtype = "mysql";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath       = "/wiki/$egFodWikiSettings_GroupPathName";
$wgScriptExtension  = ".php";


## The relative URL path to the skins directory
$wgStylePath        = "$wgScriptPath/skins";


## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo             = "$wgScriptPath/extensions/FodWikiSettings/Groups/$egFodWikiSettings_GroupPathName/logo.png";
$wgFavicon          = "$wgScriptPath/extensions/FodWikiSettings/Groups/$egFodWikiSettings_GroupPathName/favicon.ico";
$wgAppleTouchIcon   = "$wgScriptPath/extensions/FodWikiSettings/Groups/$egFodWikiSettings_GroupPathName/apple-touch-icon.png";


/**
 *  FodWikiSettings specific javascript modifications
 **/
$wgHooks['AjaxAddScript'][] = 'FodWikiSettings::addJSandCSS';


## The following included script gets programmatically modified 
## during backup operations to set read-only prior to backup and
## unset when backup is complete
include "$egFodWikiSettings_install_path/Includes/wgReadOnly.php";

require_once "$egFodWikiSettings_install_path/DefaultSettings.php";