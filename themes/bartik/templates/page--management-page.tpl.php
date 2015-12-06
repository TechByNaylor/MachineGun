<?php

    $accordion_items = array_map(function ($device) {
            return [
                'label'   => $device->title,
                'id'      => $device->field_device_id['und'][0]['value'],
                'content' => theme_render_template(path_to_theme().'/templates/widget--device-details.tpl.php', ['device' => $device])
            ];
        }, $devices);

?>

<div id="management-page-wrapper">
    <div id="management-page">

        <?php if ($messages): ?>
            <div id="messages">
                <div class="section clearfix">
                    <?php print $messages; ?>
                </div>
            </div> <!-- /.section, /#messages -->
        <?php endif; ?>

        <div id="management-main-wrapper" class="clearfix">

            <div id="management-main" class="clearfix">

                <div id="management-content">

                    <div class="device-section">

                        <?= theme_render_template(

                            path_to_theme() . '/templates/widget--accordion.tpl.php',
                            [
                                'items' => $accordion_items,
                                'footer' => '<div class="scan-for-device action button">Scan For Devices</div>'
                            ]
                        ); ?>

                    </div>

                    <div class="workspace-section">

                        <?= theme_render_template(
                            path_to_theme() . '/templates/widget--manage-devices.tpl.php',
                            [
                                'devices' => $devices,
                                'user'    => $user
                            ]
                        ) ?>

                    </div>

                </div>
                <!-- /.section, /#content -->

            </div>

        </div>
        <!-- /#main, /#main-wrapper -->

    </div>
    <!-- /.section, /#footer-wrapper -->

</div> <!-- /#page, /#page-wrapper -->
