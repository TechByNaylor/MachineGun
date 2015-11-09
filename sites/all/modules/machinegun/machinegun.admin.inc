<?php

function machinegun_admin_form () {

    $form = [];

    return $form;

}

function machinegun_get_devices ($options = []) {

    //returns an array of all registered devices.

    $devices = [];

    return $devices;

}

function machinegun_get_users ($options = []) {
    //returns an array of all machinegun users

    $users = [];

    return $users;

}

function machinegun_list_devices ($options) {
    //returns a form api compatible array of all registered devices

    $devices = machinegun_get_devices($options);

    return $devices;

}

function machinegun_list_users ($options) {
    //returns a forms api compatible list of machinegun users

    $users = machinegun_get_users($options);

    return $users;

}