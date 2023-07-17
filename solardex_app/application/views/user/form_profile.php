<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.css">
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
                <h6 class="mb-0">Pengaturan Profil</h6>
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
        <!-- User Information-->
        <div class="card user-info-card mb-3">
            <div class="card-body d-flex align-items-center">
                <div class="user-profile me-3"><img src="<?= base_url() ?>upload/user_foto/<?= $profile_picture ?>" alt="">
                    <form id="porfile_form" action="<?= base_url() ?>api/profile/photo" enctype="multipart/form-data" method="post">
                        <input class="form-control" type="file" id="file" name="file" onchange="javascript:this.form.submit();">
                    </form>
                </div>
                <div class="user-info">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-1"><?= $nama ?></h5><span class="badge bg-primary ms-2 rounded-pill"><?= $role ?></span>
                    </div>
                    <p class="mb-0">Admin STJ</p>
                </div>
            </div>
        </div>
        <!-- User Meta Data-->
        <div class="card user-data-card">
            <div class="card-body">
                <?php $this->view('messages') ?>
                <form action="<?= base_url() ?>user/profile" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" class="form-control" value="<?= $this->fungsi->user_login()->id_user ?>">
                    <div class="form-group mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" id="username" type="text" value="<?= $username ?>" name="username" value="" placeholder="Username">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="nama">Nama Lengkap</label>
                        <input class="form-control" id="nama" name="nama" value="<?= $nama ?>" type="text" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="email">Alamat Email</label>
                        <input class="form-control" id="email" name="email" type="text" value="<?= $email ?>" placeholder="Email Address">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="kelamin" name="kelamin" type="text" value="">
                            <option value="<?= $kelamin ?>"><?php if ($kelamin != null) { ?> <?= $kelamin ?> <?php } else { ?>- Pilih - <?php } ?></option>
                            <option value="laki-laki">Laki - laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <button class="btn btn-success w-100" type="submit">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>