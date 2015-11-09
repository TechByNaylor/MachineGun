<?php

function github_admin_form ($options = []) {

    $form = [];

    $form['github_repo_url'] = [
        '#type'          => 'textfield',
        '#title'         => 'Github Repository URL',
        '#default_value' => variable_get('github_repo_url', 'https://github.com/TechByNaylor/MachineGun.git'),
        '#description'   => 'The git repository url.'
    ];

    $form['github_admin_username'] = [
        '#type'          => 'textfield',
        '#title'         => 'Github Administrator Username',
        '#default_value' => variable_get('github_admin_username', null),
        '#description'   => 'Github Administration Username, Used To Manage Github Resources'
    ];

    $form['github_admin_password'] = [
        '#type'          => 'password',
        '#title'         => 'Github Administrator Username',
        '#default_value' => variable_get('github_admin_password', null),
        '#description'   => 'Github Administration Password, Used To Manage Github Resources'
    ];

    $form['github_auto_pull'] = [
        '#type'          => 'checkbox',
        '#title'         => 'Github Auto Pull Repo On Remote Push',
        '#default_value' => variable_get('github_auto_pull', false),
        '#description'   => 'Setup repository webhook at https://github.com/{owner}/{repo}/settings/hooks   Point it at yourdomain.com/webhook/github/push'
    ];

    return system_settings_form($form);

}