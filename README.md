FodWikiSettings
================

This MediaWiki extension simply houses some specific code and content for MediaWiki instances at Johnson Space Center.

FodWikiSettings and ExtensionLoader must be added first. ExtensionLoader uses ExtensionSettings.php, which is housed in FodWikiSettings, to determine all the other extensions that are added except those done by Composer.

Install this extension and ExtensionLoader (via git clone).

### composer.json
```
{
    "require": {
        "mediawiki/semantic-media-wiki": "~2.0",
        "mediawiki/semantic-result-formats": "~2.0",
        "mediawiki/sub-page-list": "~1.1",
        "mediawiki/semantic-maps": "~3.0"
    }
}

```


### LocalSettings.php

```
<?php

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

// same value as bash variable in config.sh
// $m_htdocs = 'D:/inetpub/wwwroot/PHP/Wiki';
$m_htdocs = $IP . '/..';

if( $wgCommandLineMode ) {

	$mezaWikiEnvVarName='WIKI';

	// get $wikiId from environment variable
	$wikiId = getenv( $mezaWikiEnvVarName );

}
else {

	// get $wikiId from URI
	$uriParts = explode( '/', $_SERVER['REQUEST_URI'] );
	$wikiId = strtolower( $uriParts[2] ); // URI has leading slash, so $uriParts[0] is empty string, $uriParts[1] is "wiki"

}

// get all directory names in /wikis, minus the first two: . and ..
$wikis = array_slice( scandir( "$m_htdocs/wikis" ), 2 );


if ( ! in_array( $wikiId, $wikis ) ) {

	// handle invalid wiki
	die( "No sir, I ain't heard'a no wiki that goes by the name \"$wikiId\"\n" );

}


// Path of to images and config for this $wikiId
$mezaWikiIP = "/wiki/wikis/$wikiId";

// Get's wiki-specific config variables like:
// $wgSitename, $mezaAuthType, $mezaDebug, $mezaEnableWikiEmail
require_once "$m_htdocs/wikis/$wikiId/config/setup.php";


// https://www.mediawiki.org/wiki/Manual:$wgScriptPath
$wgScriptPath = "/wiki/$wikiId";

// https://www.mediawiki.org/wiki/Manual:$wgUploadPath
$wgUploadPath = "$mezaWikiIP/images";

// https://www.mediawiki.org/wiki/Manual:$wgUploadDirectory
$wgUploadDirectory = "$m_htdocs/wikis/$wikiId/images";

// https://www.mediawiki.org/wiki/Manual:$wgLogo
$wgLogo = "$mezaWikiIP/config/logo.png";

// https://www.mediawiki.org/wiki/Manual:$wgFavicon
$wgFavicon = "$mezaWikiIP/config/favicon.ico";

// https://www.mediawiki.org/wiki/Manual:$wgMetaNamespace
$wgMetaNamespace = str_replace( ' ', '_', $wgSitename );

// @todo: handle auth type from setup.php
// @todo: handle debug from setup.php

// From MW web install: Uncomment this to disable output compression
# $wgDisableOutputCompression = true;


## The relative URL path to the skins directory
$wgStylePath = "$wgScriptPath/skins";
$wgResourceBasePath = $wgScriptPath;


## E-Mail
$wgEnableEmail     = false; // true for production
$wgEnableUserEmail = $wgEnableEmail; // Also a user preference option
if ( $wgEnableEmail ) {
	$wgSMTP = array(
		'host'     => "your.email.server.com", // could also be an IP address
		'IDHost'   => "your.server.com", // Generally the domain name of the website (aka mywiki.org)
		'port'     => 25,    // Port to use when connecting to the SMTP server
		'auth'     => false  // $host doesn't require auth
	);
}

## UPO means: this is also a user preference option
$wgEnableUserEmail = $wgEnableEmail; # UPO
$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

$wgEmergencyContact = str_replace(' ','-',$wgSitename) . '-Wiki@' . $IDHost;
$wgPasswordSender = $wgEmergencyContact;

## Database settings
$wgDBtype = "mysql";
$wgDBserver = "";
if ( isset( $mezaCustomDBname ) ) {
	$wgDBname = $mezaCustomDBname;
} else {
	$wgDBname = "wiki_$wikiId";
}

require_once "$m_htdocs/__common/defaultDatabaseCredentials.php";
if ( isset( $mezaCustomDBuser ) && isset ( $mezaCustomDBpass ) ) {
	$wgDBuser = $mezaCustomDBuser;
	$wgDBpassword = $mezaCustomDBpass;
}

## Restrictions on who can view/edit
## @todo: these just wired together for now. $mezaAuthType is from setup.php
$egFodWikiSettings_auth_type = $mezaAuthType; // (ndc_closed) for local_dev add $wgTmpDirectory = 'd:\Support\php\uploadtemp';

## Turn debug on if required
$egFodWikiSettings_debug = $mezaDebug; // count: 23
if ( isset( $_GET['emw_debug'] ) ) {
	$egFodWikiSettings_debug = true; // count: 4
}

# Use FOD Wiki Settings - github/enterprisemediawiki/FodWikiSettings
require_once "$IP/extensions/FodWikiSettings/FodWikiSettings.php";

$wgGitBin = false;

/**
 *  Code to load the extension "ExtensionLoader", which then installs and loads
 *  other extensions as defined in "ExtensionSettings.php". Note that the file
 *  or files defining which extensions are loaded is configurable below, as is
 *  the path to where extensions are installed.
 */
require_once "$IP/extensions/ExtensionLoader/ExtensionLoader.php";
ExtensionLoader::init( "$IP/extensions/FodWikiSettings/ExtensionSettings.php" );
foreach( ExtensionLoader::$loader->oldExtensions as $extensionPath ) {
	require_once $extensionPath;
}
ExtensionLoader::$loader->completeExtensionLoading();


// @todo: do wiki specific stuff here (load extensions, override config, etc)
if ( file_exists( "$m_htdocs/wikis/$wikiId/config/CustomSettings.php" ) ) {
	require_once "$m_htdocs/wikis/$wikiId/config/CustomSettings.php";
}

```

### __common/defaultDatabaseCredentials.php
```
<?php

# DB1
if( $wgCommandLineMode ) {
	$wgDBserver     = "your.db.server.com";
	$egFodWikiSettings_debug = true;
	echo "Running via command line in debug mode.\n";
} else {
	$wgDBserver     = "your.db";
}
$wgDBuser           = "your_db_username";
$wgDBpassword       = "your_password";

```

### Update Extensions
Run `php updateExtensions.php` from the ExtensionLoader directory.
