<?php

// see http://www.mediawiki.org/wiki/Manual:Hooks/SpecialPage_initList
// and http://www.mediawiki.org/w/Manual:Special_pages
// and http://lists.wikimedia.org/pipermail/mediawiki-l/2009-June/031231.html
// disable login and logout functions for all users
$GLOBALS['wgHooks']['SpecialPage_initList'][] = function (&$list) {
	unset( $list['Userlogout'] );
	unset( $list['Userlogin'] );
	return true;
};

// http://www.mediawiki.org/wiki/Extension:Windows_NTLM_LDAP_Auto_Auth
// remove login and logout buttons for all users
$GLOBALS['wgHooks']['PersonalUrls'][] = function (&$personal_urls, &$wgTitle) {
	unset( $personal_urls["login"] );
	unset( $personal_urls["logout"] );
	unset( $personal_urls['anonlogin'] );
	return true;
};

// for all types, no creating accounts, viewing or editing for anonymous users...because
// there should not be any anonymous users. Everyone should automatically be logged in
// with their network username, regardless of whether they are allowed to view/edit.
$GLOBALS['wgGroupPermissions']['*']['createaccount'] = false;
$GLOBALS['wgGroupPermissions']['*']['read'] = false;
$GLOBALS['wgGroupPermissions']['*']['edit'] = false;
