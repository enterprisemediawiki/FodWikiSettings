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

## Database settings
$wgDBname     = "wiki_eva";
include "$IP/../databaseCredentials.php";

## Used to generate Wiki name, email senders, path names, etc
$egFodWikiSettings_GroupName = "EVA";

## Restrictions on who can view/edit
$egFodWikiSettings_auth_type = "ndc_closed"; // (ndc_closed) for local_dev add $wgTmpDirectory = 'd:\Support\php\uploadtemp';

# Use JSC FOD Wiki Settings - github/enterprisemediawiki/FodWikiSettings
require_once "$IP/extensions/FodWikiSettings/FodWikiSettings.php";

## E-Mail
$wgEnableEmail     = false; // true for production
$wgEnableUserEmail = $wgEnableEmail; // Also a user preference option
if ( $wgEnableEmail ) {
	$wgSMTP = array(
		'host'     => "your.email.server.com", // could also be an IP address
		'IDHost'   => "your.server.com", // Generally the domain name of the website (aka mywiki.org)
		'port'     => 25,    // Port to use when connecting to the SMTP server
		'auth'     => false  // mrelay.jsc.nasa.gov doesn't require auth
	);
}

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

```

### databaseCredentials.php
```
<?php

## Turn debug on if required
$egFodWikiSettings_debug = false; // count: 23
if ( isset( $_GET['emw_debug'] ) ) {
	$egFodWikiSettings_debug = true; // count: 4
}

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
