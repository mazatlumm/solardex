<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<!-- Header Area-->
<div class="header-area" id="headerArea">
    <div class="container">
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <div class="back-button"><a href="#" name="action" onclick="history.back()" type="submit" value="Cancel"><svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                    </svg></a></div>
            <div class="page-heading">
                <h6 class="mb-0">IoT Device</h6>
            </div>
            <!-- Navbar Toggler-->
            <div class="navbar--toggler" id="affanNavbarToggler"><span class="d-block"></span><span class="d-block"></span><span class="d-block"></span></div>
        </div>
        <!-- # Header Five Layout End-->
    </div>
</div>

<div class="page-content-wrapper elements-page py-2">
    <div class="container">
        <div class="input-group mb-2">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
            <input type="text" id="myInput" value="" onkeyup="buttonUp();" class="form-control" placeholder="Search Device">
        </div>
        <?php $this->view('messages') ?>
        <?php foreach ($control_device as $key => $value) {
            $this->db->order_by('id', 'desc');
            $get_sensor_device = $this->db->get_where('sensor_device', ['id_device' => $value->id_device])->result_array();
            if ($get_sensor_device) {
                $last_update = $get_sensor_device[0]['created'];
            } else {
                $last_update = "No Update";
            }

            $this->db->order_by('id', 'desc');
            $get_location = $this->db->get_where('sensor_device', ['id_device' => $value->id_device, 'latitude !=' => null, 'longitude !=' => null])->result_array();
            if ($get_location) {
                $latitude = $get_location[0]['latitude'];
                $longitude = $get_location[0]['longitude'];
            } else {
                $latitude = "No Latitude";
                $longitude = "No Longitude";
            }

            $get_battery = $this->db->get_where('battery', ['id_device' => $value->id_device])->result_array();
            if ($get_battery) {
                $battery_code = $get_battery[0]['code'];
            } else {
                $battery_code = "Not Pairing";
            }

            if ($battery_code == "Not Pairing") {
                $bg_timeline = "bg-danger";
            } else {
                $bg_timeline = "bg-success";
            }
        ?>
            <div class="card timeline-card <?= $bg_timeline ?>" style="position: relative;" id="TimeLineCard<?= $value->id_device ?>">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="timeline-text">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#ModalDetailDeviceIoT" latitude='<?= $latitude ?>' longitude='<?= $longitude ?>' id_device="<?= $value->id_device ?>" battery_code="<?= $battery_code ?>">
                                <h6><?= $value->id_device ?></h6>
                                <?php if ($value->status == 1) { ?>
                                    <p style="margin:0" id="statusLoad<?= $value->id_device ?>"><i class="fa fa-info-circle"></i>&nbsp; Connected to the load</p>
                                <?php } else { ?>
                                    <p style="margin:0" id="statusLoad<?= $value->id_device ?>"><i class="fa fa-info-circle"></i>&nbsp; Not connected to the load</p>
                                <?php } ?>
                                <p style="margin:0" id="batteryCodeStatus<?= $value->id_device ?>"><i class="fa fa-battery"></i>&nbsp; Battery Code : <?= $battery_code ?></p>
                                <p style="margin:0"><i class="fa fa-edit"></i>&nbsp; Last Update : <?= date('Y-m-d H:i', strtotime($last_update)) ?></p>
                                <p style="margin:0"><i class="fa fa-calculator"></i>&nbsp; Total Data Record : <?= number_formating(count($get_sensor_device)) ?></p>
                        </div>
                        <div class="timeline-icon mb-0">
                            <svg id="filled_outline" height="50" viewBox="0 0 512 512" width="50" xmlns="https://www.w3.org/2000/svg" data-name="filled outline">
                                <path d="m48 112h392v320h-392z" fill="#02c26a" />
                                <path d="m24 80h48v88h-48z" fill="#ffc431" />
                                <path d="m72 96h72v56h-72z" fill="#ffa100" />
                                <path d="m312 216h32v32h-32z" fill="#718799" />
                                <path d="m344 216h32v32h-32z" fill="#62798c" />
                                <path d="m88 296h32v32h-32z" fill="#718799" />
                                <path d="m120 296h32v32h-32z" fill="#62798c" />
                                <path d="m88 360h32v32h-32z" fill="#718799" />
                                <path d="m120 360h32v32h-32z" fill="#62798c" />
                                <path d="m280 328h32v32h-32z" fill="#62798c" transform="matrix(0 1 -1 0 640 48)" />
                                <path d="m280 360h32v32h-32z" fill="#4b6275" transform="matrix(0 1 -1 0 672 80)" />
                                <path d="m312 328h32v32h-32z" fill="#718799" transform="matrix(0 1 -1 0 672 16)" />
                                <path d="m312 360h32v32h-32z" fill="#556c80" transform="matrix(0 1 -1 0 704 48)" />
                                <circle cx="112" cy="232" fill="#3cde8d" r="32" />
                                <path d="m192 208h64v48h-64z" fill="#ffc431" />
                                <path d="m416 328h80v64h-80z" fill="#ffc431" />
                                <path d="m192 144h16v16h-16z" />
                                <path d="m224 144h16v16h-16z" />
                                <path d="m256 144h16v16h-16z" />
                                <path d="m288 144h16v16h-16z" />
                                <path d="m344 320h-8v-64h40a8.00039 8.00039 0 0 0 8-8v-32a8.00039 8.00039 0 0 0 -8-8h-64a8.00039 8.00039 0 0 0 -8 8v32a8.00039 8.00039 0 0 0 8 8h8v64h-40a8.00039 8.00039 0 0 0 -8 8v40h-56v-24a40.04584 40.04584 0 0 0 -40-40h-16v-8a8.00039 8.00039 0 0 0 -8-8h-64a8.00039 8.00039 0 0 0 -8 8v32a8.00039 8.00039 0 0 0 8 8h64a8.00039 8.00039 0 0 0 8-8v-8h16a24.0275 24.0275 0 0 1 24 24v24h-40v-8a8.00039 8.00039 0 0 0 -8-8h-64a8.00039 8.00039 0 0 0 -8 8v32a8.00039 8.00039 0 0 0 8 8h64a8.00039 8.00039 0 0 0 8-8v-8h112v8a8.00039 8.00039 0 0 0 8 8h64a8.00039 8.00039 0 0 0 8-8v-64a8.00039 8.00039 0 0 0 -8-8zm8-96h16v16h-16zm-240 96h-16v-16h16zm32 0h-16v-16h16zm-32 64h-16v-16h16zm32 0h-16v-16h16zm160 0h-16v-16h16zm0-32h-16v-16h16zm16-128h16v16h-16zm16 160h-16v-16h16zm0-32h-16v-16h16z" />
                                <path d="m112 272a40 40 0 1 0 -40-40 40.04584 40.04584 0 0 0 40 40zm0-64a24 24 0 1 1 -24 24 24.0275 24.0275 0 0 1 24-24z" />
                                <path d="m184 256a8.00039 8.00039 0 0 0 8 8h8v16h16v-16h16v16h16v-16h8a8.00039 8.00039 0 0 0 8-8v-16h16v-16h-16v-16a8.00039 8.00039 0 0 0 -8-8h-8v-16h-16v16h-16v-16h-16v16h-8a8.00039 8.00039 0 0 0 -8 8v16h-16v16h16zm16-40h48v32h-48z" />
                                <path d="m496 320h-48v-208a8.00039 8.00039 0 0 0 -8-8h-288v-8a8.00039 8.00039 0 0 0 -8-8h-64v-8a8.00039 8.00039 0 0 0 -8-8h-48a8.00039 8.00039 0 0 0 -8 8v88a8.00039 8.00039 0 0 0 8 8h16v256a8.00039 8.00039 0 0 0 8 8h392a8.00039 8.00039 0 0 0 8-8v-32h48a8.00039 8.00039 0 0 0 8-8v-64a8.00039 8.00039 0 0 0 -8-8zm-416-216h56v40h-56zm-48 56v-72h32v72zm400 264h-376v-248h16a8.00039 8.00039 0 0 0 8-8v-8h64a8.00039 8.00039 0 0 0 8-8v-32h280v200h-56v16h32v16h-32v16h32v16h-32v16h56zm-6.24585-40h-1.75415v-48h13.75415zm32 0h-15.5083l12-48h15.5083zm30.24585 0h-13.75415l12-48h1.75415z" />
                            </svg>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="modal fade" id="ModalDetailDeviceIoT" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalDetailDeviceIoTLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="ModalDetailDeviceIoTLabel">Detail Device</h6>
                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close" onclick="resetFunctionLocation()"></button>
            </div>
            <div class="modal-body">
                <div class="accordion" id="basicaccordion">
                    <!-- Single accordion-->
                    <div class="accordion-item">
                        <div class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Device Location</button>
                        </div>
                        <div class="accordion-collapse collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#basicaccordion">
                            <div class="accordion-body">
                                <div id='map' style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Single accordion-->
                    <div class="accordion-item">
                        <div class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Master Control</button>
                        </div>
                        <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#basicaccordion">
                            <div class="accordion-body">
                                <p class="mb-2">Hello, in this menu you can turn ON/OFF the load with this button.</p>
                                <div id="ButtonControl" class="mb-2">
                                </div>
                                <p class="mb-2">If you want to reset The Energy, just press this button below.</p>
                                <div id="ButtonResetEnergy">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single accordion-->
                    <div class="accordion-item">
                        <div class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Pair to Battery</button>
                        </div>
                        <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#basicaccordion">
                            <div class="accordion-body">
                                <p class="mb-2">Please select your Battery Code or Scan The QR-Code.</p>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-qrcode"></i></span>
                                    <select type="text" class="form-control" id="battery_code">
                                        <option value="">- Battery Code -</option>
                                    </select><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ScanQRCodeBattery" id="tombolscanQR">Scan &nbsp;<i class="fa fa-search" style="font-size: 10px;"></i></button>
                                </div>
                                <button class="btn btn-danger w-100 mt-3" onclick="unpair()">Unpair (Battery & Device IoT)</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ScanQRCodeBattery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ScanQRCodeBatteryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="ScanQRCodeBatteryLabel">QR Code Scanner</h6>
                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <video id="preview" width="100%" height="100%"></video>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/instascan.min.js"></script>

<?php
$get_google_api = $this->db->get_where('google_map')->result_array();
if ($get_google_api) {
    $api_key = $get_google_api[0]['api_key'];
} else {
    $api_key = null;
}
?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?= $api_key ?>&v=weekly"></script>

<script>
    var id_device = "";
    var battery_code_data = "";
    $(document).ready(function() {
        getDataSelectBatteryCode();
        $('#ModalDetailDeviceIoT').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;
            var latitude = parseFloat($(opener).attr('latitude'));
            var longitude = parseFloat($(opener).attr('longitude'));
            id_device = $(opener).attr('id_device');

            const xhttpai = new XMLHttpRequest();
            xhttpai.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const JsonData = this.responseText;
                    const obj = JSON.parse(JsonData);
                    battery_code_data = obj.battery_code;
                    console.log('MyIdDevice: ' + id_device);
                    console.log('BatteryCode: ' + battery_code_data);

                    document.getElementById('battery_code').innerHTML = '<option value="">- Battery Code -</option>';
                    getDataSelectBatteryCode();
                }
            };
            xhttpai.open("GET", "<?= base_url() ?>api/pairing/status?id_device=" + id_device);
            xhttpai.send();

            //cek status button
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const JsonData = this.responseText;
                    const obj = JSON.parse(JsonData);
                    var statusRelay = obj.result[0].status;
                    var ResetCode = obj.result[0].reset_code;
                    var nomorIdDevice = obj.result[0].id_device;
                    if (statusRelay == '1') {
                        document.getElementById('ButtonControl').innerHTML = '<button class="btn btn-danger w-100" id="TurnOff" onclick="ControlDevice(\'' + nomorIdDevice + '\',0)">Turn OFF The Load</button>';
                    }
                    if (statusRelay == '0') {
                        document.getElementById('ButtonControl').innerHTML = '<button class="btn btn-success w-100" id="TurnOn" onclick="ControlDevice(\'' + nomorIdDevice + '\',1)">Turn ON The Load</button>';
                    }

                    if (ResetCode == 404 || ResetCode == null || ResetCode == '' || ResetCode == 200) {
                        document.getElementById('ButtonResetEnergy').innerHTML = '<button class="btn btn-primary w-100" id="TurnOn" onclick="ResetEnergyDevice(\'' + nomorIdDevice + '\',1)">Reset The Energy</button>';
                    } else {
                        document.getElementById('ButtonResetEnergy').innerHTML = '<button class="btn btn-success w-100" id="TurnOn" onclick="ResetEnergyDevice(\'' + nomorIdDevice + '\',1)">The Energy Already Reset</button>';
                    }

                }
            };
            xhttp.open("GET", "<?= base_url() ?>api/control/status?id_device=" + id_device);
            xhttp.send();

            if (!latitude || !longitude) {
                document.getElementById('map').innerHTML = '<h4 style="text-align:' + 'center' + '">Location Not Found</h4>';
                document.getElementById("map").style.height = "20px";
            } else {
                const MyDevice = {
                    lat: latitude,
                    lng: longitude
                };
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 12,
                    center: MyDevice,
                });
                const contentString =
                    '<div id="content">' +
                    '<div id="siteNotice">' +
                    "</div>" +
                    '<h3 id="firstHeading" class="firstHeading">' + id_device + '</h3>' +
                    '<div id="bodyContent">' +
                    "</div>" +
                    "</div>";
                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                });
                const marker = new google.maps.Marker({
                    position: MyDevice,
                    map,
                    title: id_device,
                });
                marker.addListener("click", () => {
                    infowindow.open({
                        anchor: marker,
                        map,
                        shouldFocus: false,
                    });
                });
            }
        });
    });

    function resetFunctionLocation() {
        latitude = null;
        longitude = null;
        document.getElementById("map").style.height = "300px";
    }

    function ControlDevice(nomorIdDevice, RelayValue) {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const JsonData = this.responseText;
                const obj = JSON.parse(JsonData);
                var status = obj.status;
                if (status == true && RelayValue == '1') {
                    document.getElementById('ButtonControl').innerHTML = '<button class="btn btn-danger w-100" id="TurnOff" onclick="ControlDevice(\'' + nomorIdDevice + '\',0)">Turn OFF The Load</button>';
                    document.getElementById('statusLoad' + nomorIdDevice).innerHTML = '<i class="fa fa-info-circle"></i>&nbsp; Connected to the load';
                }
                if (status == true && RelayValue == '0') {
                    document.getElementById('ButtonControl').innerHTML = '<button class="btn btn-success w-100" id="TurnOn" onclick="ControlDevice(\'' + nomorIdDevice + '\',1)">Turn ON The Load</button>';
                    document.getElementById('statusLoad' + nomorIdDevice).innerHTML = '<i class="fa fa-info-circle"></i>&nbsp; Not connected to the load';
                }
            }
        };
        xhttp.open("GET", "<?= base_url() ?>api/control?id_device=" + nomorIdDevice + "&status=" + RelayValue);
        xhttp.send();
    }

    function ResetEnergyDevice(nomorIdDevice, reset_code) {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const JsonData = this.responseText;
                const obj = JSON.parse(JsonData);
                var status = obj.status;
                if (status == true && reset_code == '1') {
                    document.getElementById('ButtonResetEnergy').innerHTML = '<button class="btn btn-success w-100" onclick="ResetEnergyDevice(\'' + nomorIdDevice + '\',0)">Resetting The Energy</button>';
                }
                if (status == true && reset_code == '' || reset_code == null || reset_code == 404 || reset_code == 200) {
                    document.getElementById('ButtonResetEnergy').innerHTML = '<button class="btn btn-primary w-100" onclick="ResetEnergyDevice(\'' + nomorIdDevice + '\',1)">Reset The Energy</button>';
                }
            }
        };
        xhttp.open("GET", "<?= base_url() ?>api/control/reset_energy?id_device=" + nomorIdDevice + "&reset=" + reset_code);
        xhttp.send();
    }
