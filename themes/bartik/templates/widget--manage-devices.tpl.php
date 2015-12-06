<?php
    $stylesheet = !empty($stylesheet) ? $stylesheet : 'widget.management.css';

    $tabs = [];

    foreach ($devices as $delta => $device) {

        $deviceStatus = !empty($device->field_status)        ? json_decode($device->field_status['und'][0]['value'], true)        : ['online' => false];
        $settingsForm = !empty($device->field_settings_form) ? json_decode($device->field_settings_form['und'][0]['value'], true) : [];

        $tabs[$device->title] = [
            'object'   => $device,
            'status'   => $deviceStatus,
            'settings' => $settingsForm

        ];

    }

?>

<style>
    <?= file_get_contents(path_to_theme().'/css/'.$stylesheet) ?>
</style>

<link rel="stylesheet" href="/sites/all/libraries/remodal/remodal.css">
<link rel="stylesheet" href="/sites/all/libraries/remodal/remodal-default-theme.css">

<?php foreach ($devices as $delta => $device) { ?>
    <div id="device_<?= $device->field_device_id['und'][0]['value'] ?>_workspace" class="workspace-main"><?= $device->field_workspace['und'][0]['value'] ?></div>

<?php } ?>

<!-- Modals -->

<div class="device-scan-modal" data-remodal-id="device_scan_modal">

    <button data-remodal-action="close" class="remodal-close"></button>

    <h1>Found Devices</h1>

    <p class="device-scan-message">
        Scanning For Devices On Your Network...
    </p>

    <div class="unclaimed-device-list"></div>

    <p class="device-scan-spinner">
        <img src="/sites/default/files/images/spinners/spinner001.gif">
    </p>

    <hr>

    <div class="device-add-alternative">
        <div class="message">
            Don't see your device here? Add it manually:
        </div>

        <div class="add-device-form">
            <input type="text">
            &nbsp;
            <input type="submit" value="search">
        </div>

        <div>
            The device must be turned on, and connected to a live network to be identified. Retrieve it's 'device id' printed directly on the device, or from it's provided documentation.
        </div>

    </div>

</div>