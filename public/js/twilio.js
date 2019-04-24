﻿$(function () {
    var speakerDevices = document.getElementById('speaker-devices');
    var ringtoneDevices = document.getElementById('ringtone-devices');
    var outputVolumeBar = document.getElementById('output-volume');
    var inputVolumeBar = document.getElementById('input-volume');
    var volumeIndicators = document.getElementById('volume-indicators');

    var device;

    log('Iniciando dialer...');
    $.getJSON('https://dandelion-wombat-5999.twil.io/capability-token')
        .then(function (data) {
            log('Contactando a la nasa.');
            console.log('Token: ' + data.token);

            // Setup Twilio.Device
            device = new Twilio.Device(data.token, {
                // Set Opus as our preferred codec. Opus generally performs better, requiring less bandwidth and
                // providing better audio quality in restrained network conditions. Opus will be default in 2.0.
                codecPreferences: ['opus', 'pcmu'],
                // Use fake DTMF tones client-side. Real tones are still sent to the other end of the call,
                // but the client-side DTMF tones are fake. This prevents the local mic capturing the DTMF tone
                // a second time and sending the tone twice. This will be default in 2.0.
                fakeLocalDTMF: true,
            });

            device.on('ready', function (device) {
                log('Dialer Listo!');
                document.getElementById('call-controls').style.display = 'block';

            });

            device.on('error', function (error) {
                log('Twilio.Device Error: ' + error.message);
            });

            device.on('connect', function (conn) {
                log('Llamada establecida!');
                document.getElementById('button-call').style.display = 'none';
                document.getElementById('button-hangup').style.display = 'inline';
                document.getElementById('button-stop').style.display = 'inline';
                document.getElementById('ins').style.display = 'none';
                volumeIndicators.style.display = 'block';
                bindVolumeIndicators(conn);

            });

            device.on('disconnect', function (conn) {
                log('Llamada finalizada.');
                volumeIndicators.style.display = 'none';
                // Call our ajax endpoint on the server to initialize the phone call
                $.ajax({
                    url: '/api/contact/status',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        contactid: $('#contactid').val(),
                        estatus: $('#estatus').val(),
                    }
                }).done(function (data) {
                    $("#tabla").load(" #tabla");
                }).fail(function (error) {
                    $("#tabla").load(" #tabla");
                });
                log('Buscando siguiente llamada...');
                var params = {
                    To: document.getElementById('phone-number').value
                };
                console.log('Calling ' + params.To + '...');
                log('Calling ' + params.To + '...');
                document.getElementById('callerid').placeholder = params.To;
                if (device) {
                    device.connect(params);
                }


            });


            device.on('incoming', function (conn) {
                log('Incoming connection from ' + conn.parameters.From);
                var archEnemyPhoneNumber = '+12093373517';

                if (conn.parameters.From === archEnemyPhoneNumber) {
                    conn.reject();
                    log('It\'s your nemesis. Rejected call.');
                } else {
                    // accept the incoming connection and start two-way audio
                    conn.accept();
                }
            });

            setClientNameUI(data.identity);

            device.audio.on('deviceChange', updateAllDevices.bind(device));

            // Show audio selection UI if it is supported by the browser.
            if (device.audio.isOutputSelectionSupported) {
                document.getElementById('output-selection').style.display = 'block';
            }
        })
        .catch(function (err) {
            console.log(err);
            log('');
        });

    // Bind button to make call
    document.getElementById('button-call').onclick = function () {
        // get the phone number to connect the call to
        var params = {
            To: document.getElementById('phone-number').value
        };

        console.log('Calling ' + params.To + '...');
        if (device) {
            device.connect(params);
            device.disconnectAll();
        }
    };

    // Bind button to hangup call
    document.getElementById('button-hangup').onclick = function () {
        log('Hanging up...');
        if (device) {
            device.disconnectAll();
        }
    };

    document.getElementById('get-devices').onclick = function () {
        navigator.mediaDevices.getUserMedia({audio: true})
            .then(updateAllDevices.bind(device));
    }

    speakerDevices.addEventListener('change', function () {
        var selectedDevices = [].slice.call(speakerDevices.children)
            .filter(function (node) {
                return node.selected;
            })
            .map(function (node) {
                return node.getAttribute('data-id');
            });

        device.audio.speakerDevices.set(selectedDevices);
    });

    ringtoneDevices.addEventListener('change', function () {
        var selectedDevices = [].slice.call(ringtoneDevices.children)
            .filter(function (node) {
                return node.selected;
            })
            .map(function (node) {
                return node.getAttribute('data-id');
            });

        device.audio.ringtoneDevices.set(selectedDevices);
    });

    function bindVolumeIndicators(connection) {
        connection.on('volume', function (inputVolume, outputVolume) {
            var inputColor = 'red';
            if (inputVolume < .50) {
                inputColor = 'green';
            } else if (inputVolume < .75) {
                inputColor = 'yellow';
            }

            inputVolumeBar.style.width = Math.floor(inputVolume * 300) + 'px';
            inputVolumeBar.style.background = inputColor;

            var outputColor = 'red';
            if (outputVolume < .50) {
                outputColor = 'green';
            } else if (outputVolume < .75) {
                outputColor = 'yellow';
            }

            outputVolumeBar.style.width = Math.floor(outputVolume * 300) + 'px';
            outputVolumeBar.style.background = outputColor;
        });
    }

    function updateAllDevices() {
        updateDevices(speakerDevices, device.audio.speakerDevices.get());
        updateDevices(ringtoneDevices, device.audio.ringtoneDevices.get());


        // updateDevices(speakerDevices, );
        // updateDevices(ringtoneDevices, device);
    }

    // Update the available ringtone and speaker devices
    function updateDevices(selectEl, selectedDevices) {
        selectEl.innerHTML = '';

        device.audio.availableOutputDevices.forEach(function (device, id) {
            var isActive = (selectedDevices.size === 0 && id === 'default');
            selectedDevices.forEach(function (device) {
                if (device.deviceId === id) {
                    isActive = true;
                }
            });

            var option = document.createElement('option');
            option.label = device.label;
            option.setAttribute('data-id', id);
            if (isActive) {
                option.setAttribute('selected', 'selected');
            }
            selectEl.appendChild(option);
        });
    }

    // Activity log
    function log(message) {
        var logDiv = document.getElementById('log');
        logDiv.innerHTML += '<p>&gt;&nbsp;' + message + '</p>';
        logDiv.scrollTop = logDiv.scrollHeight;
    }

    // Set the client name in the UI
    function setClientNameUI(clientName) {
        var div = document.getElementById('client-name');
        div.innerHTML = 'Your client name: <strong>' + clientName +
            '</strong>';
    }
});
