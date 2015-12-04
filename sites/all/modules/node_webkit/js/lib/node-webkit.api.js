(function ($) {
    $(document).ready(function () {
        if (typeof require === 'undefined' || require === null) {

            alert('this page can not be viewed in a regular web browser! (todo: supply a link to our app here)');

        } else {

            var turret = parent.turret = require('turret.api')('node-webkit.adapter');
            var socket = turret.network.connect();

            socket.on('user_profile_updated', function (profileData) {

                Drupal.user.profile = profileData;

            });

            if (Drupal.settings.user) {

                socket.emit('update_user_profile', {
                    gateway_ip: 'null',
                    gateway_mac: 'null'
                });

            } else {

                //app.view('login').show();

            }

            //turret.device.get_media_devices(function (err, drives) {

            //    console.log(err||drives);

            //});

            //turret.network.getGatewayMac(function (error, mac) {

            //});

        }
    });

})(jQuery);

