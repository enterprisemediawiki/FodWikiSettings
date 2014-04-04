<?php

if ($egJSCMOD_independentExtensions) {
	$egJSCMOD_extensionsPath = "$IP/extensions";
} 
else {
	$egJSCMOD_extensionsPath = "$IP/../extensions";
}

require_once "$egJSCMOD_extensionsPath/ParserFunctions/ParserFunctions.php";
$wgPFEnableStringFunctions = true;
require_once "$egJSCMOD_extensionsPath/StringFunctionsEscaped/StringFunctionsEscaped.php";


require_once "$egJSCMOD_extensionsPath/LabeledSectionTransclusion/lst.php";
require_once "$egJSCMOD_extensionsPath/LabeledSectionTransclusion/lsth.php";

require_once "$egJSCMOD_extensionsPath/ExternalData/ExternalData.php";

require_once "$egJSCMOD_extensionsPath/Cite/Cite.php";
$wgCiteEnablePopups = true;

// allow pipes (i.e. "|") as parameters in template calls
require_once "$egJSCMOD_extensionsPath/PipeEscape/PipeEscape.php";

require_once "$egJSCMOD_extensionsPath/intersection/DynamicPageList.php";

require_once "$egJSCMOD_extensionsPath/HeaderFooter/HeaderFooter.php"; 

require_once "$egJSCMOD_extensionsPath/WhoIsWatching/WhoIsWatching.php";
$wgPageShowWatchingUsers = true;

#
#	SEMANTIC MEDIAWIKI
#
require_once "$egJSCMOD_extensionsPath/Validator/Validator.php";
require_once "$egJSCMOD_extensionsPath/SemanticMediaWiki/SemanticMediaWiki.php";
enableSemantics("$egJSCMOD_GroupName.MOD.JSC.NASA.GOV");
//$smwgShowFactbox = SMW_FACTBOX_NONEMPTY;

require_once "$egJSCMOD_extensionsPath/SemanticForms/SemanticForms.php";

require_once "$egJSCMOD_extensionsPath/CharInsert/CharInsert.php";

// Semantic Internal Objects: this version is BETA.
require_once "$egJSCMOD_extensionsPath/SemanticInternalObjects/SemanticInternalObjects.php";

require_once "$egJSCMOD_extensionsPath/SemanticCompoundQueries/SemanticCompoundQueries.php";

// SMW Settings Overrides:
$smwgQMaxSize = 5000;
 
 # Arrays
require_once "$egJSCMOD_extensionsPath/Arrays/Arrays.php";

// case-insensitive search
require_once "$egJSCMOD_extensionsPath/TitleKey/TitleKey.php";

# Maps
require_once "$egJSCMOD_extensionsPath/Maps v2.0.1/Maps.php";

// allows groups with 'talk' privelege to create/edit talk pages (but not normal pages)
require_once "$egJSCMOD_extensionsPath/TalkRight/TalkRight_1.4.1.php";




#
#	AUTO-Authenticate Extension
# 
# DELETE THESE WHEN ENABLED (commented it out when enabled auto-auth) 
//$wgGroupPermissions['*']['createaccount'] = false;
//$wgGroupPermissions['*']['edit'] = false;
//$wgGroupPermissions['Contributor'] = $wgGroupPermissions['user'];

#### BEGIN USER AUTH ####
if ( ! $egJSCMOD_local_auth ) {

	// Auth_remoteuser extension, updated by James Montalvo, blocks remote users not
	// part of the group defined by $wgAuthRemoteuserViewerGroup
	$wgAuthRemoteuserViewerGroup = "Viewer"; // set to false to allow all valid REMOTE_USER to view; set to group name to restrict viewing to particular group
	$wgAuthRemoteuserDeniedPage = "Access_Denied"; // redirect non-viewers to this page (namespace below)
	$wgAuthRemoteuserDeniedNS = NS_PROJECT; // redirect non-viewers to page in this namespace


	require_once "$egJSCMOD_extensionsPath/Auth_remoteuser/Auth_remoteuser.php";
	$wgAuth = new Auth_remoteuser();
	// see extension JSCMOD for auth settings

}
#
#
#### END USER AUTH AND PERMISSIONS ####
#
#




require_once "$egJSCMOD_extensionsPath/AdminLinks/AdminLinks.php";
$wgGroupPermissions['sysop']['adminlinks'] = true;


// Restrict Access by Category and Group
// require_once("$IP/extensions/rabcg/rabcg.php");
$wgWhitelistRead = array('Special:UserLogin');

require_once "$egJSCMOD_extensionsPath/DismissableSiteNotice/DismissableSiteNotice.php";


require_once "$egJSCMOD_extensionsPath/BatchUserRights/BatchUserRights.php";
$wgBatchUserRightsGrantableGroups = array(
	'Viewer',
	'Contributor'
);

require_once "$egJSCMOD_extensionsPath/ImportUsers/ImportUsers.php";
$wgShowExceptionDetails = true;

require_once "$egJSCMOD_extensionsPath/SemanticResultFormats/SemanticResultFormats.php";
$srfgFormats = array('calendar', 'timeline', 'exhibit', 'eventline', 'tree', 'oltree', 'ultree');

require_once "$egJSCMOD_extensionsPath/HeaderTabs/HeaderTabs.php";
$htEditTabLink = false;
$htRenderSingleTab = true;

require_once "$egJSCMOD_extensionsPath/EditUser/EditUser.php";







require_once "$egJSCMOD_extensionsPath/WikiEditor/WikiEditor.php";
# Enables use of WikiEditor by default but still allow users to disable it in preferences
$wgDefaultUserOptions['usebetatoolbar'] = 1;
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;

# displays publish button
$wgDefaultUserOptions['wikieditor-publish'] = 1;

# Displays the Preview and Changes tabs
$wgDefaultUserOptions['wikieditor-preview'] = 1;

require_once "$egJSCMOD_extensionsPath/CopyWatchers/CopyWatchers.php";

require_once "$egJSCMOD_extensionsPath/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php";

require_once "$egJSCMOD_extensionsPath/Wiretap/Wiretap.php";



# Displays the Publish and Cancel buttons on the top right side
//$wgDefaultUserOptions['wikieditor-publish'] = 1;

// require_once("$IP/extensions/PdfExport/PdfExport.php");
# DomPDF
// $wgPdfExportDomPdfConfigFile = $IP . '/extensions/PdfExport/dompdf6/dompdf_config.inc.php'; // Path to the DomPdf config file
# HTMLDoc
// $wgPdfExportHtmlDocPath = 'C:/Progra~1/HTMLDOC/htmldoc.exe';

//require_once("$IP/extensions/Collection/Collection.php");

//EXT REMOVED: require_once("$IP/extensions/ConfirmUsersEmail/ConfirmUsersEmail.php");


// allows adding semantic properties to Templates themselves
// (not just on pages via templates). 
// ENABLE THIS AFTER ALL TEMPLATES HAVE BEEN CHECKED FOR PROPER FORM
// i.e. using <noinclude> and <includeonly> properly
// $smwgNamespacesWithSemanticLinks[NS_TEMPLATE] = true;


require_once "$egJSCMOD_extensionsPath/ApprovedRevs/ApprovedRevs.php";
$egApprovedRevsAutomaticApprovals = false;

require_once "$egJSCMOD_extensionsPath/InputBox/InputBox.php";

require_once "$egJSCMOD_extensionsPath/ReplaceText/ReplaceText.php";
