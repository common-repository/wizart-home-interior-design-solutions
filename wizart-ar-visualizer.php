<?php
/**
 * Plugin Name: Wizart Home - interior design solutions
 * Description: This plugin allows quick embed Wizart Home app - assistant that can help you to choose finishing materials for any room in your house. Easy to use: just make a photo of your interior, choose any materials you like in the catalogue and apply them on the surfaces. Application will show you how new wallpapers and flooring will look like in your room and help you to make a final choice.
 * Author URI:  https://www.wizart.ai/
 * Author:      Wizart
 * Version:     2.0.5.1
 * Requires at least: 5.5
 * Requires PHP: 7.2
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . 'includes/class-wizart-ar-visualizer.php';

new WizartArVisualizer();