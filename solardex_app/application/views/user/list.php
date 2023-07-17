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
                <h6 class="mb-0">User Lists</h6>
            </div>
            <!-- User Profile-->
            <!-- cek foto -->
            <?php
            $profile_picture = $this->fungsi->user_login()->profile_picture;
            if ($profile_picture == null) {
                $profile_picture = "user.png";
            }
            ?>
            <div class="navbar--toggler" id="affanNavbarToggler"><a class="user-profile-trigger-btn" href="#"><img src="<?= base_url() ?>upload/user_foto/user.png" style="max-height: 30px; max-width:50px" alt=""></a></div>
        </div>
    </div>
</div>

<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="card">
            <?php $this->view('messages') ?>
            <div class="card-body p-3">
                <table class="data-table w-100" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($get_users as $key => $value) { ?>
                            <?php if ($value->role != 'admin') { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->nama ?></td>
                                    <td style="text-align: center;"><a class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#DataUser" id_user=<?= $value->id_user ?> nama_edit=<?= $value->nama ?> username_edit=<?= $value->username ?> email_edit=<?= $value->email ?> role_edit=<?= $value->role ?>><i class="fa fa-info-circle"></i>&nbsp; Edit</a></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="add-new-contact-wrap"><a class="shadow" href="#" data-bs-toggle="modal" data-bs-target="#addUser"><i class="bi bi-plus"></i></a></div>
</div>

<div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="addUserLabel">Add New User</h6>
                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>api/user/add" method="post" id="add_user">
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span><input class="form-control" type="text" placeholder="Full Name" aria-label="Recipient's username" id="nama" name="nama" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-address-card"></i></span><input class="form-control" type="text" placeholder="Username" aria-label="Recipient's username" id="username" name="username" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-envelope"></i></span><input class="form-control" type="email" placeholder="Email" aria-label="Recipient's username" id="email" name="email" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span><input class="form-control" type="password" placeholder="Password" aria-label="Recipient's username" id="password" name="password" aria-describedby="basic-addon2">
                        <span class="input-group-text MataPassword" id="basic-addon2">
                            <i class="fa fa-eye-slash" id="MataPassword"></i>
                        </span>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-envelope"></i></span>
                        <select class="form-control" type="text" aria-label="Recipient's username" id="role" name="role" aria-describedby="basic-addon2">
                            <option value="">- Role -</option>
                            <option value="Operator">Operator</option>
                            <option value="Rental">Rental</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-success" type="submit" form="add_user">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DataUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DataUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="DataUserLabel">Edit User Data</h6>
                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>api/user/edit" method="post" id="edit_user">
                    <input type="hidden" id="id_user" name="id_user">
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span><input class="form-control" type="text" placeholder="Full Name" aria-label="Recipient's username" id="nama_edit" name="nama" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-address-card"></i></span><input class="form-control" type="text" placeholder="Username" aria-label="Recipient's username" id="username_edit" name="username" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-envelope"></i></span><input class="form-control" type="email" placeholder="Email" aria-label="Recipient's username" id="email_edit" name="email" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span><input class="form-control" type="password" placeholder="Password" aria-label="Recipient's username" id="password_edit" name="password" aria-describedby="basic-addon2">
                        <span class="input-group-text MataPassword_edit" id="basic-addon2">
                            <i class="fa fa-eye-slash" id="MataPassword_edit"></i>
                        </span>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-envelope"></i></span>
                        <select class="form-control" type="text" aria-label="Recipient's username" id="role_edit" name="role" aria-describedby="basic-addon2">
                            <option value="">- Role -</option>
                            <option value="Operator">Operator</option>
                            <option value="Rental">Rental</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-sm btn-danger" type="button" id="TombolHapusUser" onclick="hapus_function()">Delete</a>
                <button class="btn btn-sm btn-success" type="submit" form="edit_user">Save</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
    var statePassword = 0;
    $(document).ready(function() {
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
        $(".MataPassword_edit").click(function() {
            if (statePassword == 0) {
                $(".MataPassword_edit").html('<i class= "fa fa-eye"></i>');
                statePassword = 1;
                $('#password_edit').get(0).type = 'text';
                return
            }
            if (statePassword == 1) {
                $(".MataPassword_edit").html('<i class= "fa fa-eye-slash"></i>');
                statePassword = 0;
                $('#password_edit').get(0).type = 'password';
                return
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#DataUser').on('show.bs.modal', function(e) {
            var opener = e.relatedTarget;
            var id_user = $(opener).attr('id_user');
            var nama_edit = $(opener).attr('nama_edit');
            var username_edit = $(opener).attr('username_edit');
            var email_edit = $(opener).attr('email_edit');
            var role_edit = $(opener).attr('role_edit');

            $('#edit_user').find('[id="id_user"]').val(id_user);
            $('#edit_user').find('[id="nama_edit"]').val(nama_edit);
            $('#edit_user').find('[id="username_edit"]').val(username_edit);
            $('#edit_user').find('[id="email_edit"]').val(email_edit);
            $('#edit_user').find('[id="role_edit"]').val(role_edit);

            document.getElementById("TombolHapusUser").href = "<?= base_url() ?>api/user/hapus?id_user=" + id_user;
        });
    });

    function hapus_function() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        swal({
                title: "Warning!",
                text: "Do you realy want to delete this user?",
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
                    window.location = document.getElementById('TombolHapusUser').href;
                } else {
                    swal("Cancelled", "This User Still Exist :)", "error");
                }
            });
    }
</script>