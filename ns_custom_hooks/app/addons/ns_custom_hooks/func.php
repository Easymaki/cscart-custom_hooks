<?php

use Tygh\Registry;
use Tygh\Enum\NotificationSeverity;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

/**
 * @param string $addon     Name of addon
*/
function fn_ns_custom_hooks_install_addon_post($addon)
{
    $dir = Registry::get('config.dir.addons') . $addon . '/hooks.json';

    if (file_exists($dir)) {
        $json_content = file_get_contents($dir);
        $data = json_decode($json_content, true);
        if ($data[PRODUCT_VERSION] !== null) {
            $root_dir = Registry::get('config.dir.root');

            foreach ($data[PRODUCT_VERSION] as $hook_data) {            
                $file_path = $root_dir . '/' . $hook_data['file_path'];

                if (file_exists($file_path)) {
                    $file_contents = file_get_contents($file_path);
                    $file_lines = explode("\n", $file_contents);

                    $args = !empty($hook_data['args']) ? ', ' . $hook_data['args'] : '';

                    array_splice($file_lines, $hook_data['line'], 0, "fn_set_hook('" . $hook_data['hook'] . "'" . $args . "); // CUSTOM HOOK: Added by " . $addon . " module");
        
                    $file_contents = implode("\n", $file_lines);

                    if (file_put_contents($file_path, $file_contents) === false) {
                        fn_set_notification(
                            NotificationSeverity::ERROR,
                            __('error'),
                            __('ns_custom_hooks.error_file_put_contents')
                        );
                    }
                }
            }
        } else {
            fn_set_notification(
                NotificationSeverity::ERROR,
                __('error'),
                __('ns_custom_hooks.error_json')
            );
        }
    }
}

/**
 * @param string $addon     Name of addon
*/
function fn_ns_custom_hooks_uninstall_addon_post($addon)
{
    $dir = Registry::get('config.dir.addons') . $addon . '/hooks.json';

    if (file_exists($dir)) {
        $json_content = file_get_contents($dir);
        $data = json_decode($json_content, true);

        if ($data[PRODUCT_VERSION] !== null) {
            $root_dir = Registry::get('config.dir.root');

            foreach ($data[PRODUCT_VERSION] as $hook_data) {            
                $file_path = $root_dir . '/' . $hook_data['file_path'];

                if (file_exists($file_path)) {
                    $file_contents = file_get_contents($file_path);

                    $args = !empty($hook_data['args']) ? ', ' . $hook_data['args'] : '';

                    $line_to_remove = "fn_set_hook('" . $hook_data['hook'] . "'" . $args . "); // CUSTOM HOOK: Added by " . $addon . " module";
                    $file_contents = preg_replace("/" . preg_quote($line_to_remove, "/") . "\r?\n?/", "", $file_contents);

                    file_put_contents($file_path, $file_contents);
                }
            }
        }
    }
}
