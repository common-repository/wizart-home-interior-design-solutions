<?php

if (!class_exists('WizartArVisualizer')) {

    class WizartArVisualizer {

        public function __construct() {
            require_once plugin_dir_path(__FILE__) . 'admin/class-wizart-ar-visualizer-admin.php';
            new WizartArVisualizerAdmin();
        }
    }
}