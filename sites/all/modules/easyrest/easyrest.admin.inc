<?php

function easyrest_admin_form ($options = []) {
    //this form is designed to be called and used from other modules that use the same process as easyrest (e.g. webhook)

    $module_name = isset($options['module_name']) ? $options['module_name'] : 'easyrest';
    $hook_name   = isset($options['hook_name'])   ? $options['hook_name']   : 'endpoints';

    $form = [];

    $form["{$module_name}_api_key"] = [
        '#type'          => 'textfield',
        '#title'         => 'API Key',
        '#default_value' => variable_get("{$module_name}_api_key", '1571598b-e76e-45a9-7d84-64e6130cb40d'),
        '#description'   => 'This value is used by remote third parties to access data over restful http.'
    ];

    $form["{$module_name}_{$hook_name}"] = [
        '#type'          => 'fieldset',
        '#title'         => "{$module_name}_{$hook_name}",
        '#collapsible'   => TRUE,
        '#collapsed'     => TRUE,
    ];

    $form["{$module_name}_{$hook_name}"]['details'] = [
        '#type'         => 'item',
        '#markup'       => "Uncheck any {$hook_name} you'd like to manually disable."

    ];

    foreach (module_implements($hook_name) as $module) {
        $endpoints = module_invoke($module, "{$hook_name}");

        foreach ($endpoints as $endpoint_url => $endpoint_config) {

            $form["{$module_name}_{$hook_name}"]["{$module_name}_endpoint_{$endpoint_url}_enabled"] = [
                '#type'          => 'checkbox',
                '#title'         => "[{$module}] {$endpoint_url}",
                '#default_value' => variable_get("{$module_name}_endpoint_{$endpoint_url}_enabled", true),
                '#description'   => !empty($endpoint_config['description']) ? $endpoint_config['description'] : 'No Description Provided For This '.substr($hook_name,0,-1).'.'
            ];

        }

    }



    return system_settings_form($form);

}