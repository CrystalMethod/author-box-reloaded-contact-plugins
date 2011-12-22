<?php
/*
Plugin Name: Author Box Reloaded Github Contact Addon
Plugin URI: http://wordpress.org/extend/plugins/author-box-reloaded-pack/
Description: Adds a new contact field to your profile. Just need to insert your UserID. Requires Author Box Reloaded 2.0 or greater.
Version: 1.1.1
Author: Lars Martin - SMB GmbH
Author URI: http://www.smb-tec.com
Donate link: http://www.smb-tec.com
License: GNU GPL v3 or later


    Copyright (C) 2011 SMB GmbH

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

******************************************

HOW TO:

Change the following at top:

	1. At top the the specific text portion in "Plugin Name", i.e in case of "Wordpress.Org" this is the text to change
	2. At top change the "Author", "Author URI" and "Donate Link" by your owns. 

Change the following below:

    1. The function name but keep the "_authorbox_add_sites" portion.
		a) We usually use the name text for it, i.e. for "Wordpress.Org" you'll set "wordpress_org" or something like it.
    2. The $known_sites key and the "favicon" and "url" variables: 
		a) The key is used in the profile form so use the same text you used in the Plugin Name in header area.
        b) Don't forget that the $known_site url must have the text "USERNAME" in it in order to work properly.
	3. Change the values for  "plugin->author", "plugin->url" and "plugin->donate".
    4. Change the add_filter() function to include your "_authorbox_add_sites" function.

To make it available to everyone follow the rules defined at [Wordpress.Org](http://http://wordpress.org/extend/plugins/about/).
This is just another Wordpress plugin that will made some data available for Author Box Reloaded.

Thank you for your help and contribution.

*/

/**
 * Dont touch this code below
 */
$plugins = get_option( 'active_plugins' );
$required_plugin = 'author-box-2/authorbox.php';
if ( !in_array( $required_plugin , $plugins ) ) {
	$wpfr = '<a href="http://wordpress.org/extend/plugins/author-box-2/" target="_blank">Author Box Reloaded</a>';
	$dieMessage  = sprintf( __( 'The %s plugin must be installed and active.', 'author-box-2' ), $wpfr );
	$notice = "<div id=\"message\" class=\"error fade\"><p><strong>Author Box Reloaded Pack</strong></p>".
					"<p>".$dieMessage."</p></div>\n";
	add_action( 'admin_notices', create_function( '', "echo '$notice';" ) );
} 

/**
 * Section to modify
 */
function github_authorbox_add_sites( $known_sites ) {					// CHANGE the function prefix name
	$known_sites['Github'] = array(							// CHANGE the key name
		'favicon' => plugin_dir_url( __FILE__ ) . 'images/github.png',		// CHANGE the image name
		'url' => 'http://www.github.com/USERNAME',				// CHANGE the service URI 
		'plugin' => array (
			'author' => 'Lars Martin <lars.martin@smb-tec.com>', 		// CHANGE author name
			'url' => 'http://www.smb-tec.com/', 				// CHANGE author uri
 			'donate' => 'http://www.smb-tec.com',				// CHANGE donate link
		),
  );
  return $known_sites;
}
add_filter('authorbox_known_sites','github_authorbox_add_sites',10,1);			// CHANGE the function prefix name

?>
