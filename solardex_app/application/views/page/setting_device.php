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
                <h6 class="mb-0">IoT Device WiFi Manager</h6>
            </div>
            <!-- Navbar Toggler-->
            <div class="navbar--toggler" id="affanNavbarToggler"><span class="d-block"></span><span class="d-block"></span><span class="d-block"></span></div>
        </div>
        <!-- # Header Five Layout End-->
    </div>
</div>

<div class="page-content-wrapper elements-page">
    <div class="container pt-3">
        <div class="card bg-primary">
            <div class="card-body p-3">
                <svg width="48" height="48" viewBox="0 0 16 16" class="bi bi-cpu text-white mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                </svg>
                <h2 class="text-white">WiFi Manager</h2>
                <p class="text-white mb-0">Before use this feature, you have to connect your smartphone to the Acces Point of the IoT device like "SLDX-xxx", please select your id device correctly.</p>
                <br>
                <table class="table mb-0" id="listWiFi" style="color:white">
                </table>
                <div class="input-group pt-2">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-wifi"></i></span>
                    <!-- <select class="form-control" id="ssid" placeholder="SSID">
                        <option value="">- Pilih WiFi -</option>
                    </select> -->
                    <input type="text" id="ssid" class="form-control" placeholder="SSID">
                </div>
                <div class="input-group pt-2">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i>&nbsp;&nbsp;</span>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                    <span class="input-group-text MataPassword" id="basic-addon2">
                        <i class="fa fa-eye-slash" id="MataPassword"></i>
                    </span>
                </div>

                <div class="alert custom-alert-1 shadow-sm alert-success alert-dismissible fade show mt-3" id="SuccessMessage" role="alert">
                    <svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                    </svg>
                    <p class="text-white mb-0">Your IoT Device is Connected to WiFi.</p>
                    <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <div class="alert custom-alert-1 shadow-sm alert-light alert-dismissible fade show mt-3" id="FailMessage" role="alert">
                    <svg width="20" height="20" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                    <p class="text-white mb-0">Your IoT Device is not Connected to WiFi!</p>
                    <button class="btn btn-close position-relative p-1 ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <button class="btn btn-danger btn-lg w-100 mt-2" onclick="SaveCredential()">Save Setting!</button>
                <p class="text-white mb-0 mt-2 mb-2" id="MessageComunicate">Click this button below to test your connection between your smartphone and IoT device.</p>
                <button class="btn btn-secondary btn-lg w-100" onclick="TestConnection()">Test Your Connection &nbsp; <i class="fa fa-wifi"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DeviceResponses" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DeviceResponsesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="circle-loader">
            <div class="circle-big"></div>
        </div>
    </div>
</div>

<script>
    function SaveCredential() {
        var ssid = document.getElementById('ssid').value;
        var password = document.getElementById('password').value;
        $("#DeviceResponses").modal("show");

        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var messageDevice = this.responseText;
                console.log(messageDevice);
                if (messageDevice == 'success') {
                    $("#SuccessMessage").show();
                    setTimeout(function() {
                        $("#DeviceResponses").modal("hide");
                        console.log('Hide Loader');
                    }, 1000);
                    return;
                } else {
                    $("#FailMessage").show();
                    setTimeout(function() {
                        $("#DeviceResponses").modal("hide");
                        console.log('Hide Loader');
                    }, 1000);
                    return;
                }
            } else {
                setTimeout(function() {
                    $("#DeviceResponses").modal("hide");
                    console.log('Hide Loader');
                }, 5000);
            }
        };
        xhttp.open("GET", "http://192.168.4.1/?ssid=" + ssid + '&pass=' + password);
        xhttp.send();
    }
    var StartingPage = 0;
    var ConnectedDevice = 0;

    function TestConnection() {
        $("#DeviceResponses").modal("show");
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var messageDevice = this.responseText;
                console.log(messageDevice);
                $("#DeviceResponses").modal("hide");
                if (messageDevice == '') {
                    document.getElementById('MessageComunicate').innerHTML = 'Your smartphone is not connected to IoT device!';
                    setTimeout(function() {
                        $("#DeviceResponses").modal("hide");
                        console.log('Hide Loader');
                    }, 1000);
                }
                if (messageDevice != '') {
                    document.getElementById('MessageComunicate').innerHTML = 'Your smartphone is connected to IoT device, Lets configure your WiFi';
                    setTimeout(function() {
                        $("#DeviceResponses").modal("hide");
                        console.log('Hide Loader');
                    }, 1000);
                    ConnectedDevice = 1;
                    StartingPage = 1;
                } else {
                    document.getElementById('MessageComunicate').innerHTML = 'Your smartphone is not connected to IoT device!';
                    setTimeout(function() {
                        $("#DeviceResponses").modal("hide");
                        console.log('Hide Loader');
                    }, 1000);
                }
            } else {
                document.getElementById('MessageComunicate').innerHTML = 'Your smartphone is not connected to IoT device!';
                setTimeout(function() {
                    $("#DeviceResponses").modal("hide");
                    console.log('Hide Loader');
                }, 1000);
            }
        };
        xhttp.open("GET", "http://192.168.4.1/?pesan=hai");
        xhttp.send();
    }

    if (ConnectedDevice != 1 && StartingPage != 0) {
        setTimeout(function() {
            $("#DeviceResponses").modal("hide");
            console.log('Hide Loader');
            document.getElementById('MessageComunicate').innerHTML = 'Your smartphone is not connected to IoT device!';
        }, 1000);
    }
</script>

<script type="text/javascript">
    var statePassword = 0;
    $(document).ready(function() {
        $("#SuccessMessage").hide();
        $("#FailMessage").hide();
        $(".MataPassword").click(function() {
            if (statePassword == 0) {
                $(".MataPassword").html('<i class= "fa fa-eye"></i>');
                statePassword = 1;
                $('#password').get(0).type = 'text';
                return
            }
            if (statePassword == 1) {
                $(".MataPassword").html('<i class= "fa fa-eye-slash"></i>');
                statePassword = 0;
                $('#password').get(0).type = 'password';
                return
            }
        });
    });
</script>