<?php

// if ($egJSCMOD_independentExtensions) {
	// $egJSCMOD_extensionsPath = "$IP/extensions";
// } 
// else {
	// $wgExtensionAssetsPath = "/wiki/extensions";
	// $egJSCMOD_extensionsPath = "$IP/../extensions";
// }

$ext = new JSCMOD_Extensions();

$ext->loadExtensions();


// ParserFunctions
$wgPFEnableStringFunctions = true;

// Cite
$wgCiteEnablePopups = true;

// WhoIsWatching
$wgPageShowWatchingUsers = true;



// SemanticMediaWiki
$smwgQMaxSize = 5000;
 
// AdminLinks
$wgGroupPermissions['sysop']['adminlinks'] = true;

// FIXME: Why do we have this?
$wgWhitelistRead = array('Special:UserLogin');
$wgShowExceptionDetails = true;

// BatchUserRights
$wgBatchUserRightsGrantableGroups = array(
	'Viewer',
	'Contributor'
);

// SemanticResultFormats
$srfgFormats = array('calendar', 'timeline', 'exhibit', 'eventline', 'tree', 'oltree', 'ultree');

// HeaderTabs
$htEditTabLink = false;
$htRenderSingleTab = true;

// WikiEditor
$wgDefaultUserOptions['usebetatoolbar'] = 1; // Enables use of WikiEditor by default but 
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1; // but users can disable in preferences
$wgDefaultUserOptions['wikieditor-publish'] = 1; // displays publish button
$wgDefaultUserOptions['wikieditor-preview'] = 1; // Displays the Preview and Changes tabs

// ApprovedRevs
$egApprovedRevsAutomaticApprovals = false;