<?php

require_once dirname( __FILE__ ) . '/settings_ndc_all.php';

// Auth_remoteuser extension, updated by James Montalvo, blocks remote users
// who are not part of the group defined by $wgAuthRemoteuserViewerGroup
$GLOBALS['wgAuthRemoteuserViewerGroup'] = "Viewer"; // set to false to allow all valid REMOTE_USER to view; set to group name to restrict viewing to particular group
$GLOBALS['wgAuthRemoteuserDeniedPage'] = "Access_Denied"; // redirect non-viewers to this page (namespace below)
$GLOBALS['wgAuthRemoteuserDeniedNS'] = NS_PROJECT; // redirect non-viewers to page in this namespace


$GLOBALS['wgGroupPermissions']['user']['talk'] = true;
$GLOBALS['wgGroupPermissions']['user']['read'] = true;
$GLOBALS['wgGroupPermissions']['user']['edit'] = false;

// Viewer group is used by the Auth_remoteuser extension to allow only those in
// group "Viewer" to view the wiki. This allows anyone with NDC auth to get to the
// wiki (which auto-creates an account for them), but doesn't allow those users to
// see any of the wiki (besided the "access denied" page and "request access" page)
$GLOBALS['wgGroupPermissions']['Viewer']['talk'] = true;
$GLOBALS['wgGroupPermissions']['Viewer']['read'] = true;
$GLOBALS['wgGroupPermissions']['Viewer']['edit'] = false;
$GLOBALS['wgGroupPermissions']['Viewer']['movefile'] = true;

$GLOBALS['wgGroupPermissions']['Contributor'] = $GLOBALS['wgGroupPermissions']['user'];
$GLOBALS['wgGroupPermissions']['Contributor']['edit'] = true;
$GLOBALS['wgGroupPermissions']['Contributor']['unwatchedpages'] = true;

#
#   CURATORs: people with delete permissions for now
#
$GLOBALS['wgGroupPermissions']['Curator']['delete'] = true; // Delete pages
$GLOBALS['wgGroupPermissions']['Curator']['bigdelete'] = true; // Delete pages with large histories
$GLOBALS['wgGroupPermissions']['Curator']['suppressredirect'] = true; // Not create redirect when moving page
$GLOBALS['wgGroupPermissions']['Curator']['browsearchive'] = true; // Search deleted pages
$GLOBALS['wgGroupPermissions']['Curator']['undelete'] = true; // Undelete a page
$GLOBALS['wgGroupPermissions']['Curator']['deletedhistory'] = true; // View deleted history w/o associated text
$GLOBALS['wgGroupPermissions']['Curator']['deletedtext'] = true; // View deleted text/changes between deleted revs

#
#   MANAGERs: can edit user rights, plus used in MediaWiki:Approvedrevs-permissions
#   to allow managers to give managers the ability to approve pages (lesson plans, ESOP, etc)
#
$GLOBALS['wgGroupPermissions']['Manager']['userrights'] = true; // Edit all user rights

