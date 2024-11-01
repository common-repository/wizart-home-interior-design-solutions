<?php

if (!class_exists('WizartArVisualizerAdmin')) {

    class WizartArVisualizerAdmin {

        public function __construct() {
            add_action('admin_menu', array($this, 'add_admin_menu_page'));
            add_action('woocommerce_before_single_product', array($this, 'add_wizart_entry_point_button'));
            add_action('woocommerce_before_single_product', array($this, 'add_wizart_iframe_integration'));
            $that = $this;
            add_action('wp_body_open', function() use ($that) {
                if (is_front_page()) {
                    $that->add_wizart_floating_button();
                }
            });
            add_action('admin_init', array($this, 'wizart_register_settings'));
            add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_styles'));
        }

        public function add_admin_menu_page() {
            add_menu_page(
                'Wizart Home',
                'Wizart Home',
                'manage_options',
                'wizart-admin-panel',
                array($this, 'render_admin_page'),
                'dashicons-layout',
                20
            );
        }

        public function render_admin_page() {
            require_once plugin_dir_path( dirname( __FILE__, 2 ) ) . 'admin/admin-page.php';
        }

        public function enqueue_public_scripts_once() {
            if (!did_action('wp_enqueue_scripts_once')) {
                add_action('wp_enqueue_scripts_once', '__return_true');
                wp_enqueue_script('vendor-code-checker', plugins_url('/assets/js/vendorCodeChecker.js', dirname(__FILE__, 2)), [], false, true);
            }
        }

        public function add_wizart_entry_point_button() {
            $show_button = get_option('wizartEntryPointButtonDisplay');
            $show_iframe = get_option('wizartIframeIntegrationDisplay');

            if ($show_button && !$show_iframe) {
                require_once plugin_dir_path(dirname(__FILE__, 2)) . 'public/display-entry-point-button.php';
                $this->enqueue_public_scripts_once();
            }
        }

        public function add_wizart_iframe_integration() {
            $show_button = get_option('wizartEntryPointButtonDisplay');
            $show_iframe = get_option('wizartIframeIntegrationDisplay');

            if ($show_iframe && !$show_button) {
                require_once plugin_dir_path(dirname(__FILE__, 2)) . 'public/display-iframe-integration.php';
                $this->enqueue_public_scripts_once();
            }
        }


        public function add_wizart_floating_button() {
            $show_button = get_option('wizartFloatingButtonDisplay');
            if ($show_button) {
                require_once plugin_dir_path( dirname( __FILE__, 2 ) ) . 'public/display-floating-button.php';
            }
        }

        public function wizart_register_settings() {
            register_setting('wizart_button_settings_group', 'wizartFloatingButtonDisplay');
            register_setting('wizart_button_settings_group', 'wizartFloatingElementSelector');
            register_setting('wizart_button_settings_group', 'wizartFloatingInsertElementPosition');
            register_setting('wizart_button_settings_group', 'wizartFloatingFontSize');
            register_setting('wizart_button_settings_group', 'wizartFloatingTitle');
            register_setting('wizart_button_settings_group', 'wizartFloatingTooltipTitle');
            register_setting('wizart_button_settings_group', 'wizartFloatingTooltipPosition');
            register_setting('wizart_button_settings_group', 'wizartFloatingTooltipDisable');
            register_setting('wizart_button_settings_group', 'wizartFloatingGlitterDisable');
            register_setting('wizart_button_settings_group', 'wizartFloatingClassName');
            register_setting('wizart_button_settings_group', 'wizartFloatingBorderRadius');
            register_setting('wizart_button_settings_group', 'wizartFloatingParameters');
            register_setting('wizart_button_settings_group', 'wizartFloatingBackground');
            register_setting('wizart_button_settings_group', 'wizartFloatingColor');
            register_setting('wizart_button_settings_group', 'wizartFloatingWidth');
            register_setting('wizart_button_settings_group', 'wizartFloatingHeight');
            register_setting('wizart_button_settings_group', 'wizartFloatingBorder');
            register_setting('wizart_button_settings_group', 'wizartFloatingImage');
            register_setting('wizart_button_settings_group', 'wizartFloatingOnloadCallback');
            register_setting('wizart_button_settings_group', 'wizartFloatingOnCloseCallback');
            register_setting('wizart_button_settings_group', 'wizartFloatingOnButtonClick');
            register_setting('wizart_button_settings_group', 'wizartFloatingIframeElementSelector');
            register_setting('wizart_button_settings_group', 'wizartFloatingInsertIframeElementPosition');
            register_setting('wizart_button_settings_group', 'wizartOnAddShoppingCartItem');
            register_setting('wizart_button_settings_group', 'wizartOnRemoveShoppingCartItem');
            register_setting('wizart_button_settings_group', 'token');
            register_setting('wizart_button_settings_group', 'useProductNameAsSku');
            register_setting('wizart_button_settings_group', 'context');
            register_setting('wizart_button_settings_group', 'locale');
            register_setting('wizart_button_settings_group', 'roomUuid');
            register_setting('wizart_button_settings_group', 'deactivateCustomPhoto');
            register_setting('wizart_button_settings_group', 'openFirstRoom');
            register_setting('wizart_button_settings_group', 'wizartEntryPointButtonDisplay');
            register_setting('wizart_button_settings_group', 'wizartEntryElementSelector');
            register_setting('wizart_button_settings_group', 'wizartEntryElementsSelector');
            register_setting('wizart_button_settings_group', 'wizartEntryPointTitle');
            register_setting('wizart_button_settings_group', 'wizartEntryPointTooltipTitle');
            register_setting('wizart_button_settings_group', 'wizartEntryPointTooltipPosition');
            register_setting('wizart_button_settings_group', 'wizartEntryPointTooltipDisable');
            register_setting('wizart_button_settings_group', 'wizartEntryPointGlitterDisable');
            register_setting('wizart_button_settings_group', 'wizartEntryPointClassName');
            register_setting('wizart_button_settings_group', 'wizartEntryPointBorderRadius');
            register_setting('wizart_button_settings_group', 'wizartEntryPointBackground');
            register_setting('wizart_button_settings_group', 'wizartEntryPointColor');
            register_setting('wizart_button_settings_group', 'wizartEntryPointWidth');
            register_setting('wizart_button_settings_group', 'wizartEntryPointHeight');
            register_setting('wizart_button_settings_group', 'wizartEntryPointBorder');
            register_setting('wizart_button_settings_group', 'wizartEntryPointImage');
            register_setting('wizart_button_settings_group', 'wizartEntryPointOnloadCallback');
            register_setting('wizart_button_settings_group', 'wizartEntryPointOnCloseCallback');
            register_setting('wizart_button_settings_group', 'wizartEntryPointOnButtonClick');
            register_setting('wizart_button_settings_group', 'wizartEntryPointInsertElementPosition');
            register_setting('wizart_button_settings_group', 'wizartEntryPointIframeElementSelector');
            register_setting('wizart_button_settings_group', 'wizartEntryPointInsertIframeElementPosition');

            register_setting('wizart_button_settings_group', 'wizartIframeIntegrationDisplay');
            register_setting('wizart_button_settings_group', 'wizartIframeIntegrationSelector');
            register_setting('wizart_button_settings_group', 'wizartIframeIntegrationInsertElementPosition');
        }

        public function enqueue_admin_styles() {
            wp_enqueue_style( 'wizart-ar-visualizer-admin-style', plugins_url( '/assets/css/admin-panel-style.css', dirname(__FILE__, 2) ));
        }
    }
}