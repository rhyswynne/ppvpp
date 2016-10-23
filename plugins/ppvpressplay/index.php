<?php

/**
 * @package 
 * @version 
 */
/*
Plugin Name: PPV Press Play
Plugin URI: 
Description: Functionality for PPV Press Play
Version: 0.5
Author: Rhys Wynne
Author URI: https://winwar.co.uk
Tags:
License: GPLv2 or later
Text Domain: 
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

define('PPVPRESSPLAY_PLUGIN_PATH',dirname(__FILE__));
define('PPVPRESSPLAY_PLUGIN_URL',plugins_url('', __FILE__));

// Cron Stuff as it needs to be in the main file.
/**
 * Delete from the cron the hooks created for the cron.
 * 
 * @return void
 */
function ppvpp_deactivation() {
	wp_clear_scheduled_hook('ppvpp_event_hook_hourly');
	wp_clear_scheduled_hook('ppvpp_event_hook_daily');
} register_deactivation_hook(__FILE__, 'ppvpp_deactivation');


/**
 * Create the hourly & daily hooks for the Cottages4u stuff.
 * 
 * @return void
 */
function ppvpp_activation() {
	wp_schedule_event(time(), 'hourly', 'ppvpp_event_hook_hourly');
	wp_schedule_event(time(), 'daily', 'ppvpp_event_hook_daily');

	if ( !wp_next_scheduled( 'ppvpp_event_hook_10_minutes' ) ) {
		wp_schedule_event(time(), 'minutes_10', 'ppvpp_event_hook_10_minutes');

	}

} register_activation_hook(__FILE__, 'ppvpp_activation');


/**
 * Add once 5 minute interval to wp schedules
 * @param  	array 	$interval 		Intervals in the cron. 
 * @return 	array 					Intervals, with one every 5 minutes added.
 */
function ppvpp_set_5_minutes($interval) {

	$interval['minutes_10'] = array('interval' => 5 * 60, 'display' => 'Once Every 5 minutes');

	return $interval;
}  add_filter('cron_schedules', 'ppvpp_set_5_minutes');

require_once PPVPRESSPLAY_PLUGIN_PATH . '/inc/core.php';