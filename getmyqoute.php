<?php

/**
 * Plugin Name
 *
 * @package           Getmyqoute
 * @author            Muhammad Adnan
 * @copyright         2022 Coreword
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Get my Qoute
 * Plugin URI:        https://getmyqoute.com
 * Description:       This plugin is for calculating price as according to your requirements.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Muhammad Adnan
 * Author URI:        https://getmyqoute.com
 * Text Domain:       my-testing
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
/*
Getmyqoute is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Getmyqoute is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/

// Block direct access to file
defined( 'ABSPATH' ) or die( 'Not Authorized!' );

// Plugin Defines
define( "GMQ_FILE", __FILE__ );
define( "GMQ_DIRECTORY", dirname(__FILE__) );
define( "GMQ_TEXT_DOMAIN", dirname(__FILE__) );
define( "GMQ_DIRECTORY_BASENAME", plugin_basename( GMQ_FILE ) );
define( "GMQ_DIRECTORY_PATH", plugin_dir_path( GMQ_FILE ) );
define( "GMQ_DIRECTORY_URL", plugins_url( null, GMQ_FILE ) );
//api key
define( "GMQ_API_KEY", get_option( 'gmq_map_api_key' ));
// Require the tabs class file
require_once( GMQ_DIRECTORY . '/tabs-class.php' );
