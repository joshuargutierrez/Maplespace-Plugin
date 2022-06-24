<?php
/**
 * Plugin Name: Maplespace WordPress Plugin
 * Plugin URI: https://github.com/joshuargutierrez/maplespace-wordpress-plugin
 * Description: Google Calendar API with Trello API integration
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP:7.2
 * Author: Joshua R. Gutierrez
 * Author URI: https://joshuarg.net/
 * License: GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://github.com/joshuargutierrez/maplespace-wordpress-plugin
 * Text Domain: maplespace-wordpress-plugin
 * Domain Path: /languages
 */

/*
Maplespace WordPress Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.
 
Maplespace WordPress Plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Maplespace WordPress Plugin. If not, see https://github.com/joshuargutierrez/maplespace-wordpress-plugin/blob/main/LICENSE.
*/

defined( 'ABSPATH' ) or die( '::NO INDIRECT ACCESS ALLOWED::' );

require_once 'settings_sections/maplespace_wordpress_plugin_settings_page_content.php';

require_once 'admin/maplespace_wordpress_plugin_activation.php';

require_once 'admin/maplespace_wordpress_plugin_enqueue.php';

require_once 'admin/maplespace_wordpress_plugin_cron.php';

require_once 'admin/options.php';