</script>

<script>
    function getDataSelectBatteryCode() {
        var ControlDeviceIoT = {
            init: function() {
                var that = this;
                this.load_control_device();
            },
            load_control_device: function() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '<?= base_url('api/control/device') ?>', true);
                xhr.onload = function() {
                    var battery_code = JSON.parse(xhr.responseText);
                    battery_code.forEach(function(value) {
                        var op = document.createElement('option');
                        op.innerText = value.code;
                        op.setAttribute('value', value.code);
                        document.getElementById('battery_code').appendChild(op);
                        if (battery_code_data == "Not Pairing") {
                            document.getElementById('battery_code').value = "";
                        } else {
                            document.getElementById('battery_code').value = battery_code_data;
                        }
                    });
                }
                xhr.send();
            },
        }
        ControlDeviceIoT.init();
    }
</script>

<script>
    var buttonUp = () => {
        const input = document.querySelector("#myInput");
        const cards = document.getElementsByClassName("card");
        let filter = input.value.toLowerCase()
        for (let i = 0; i < cards.length; i++) {
            let title = cards[i].querySelector(".card-body");

            if (title.innerText.toLowerCase().indexOf(filter) > -1) {
                cards[i].classList.remove("d-none")
            } else {
                cards[i].classList.add("d-none")
            }
        }
    }
