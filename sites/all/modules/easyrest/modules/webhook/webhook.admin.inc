<?php

require_once(drupal_get_path('module','easyrest').'/easyrest.admin.inc');

function webhook_admin_form () {

    //we proxy the easyrest endpoints form, with some webhook specific pointers.

    return easyrest_admin_form([
        'module_name' => 'webhook',
        'hook_name'   => 'webhooks'
    ]);

}