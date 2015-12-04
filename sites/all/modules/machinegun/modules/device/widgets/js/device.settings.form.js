(function ($) {

    function handle_device_console_log (message) {

        //@TODO: This logic requires a terminal view to be present on the page.
        //right now, the terminal view is provided by the turret workspace.. but it should be moved to the layout instead.  bam.

        $('.terminal-output').append('<div class="terminal-output-line">'+message+'</div>');
        $('.terminal-output').animate({scrollTop: $('.terminal-output').prop("scrollHeight")}, 500);


    }

    function show_discovered_devices_in_modal (device_list) {

        if (Object.keys(device_list).length > 0) {

            for(var device_id in device_list) {

                var device_description = device_list[device_id]['description'];
                var device_name        = device_list[device_id]['title'];

                $('<input type="checkbox" class="device-claimed-checkbox" id="claim_'+device_id+'"><div id="device_'+device_id+'" class="unclaimed-device"><div class="device-name">'+device_name+'</div><div class="device-id">'+device_id+'</div><div class="device-description">'+device_description+'</div></div>').appendTo($('.unclaimed-device-list')).click(function () {
                    console.log(this);
                });

                $('<input id="pair_devices_button" type="button" value="Pair Checked Devices With User Account">').click(function (e) {

                    var device_ids = [];

                    $('.device-claimed-checkbox:checked').each(function (key, value) {

                        device_ids.push($(value).attr('id').substring(6));

                    });

                    claim_devices(device_ids);

                    $device_scan_modal.close();

                }).appendTo($('.unclaimed-device-list'));

            }

        } else {

            $('<div>[No Active Devices Found <a href="#troubleshoot">troubleshoot?</a>]</div>').appendTo($('.unclaimed-device-list'));

        }

        $('.device-scan-message').hide();
        $('.device-scan-spinner').hide();


    }

    function add_claimed_devices_to_page(device_list) {

        //device_list should contain all the things we need to add devices to the page
        //but that would be a lot of work. lets refresh the page instead, since the server takes care of most of this for us.
        //we could build an ajax call to that routine instead... Idunno. just refresh the page for now anyway.

        location.reload();

    }

    function claim_devices (device_list) {

        Drupal.Nodejs.socket.emit('message', {
            type: 'claim_devices',
            devices: device_list
        });

    }

    function release_devices (device_list) {

        if (typeof device_list == 'string') {
            device_list = [device_list];
        }

        Drupal.Nodejs.socket.emit('message', {
            type: 'release_devices',
            devices: device_list
        });

        location.reload();

    }

    $(document).ready(function () {

        var options = {};

        $device_scan_modal = $('[data-remodal-id=device_scan_modal]').remodal(options);

        $('.scan-for-device.action.button').click(function (e) {

            //first, reset the modal.
            $('.unclaimed-device-list').empty();
            $('.device-scan-message').show();
            $('.device-scan-spinner').show();

            $device_scan_modal.open();

            Drupal.Nodejs.socket.emit('message', {messageType:"device_scan"});



        });

        $('.release-device-button').click(function (e) {

            //figure out which device we're trying to release.

            var device_id = $('.release-device-button').attr('id').substring(8);

            release_devices(device_id);

        });

        //handle terminal stuffz0rz
        $('.terminal-input').keypress(function(e) {
            if(e.which == 13) {

                var input_text = $('.terminal-input').val();

                $('.terminal-output').append('<div class="terminal-input-line">'+input_text+'</div>');

                $('.terminal-input').val('');

                //how to get the device id...

                var $device_id = $(this).closest('.workspace-main').attr('id').slice(7,-10);

                Drupal.Nodejs.socket.emit('message', {
                    type: 'console-input',
                    device_id: $device_id,
                    message: input_text
                });

            }
        });

        //process device found message
        Drupal.Nodejs.socket.on('message', function (message) {

            var messageType = message.data.type;
            //@todo: route messages

            switch(messageType) {

                case 'discovered_devices':

                    setTimeout(function () {

                        show_discovered_devices_in_modal(message['data']['devices']);

                    }, 3000);

                    break;

                case 'claimed_devices':

                    add_claimed_devices_to_page(message['data']['devices']);

                    break;
                case 'console-log':

                    handle_device_console_log(message['data']['message']);

                    break;

            }

        });

    })

}(jQuery));