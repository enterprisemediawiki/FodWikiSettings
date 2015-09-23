FodWikiSettings
================

This MediaWiki extension simply houses some specific code and content for MediaWiki instances at Johnson Space Center.

FodWikiSettings and ExtensionLoader must be added first. ExtensionLoader uses ExtensionSettings.php, which is housed in FodWikiSettings, to determine all the other extensions that are added (except those done by Composer).

Install this extension and ExtensionLoader (via git clone).

Then add the following to LocalSettings.php:

```
## Used to generate Wiki name, email senders, path names, etc
$egFodWikiSettings_GroupName = "EVA";

## Restrictions on who can view/edit
$egFodWikiSettings_auth_type = "ndc_closed"; // (ndc_closed) for local_dev add $wgTmpDirectory = 'd:\Support\php\uploadtemp';

# Use JSC FOD Wiki Settings - github/enterprisemediawiki/FodWikiSettings
require_once "$IP/extensions/FodWikiSettings/FodWikiSettings.php";


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

Run `php updateExtensions.php` from the ExtensionLoader directory.