</script>

<script type="text/javascript">
    var countcam = 0;
    $(document).on("click", "#tombolscanQR", function() {

        if (countcam == 0) {
            var constraints = {
                video: {
                    width: 800,
                    height: 800
                }
            };

            navigator.mediaDevices.getUserMedia(constraints)
                .then(function(mediaStream) {
                    var video = document.querySelector('video');
                    video.srcObject = mediaStream;
                    video.onloadedmetadata = function(e) {
                        video.play();
                    };
                })
                .catch(function(err) {
                    console.log(err.name + ": " + err.message);
                });

            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview'),
                mirror: false
            });
            scanner.addListener('scan', function(content) {
                console.log('Qrcode: ' + content);
                swal({
                    title: "Success!",
                    text: content,
                    type: "success"
                }, function() {
                    document.getElementById('battery_code').value = content;
                    $('#ScanQRCodeBattery').modal('hide');

                    //Send the API
                    const xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log(this.responseText);
                            const JsonData = this.responseText;
                            const obj = JSON.parse(JsonData);
                            var message = obj.message;
                            var id_duplicate = obj.id_duplicate;
                            if (message == "pair") {
                                document.getElementById('TimeLineCard' + id_device).className = 'card timeline-card bg-success';
                                document.getElementById('batteryCodeStatus' + id_device).innerHTML = '<i class="fa fa-battery"></i>&nbsp; Battery Code : ' + content;
                                battery_code_data = content;
                            }
                            if (message == "duplicate") {
                                swal({
                                    title: "Warning!",
                                    text: "This battery is connected to " + id_duplicate + '. Please Unpair it!',
                                    type: "warning"
                                }, function() {
                                    $('#ScanQRCodeBattery').modal('hide');
                                })
                            }

                        }
                    };
                    xhttp.open("GET", "<?= base_url() ?>api/pairing?id_device=" + id_device + "&battery_code=" + content);
                    xhttp.send();
                })
            });
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 1) {
                    scanner.start(cameras[1]);
                    console.log('Kamera Belakang');
                } else if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                    console.log('Kamera Depan');
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });
            countcam = 1;
        } else {
            scanner.addListener('scan', function(content) {
                console.log('Qrcode: ' + content);
                swal({
                    title: "Success!",
                    text: content,
                    type: "success"
                }, function() {
                    document.getElementById('battery_code').value = content;
                    $('#ScanQRCodeBattery').modal('hide');

                    //Send the API
                    const xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            console.log(this.responseText);
                            const JsonData = this.responseText;
                            const obj = JSON.parse(JsonData);
                            var message = obj.message;
                            var id_duplicate = obj.id_duplicate;
                            if (message == "pair") {
                                document.getElementById('TimeLineCard' + id_device).className = 'card timeline-card bg-success';
                                document.getElementById('batteryCodeStatus' + id_device).innerHTML = '<i class="fa fa-battery"></i>&nbsp; Battery Code : ' + content;
                                battery_code_data = content;
                            }
                            if (message == "duplicate") {
                                swal({
                                    title: "Warning!",
                                    text: "This battery is connected to " + id_duplicate + '. Please Unpair it!',
                                    type: "warning"
                                }, function() {
                                    $('#ScanQRCodeBattery').modal('hide');
                                })
                            }

                        }
                    };
                    xhttp.open("GET", "<?= base_url() ?>api/pairing?id_device=" + id_device + "&battery_code=" + content);
                    xhttp.send();
                });
            });
        }
    });
</script>

<script>
    function unpair() {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const JsonData = this.responseText;
                const obj = JSON.parse(JsonData);
                var message = obj.message;
                if (message == "unpair") {
                    document.getElementById('TimeLineCard' + id_device).className = 'card timeline-card bg-danger';
                    document.getElementById('battery_code').value = "";
                    document.getElementById('batteryCodeStatus' + id_device).innerHTML = '<i class="fa fa-battery"></i>&nbsp; Battery Code : Not Pairing';
                }
            }
        };
        xhttp.open("GET", "<?= base_url() ?>api/pairing/break?&battery_code=" + battery_code_data);
        xhttp.send();
    }
</script>