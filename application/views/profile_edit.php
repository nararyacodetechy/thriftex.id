<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 pb-4 min-h-1vh">
        <div class="content mb-0">
                <div class="row mb-2 mt-n2">
                    <div class="col-6 text-start">
                        <h4 class="font-700 text-uppercase font-12 opacity-50">Edit Profile</h4>
                    </div>
                </div>
                <div class="divider mb-3"></div>
                <form action="<?= base_url('profile/saveedit') ?>" method="post">
                    <div class="mb-4">
                        <div class="d-flex content mb-1">
                            <div class="flex-grow-1">
                                <h5 class="font-600 mb-0 lh-1">Username</h5>
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-style has-borders no-icon validate-field mb-0">
                                <input type="text" class="form-control validate-text username_input" name="username" id="form1" required value="<?= $data_user['username'] ?>">
                                <label for="form1" class="color-highlight">Username</label>
                                <i class="fa fa-times validated-invalid invalid color-red-dark disabled"></i>
                                <i class="fa fa-check validated-valid valid color-green-dark disabled"></i>
                                <em>(required)</em>
                            </div>
                            <p style="color:red" class="taken_username d-none">Username Sudah digunakan!</p>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex content mb-1">
                            <div class="flex-grow-1">
                                <h5 class="font-600 mb-0 lh-1">Nama</h5>
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-style has-borders no-icon validate-field mb-4">
                                <input type="text" class="form-control validate-text" name="nama" id="form2" required value="<?= $data_user['nama'] ?>" >
                                <label for="form2" class="color-highlight">Nama</label>
                                <i class="fa fa-times disabled invalid color-red-dark"></i>
                                <i class="fa fa-check disabled valid color-green-dark"></i>
                                <em>(required)</em>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex content mb-1">
                            <div class="flex-grow-1">
                                <h5 class="font-600 mb-0 lh-1">No. Hp</h5>
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-style has-borders no-icon validate-field mb-4">
                                <input type="text" class="form-control validate-text" name="no_hp" value="<?= ($data_user['no_hp'] == '-')?'':$data_user['no_hp'] ?>" >
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex content mb-1">
                            <div class="flex-grow-1">
                                <h5 class="font-600 mb-0 lh-1">Email</h5>
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-style has-borders no-icon validate-field mb-4">
                                <input type="text" class="form-control" disabled id="form2" value="<?= $data_user['email'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex content mb-1">
                            <div class="flex-grow-1">
                                <h5 class="font-600 mb-0 lh-1">Jenis Kelamin</h5>
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-style has-borders no-icon mb-4">
                                <select id="form6" name="jenis_kelamin" required>
                                    <option value="" >Pilih</option>
                                    <option value="Laki-laki" <?= ($data_user['jenis_kelamin'] == 'Laki-laki')?'selected':'' ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= ($data_user['jenis_kelamin'] == 'Perempuan')?'selected':'' ?>>Perempuan</option>
                                </select>
                                <span><i class="fa fa-chevron-down"></i></span>
                                <i class="fa fa-check disabled valid color-green-dark"></i>
                                <i class="fa fa-check disabled invalid color-red-dark"></i>
                                <em></em>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-600 shadow-s bg-dark-light btn-save-profile">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div> 
        </div>
    </div>
</div>
<?php include('include/footer.php'); ?>