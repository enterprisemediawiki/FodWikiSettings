FodWikiSettings
================

This MediaWiki extension simply houses some specific code and content for MediaWiki instances at Johnson Space Center.

FodWikiSettings and ExtensionLoader must be added first. ExtensionLoader uses ExtensionSettings.php, which is housed in FodWikiSettings, to determine all the other extensions that are added (except those done by Composer).

Install this extension.

Then add the following to LocalSettings.php:

```
## Used to generate Wiki name, email senders, path names, etc
$egFodWikiSettings_GroupName = "EVA";

## Restrictions on who can view/edit
$egFodWikiSettings_auth_type = "ndc_closed"; // (ndc_closed) for local_dev add $wgTmpDirectory = 'd:\Support\php\uploadtemp';

# Use JSC FOD Wiki Settings - github/enterprisemediawiki/FodWikiSettings
require_once "$IP/extensions/FodWikiSettings/FodWikiSettings.php";
```
