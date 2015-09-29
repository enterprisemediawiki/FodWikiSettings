<?php

require_once dirname( __FILE__ ) . '/settings_ndc_all.php';


$GLOBALS['wgGroupPermissions']['user']['talk'] = true;
$GLOBALS['wgGroupPermissions']['user']['read'] = true;
$GLOBALS['wgGroupPermissions']['user']['edit'] = true;

// Viewer group really only used in settings_ndc_closed.php
// Set to the same as "user"
$GLOBALS['wgGroupPermissions']['Viewer'] = $GLOBALS['wgGroupPermissions']['user'];

// Also same as user, with perhaps some additional privileges
$GLOBALS['wgGroupPermissions']['Contributor'] = $GLOBALS['wgGroupPermissions']['user'];
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

