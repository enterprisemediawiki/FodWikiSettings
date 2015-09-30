<?php

$GLOBALS['wgGroupPermissions']['*']['createaccount'] = false;
$GLOBALS['wgGroupPermissions']['*']['read'] = false;
$GLOBALS['wgGroupPermissions']['*']['edit'] = false;

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
