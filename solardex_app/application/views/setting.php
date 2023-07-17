<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content-->
        <div class="header-content header-style-four position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button-->
            <div class="back-button"><a href="#" name="action" onclick="history.back()" type="submit" value="Cancel"><svg width="32" height="32" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                    </svg></a></div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Setting</h6>
            </div>
            <!-- User Profile-->
            <div class="navbar--toggler" id="affanNavbarToggler"><a class="user-profile-trigger-btn" href="#"><img src="<?= base_url() ?>upload/user_foto/user.png" alt=""></a></div>
        </div>
    </div>
</div>

<div class="page-content-wrapper py-3">
    <?php $this->view('messages') ?>
    <div class="container">
        <!-- Setting Card-->
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <p>Setting</p>
                <div class="single-setting-panel">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Active Status</label>
                    </div>
                </div>
                <div class="single-setting-panel">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault2" checked>
                        <label class="form-check-label" for="flexSwitchCheckDefault2">Receive Notification</label>
                    </div>
                </div>
                <div class="single-setting-panel"><a type="button" data-bs-toggle="modal" data-bs-target="#ModalConfirmWiFiManager">
                        <div class="icon-wrapper bg-primary"><i class="fa fa-tasks"></i>
                        </div>IoT WiFi Manager
                    </a>
                </div>
            </div>
        </div>
        <!-- Setting Card-->
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <p>Account</p>
                <div class="single-setting-panel"><a href="<?= base_url() ?>setting/profile">
                        <div class="icon-wrapper bg-success"><svg width="16" height="16" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                        </div>Change Profile
                    </a>
                </div>
            </div>
        </div>
        <!-- Setting Card-->
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Register &amp; Logout</p>
                <?php if ($this->fungsi->user_login()->role == 'admin') { ?>
                    <div class="single-setting-panel"><a href="<?= base_url() ?>auth/user_list">
                            <div class="icon-wrapper bg-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                                </svg>
                            </div>Users Management
                        </a>
                    </div>
                <?php } ?>
                <div class="single-setting-panel"><a href="<?= base_url() ?>auth/logout" id="TombolLogout" onclick="logout()">
                        <div class="icon-wrapper bg-danger"><svg width="16" height="16" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                        </div>Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bottom-align-modal" id="ModalConfirmWiFiManager" tabindex="-1" aria-labelledby="ModalConfirmWiFiManagerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-end">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="ModalConfirmWiFiManagerLabel">WiFi Manager Confirmation</h6>
                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0">1. Disconect from other network</p>
                <p class="mb-0">2. Connect your WiFi to SLDX-WiFi</p>
                <p class="mb-0">3. Click this button below "Go to WiFi Manager"</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <a class="btn btn-sm btn-success" href="http://192.168.4.1">Go to WiFi Manager</a>
            </div>
        </div>
    </div>
</div>

<script>
    function logout() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Warning!",
                text: "Do you want to Logout?",
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
                    window.location = document.getElementById('TombolLogout').href;
                } else {
                    swal("Cancelled", "You stay login :)", "error");
                }
            });
    }
</script>