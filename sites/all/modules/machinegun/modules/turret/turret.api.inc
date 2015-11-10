<?php


function turret_register_endpoint ($params) {
    //create a turret content type instance here.

    //possible params:
    //turret_id
    //turret_config_form (a drupal form api array)

    return ['error' => 'Not Yet Implemented'];
}

function turret_connect_endpoint ($param) {
    //a turret tells machine gun that it's available and active.

    return ['error' => 'Not Yet Implemented'];

}

function turret_disconnect_endpoint ($param) {
    //a turret tells machine gun that it is no longer available.

    return ['error' => 'Not Yet Implemented'];

}

function turret_claim_endpoint ($params) {
    //a user will claim a turret by its turret_id
    //user must be logged in to claim a turret by id

    return ['error' => 'Not Yet Implemented'];

}

function turret_release_endpoint ($params) {
    //a user can release a turret (opposite of claiming)
    //user must be logged in to release a turret

    return ['error' => 'Not Yet Implemented'];

}

function turret_config_form_endpoint ($params) {
    //use this to generate a configuration form for a turret
    //must provide a turret_id
    //must be logged in
    //must own the turret referenced by turret_id

    return ['error' => 'Not Yet Implemented'];

}

function turret_configure_endpoint ($params) {
    //a user can configure a claimed turret
    //turret_id must belong to a claimed turret
    //user must be the owner of the claimed turret
    //this is used as a form submit endpoint. we'll process the parameters sent to us

    return ['error' => 'Not Yet Implemented'];

}

function turret_status_endpoint ($params) {
    //you can query the status of a turret here

    return ['error' => 'Not Yet Implemented'];

}