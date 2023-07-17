<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<!-- Header Area-->
<div class="header-area" id="headerArea">
    <div class="container">
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <div class="back-button"><a href="#" name="action" onclick="history.back()" type="submit" value="Cancel"><svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                    </svg></a></div>
            <div class="page-heading">
                <h6 class="mb-0">Add Battery</h6>
            </div>
            <!-- Navbar Toggler-->
            <div class="navbar--toggler" id="affanNavbarToggler"><span class="d-block"></span><span class="d-block"></span><span class="d-block"></span></div>
        </div>
        <!-- # Header Five Layout End-->
    </div>
</div>

<div class="page-content-wrapper elements-page">

    <div class="card">
        <?php $this->view('messages') ?>
        <div class="card-body p-3">
            <table class="data-table w-100" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Setting</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($get_battery as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->code ?></td>
                            <td style="text-align: center;">
                                <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#DetailBattery" id_battery="<?= $value->id_battery ?>" id_device="<?= $value->id_device ?>" code="<?= $value->code ?>" lowest_voltage="<?= $value->lowest_voltage ?>" highest_voltage="<?= $value->highest_voltage ?>" capacity="<?= $value->capacity ?>">Detail</button>&nbsp;
                                <a class="btn btn-sm btn-info" type="button" data-bs-toggle="modal" data-bs-target="#DataBattery" id_battery="<?= $value->id_battery ?>" code="<?= $value->code ?>" lowest_voltage="<?= $value->lowest_voltage ?>" highest_voltage="<?= $value->highest_voltage ?>" capacity="<?= $value->capacity ?>">Edit
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="add-new-contact-wrap"><a class="shadow bg-success" href="#" data-bs-toggle="modal" data-bs-target="#addBattery"><i class="bi bi-plus"></i></a></div>
</div>

<div class="modal fade" id="addBattery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addBatteryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="addBatteryLabel">Add Battery</h6>
                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>api/battery/add" method="post" id="add_battery">
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-code"></i></span><input class="form-control" type="text" placeholder="Batery Code" aria-label="Recipient's username" id="code" name="code" aria-describedby="basic-addon2" required autofocus><button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#ScanQRCodeBattery" id="tombolscanQR">Click to Scan</button>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-battery-quarter"></i></span><input class="form-control" type="number" step="any" placeholder="Lowest Voltage" aria-label="Recipient's username" id="lowest_voltage" name="lowest_voltage" aria-describedby="basic-addon2" required autofocus><span class="input-group-text" id="basic-addon2">Volt</span>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-battery"></i></span><input class="form-control" type="number" step="any" placeholder="Highest Voltage" aria-label="Recipient's username" id="highest_voltage" name="highest_voltage" aria-describedby="basic-addon2" required autofocus><span class="input-group-text" id="basic-addon2">Volt</span>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-charging-station"></i></span><input class="form-control" type="number" step="any" placeholder="Capacity" aria-label="Recipient's username" id="capacity" name="capacity" aria-describedby="basic-addon2" required autofocus><span class="input-group-text" id="basic-addon2">Ah</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-success" type="submit" form="add_battery">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DataBattery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DataBatteryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="DataBatteryLabel">Edit Battery</h6>
                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>api/battery/edit" method="post" id="edit_battery">
                    <input type="hidden" name="id_battery" id="id_battery">
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-code"></i></span><input class="form-control" type="text" placeholder="Batery Code" aria-label="Recipient's username" id="code" name="code" readonly aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-battery-quarter"></i></span><input class="form-control" type="number" step="any" placeholder="Lowest Voltage" aria-label="Recipient's username" id="lowest_voltage" name="lowest_voltage" aria-describedby="basic-addon2"><span class="input-group-text" id="basic-addon2">Volt</span>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-battery"></i></span><input class="form-control" type="number" step="any" placeholder="Highest Voltage" aria-label="Recipient's username" id="highest_voltage" name="highest_voltage" aria-describedby="basic-addon2"><span class="input-group-text" id="basic-addon2">Volt</span>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-charging-station"></i></span><input class="form-control" type="number" step="any" placeholder="Capacity" aria-label="Recipient's username" id="capacity" name="capacity" aria-describedby="basic-addon2"><span class="input-group-text" id="basic-addon2">Ah</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-sm btn-danger" type="button" id="TombolHapusBattery" onclick="hapus_function()">Delete</a>
                <button class="btn btn-sm btn-success" type="submit" form="edit_battery">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DetailBattery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DetailBatteryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="DetailBatteryLabel">Battery Information</h6>
                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card bg-danger mb-3 shadow-sm bg-gradient direction-rtl" id="card1ON">
                    <div class="card-body">
                        <h2 class="text-white">Warning Status</h2>
                        <p class="text-white mb-4">Your battery is not paired with the IoT device, please pair it first before use this feature!</p><a class="btn btn-warning" href="<?= base_url() ?>page/iot_device">Pair it Now</a>
                    </div>
                </div>
                <div class="price-table-one" id="card2ON">
                    <ul class="nav nav-tabs border-bottom-0 mb-3 align-items-center justify-content-center" id="priceTab" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link shadow active" id="priceTabOne" data-bs-toggle="tab" href="#priceTab_One" role="tab" aria-controls="priceTab_One" aria-selected="false"><i class="bi bi-battery"></i></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link shadow" id="priceTabTwo" data-bs-toggle="tab" href="#priceTab_Two" role="tab" aria-controls="priceTab_Two" aria-selected="true"><i class="bi bi-lightning"></i></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link shadow" id="priceTabThree" data-bs-toggle="tab" href="#priceTab_Three" role="tab" aria-controls="priceTab_Three" aria-selected="false"><i class="bi bi-cpu"></i></a></li>
                    </ul>
                    <div class="tab-content" id="priceTabContent">
                        <div class="tab-pane fade active show" id="priceTab_One" role="tabpanel" aria-labelledby="priceTabOne">
                            <!-- Single Price Table-->
                            <div class="single-price-content shadow-sm p-5">
                                <div class="price"><span class="text-white mb-2">Battery Remaining</span>
                                    <h2 class="display-3" id="BatteryRemaining">100%</h2>
                                </div>
                                <div class="price"><span class="text-white mb-2">Power Remaining</span>
                                    <h2 class="display-3" id="PowerRemaining">1200 Watt</h2>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="priceTab_Two" role="tabpanel" aria-labelledby="priceTabTwo">
                            <!-- Single Price Table-->
                            <div class="single-price-content shadow-sm p-5">
                                <div class="price"><span class="text-white mb-2">Voltage</span>
                                    <h2 class="display-3" id="voltageValue">12.8 V</h2>
                                </div>
                                <div class="price"><span class="text-white mb-2">Current</span>
                                    <h2 class="display-3" id="currentValue">2.5 A</h2>
                                </div>
                                <div class="price"><span class="text-white mb-2">Power</span>
                                    <h2 class="display-3" id="powerValue">26 W</h2>
                                </div>
                                <div class="price"><span class="text-white mb-2">Energy</span>
                                    <h2 class="display-3" id="energyValue">36 Wh</h2>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="priceTab_Three" role="tabpanel" aria-labelledby="priceTabThree">
                            <!-- Single Price Table-->
                            <div class="single-price-content shadow-sm p-5">
                                <div class="price"><span class="text-white mb-0">ID Device</span>
                                    <h2 class="display-3" id="id_device">SLDXW001</h2>
                                </div>
                                <!-- Pricing Desc-->
                                <div class="pricing-desc">
                                    <ul class="ps-0">
                                        <li id="load">Connected to the load</li>
                                        <li id="LastUpdateData">Last Update : </li>
                                        <li id="TotalDataRecord">Total Data Record : </li>
                                        <li id="Latitude">Latitude : </li>
                                        <li id="Longitude">Longitude : </li>
                                    </ul>
                                </div>
                                <div id='map' style="height:200px; border-radius:10px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-danger" type="button" data-bs-dismiss="modal" aria-label="Close">Close</button>
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
                    document.getElementById('code').value = content;
                    $('#ScanQRCodeBattery').modal('hide');
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
                console.log(cameras.length);
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
                    document.getElementById('code').value = content;
                    $('#ScanQRCodeBattery').modal('hide');
                });
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#DataBattery').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;
            var id_battery = $(opener).attr('id_battery');
            var code = $(opener).attr('code');
            var lowest_voltage = $(opener).attr('lowest_voltage');
            var highest_voltage = $(opener).attr('highest_voltage');
            var capacity = $(opener).attr('capacity');

            $('#edit_battery').find('[id="id_battery"]').val(id_battery);
            $('#edit_battery').find('[id="code"]').val(code);
            $('#edit_battery').find('[id="lowest_voltage"]').val(lowest_voltage);
            $('#edit_battery').find('[id="highest_voltage"]').val(highest_voltage);
            $('#edit_battery').find('[id="capacity"]').val(capacity);

            document.getElementById("TombolHapusBattery").href = "<?= base_url() ?>api/battery/delete?id_battery=" + id_battery;
        });
        $('#DetailBattery').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;
            var id_battery = $(opener).attr('id_battery');
            var id_device = $(opener).attr('id_device');
            var code = $(opener).attr('code');
            var lowest_voltage = $(opener).attr('lowest_voltage');
            var highest_voltage = $(opener).attr('highest_voltage');
            var capacity = $(opener).attr('capacity');
            console.log(id_device);
            if (id_device == '') {
                $("#card1ON").show();
                $("#card2ON").hide();
            }
            if (id_device != '') {
                $("#card1ON").hide();
                $("#card2ON").show();
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        const JsonData = this.responseText;
                        const obj = JSON.parse(JsonData);
                        // console.log(JsonData);
                        var tegangan = obj.result[0].tegangan;
                        var arus = obj.result[0].arus;
                        var daya = obj.result[0].daya;
                        var energi = obj.result[0].energi;
                        var Latitude = parseFloat(obj.result[0].latitude);
                        var Longitude = parseFloat(obj.result[0].longitude);
                        var load = obj.load;
                        var TotalDataRecord = obj.total_record;
                        var LastUpdateData = obj.last_update;
                        document.getElementById('id_device').innerHTML = id_device;
                        document.getElementById('voltageValue').innerHTML = tegangan + ' V';
                        document.getElementById('currentValue').innerHTML = arus + ' A';
                        document.getElementById('powerValue').innerHTML = daya + ' W';
                        document.getElementById('energyValue').innerHTML = energi + ' Wh';
                        document.getElementById('LastUpdateData').innerHTML = 'Last Update : ' + LastUpdateData + ' WIB';
                        document.getElementById('TotalDataRecord').innerHTML = 'Total Data Record : ' + TotalDataRecord;
                        document.getElementById('Latitude').innerHTML = 'Latitude : ' + Latitude;
                        document.getElementById('Longitude').innerHTML = 'Longitude : ' + Longitude;
                        if (load == 1) {
                            document.getElementById('load').innerHTML = 'Connected to the load';
                        } else {
                            document.getElementById('load').innerHTML = 'Disconnected from the load';
                        }

                        //perbadingan
                        let BatteryRemaining = (100 * ((highest_voltage - lowest_voltage) - (highest_voltage - tegangan))) / (highest_voltage - lowest_voltage);
                        if (BatteryRemaining >= 100) {
                            BatteryRemaining = 100;
                        }

                        document.getElementById('BatteryRemaining').innerHTML = BatteryRemaining.toFixed(0) + '%';

                        let PowerRemaining = ((capacity * BatteryRemaining) / 100) * tegangan;
                        document.getElementById('PowerRemaining').innerHTML = PowerRemaining.toFixed(0) + ' Watt';

                        if (!Latitude || !Longitude) {
                            document.getElementById('map').innerHTML = '<h4 style="text-align:' + 'center' + '">Location Not Found</h4>';
                            document.getElementById("map").style.height = "20px";
                        } else {
                            const MyDevice = {
                                lat: Latitude,
                                lng: Longitude
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
                    }
                };
                xhttp.open("GET", "<?= base_url() ?>api/battery/information?id_device=" + id_device);
                xhttp.send();
            }
        });
    });

    function hapus_function() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Warning!",
                text: "Do you realy want to delete this Battery?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, i do",
                cancelButtonText: "Cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    window.location = document.getElementById('TombolHapusBattery').href;
                } else {
                    swal("Cancelled", "This Battery Still Exist :)", "error");
                }
            });
    }
</script>