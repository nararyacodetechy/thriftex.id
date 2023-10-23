<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 mt-3 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 min-h-1vh">
            <div class="d-flex content mb-1">
                <!-- left side of profile -->
                <div class="flex-grow-1">
                    <h3 class="font-700 mb-0 lh-1">Register Validator Baru</h3>
                    <p class="mb-2 lh-sm mt-2">Buat akun pengguna untuk User validator</p>
                    <form action="<?= base_url('auth/registervalidator') ?>" method="post" id="jxfm">
                        <div class="input-style no-borders has-icon validate-field mt-3">
                            <i class="fa fa-user"></i>
                            <input type="name" name="nama" class="form-control myinput validate-name" data-iden="nama" id="form1ac" placeholder="Nama lengkap" required>
                            <label for="form1ac" class="color-blue-dark font-10">Nama lengkap</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>
                        <div class="valid-feedback color-red-dark field_nama"></div>
                        <div class="input-style no-borders has-icon validate-field mt-3">
                            <i class="fa fa-at"></i>
                            <input type="email" name="email" class="form-control myinput validate-text" data-iden="email" id="form2ac55" placeholder="Email" autocomplete="off" required>
                            <label for="form2ac55" class="color-blue-dark font-10">Email</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>
                        <div class="valid-feedback color-red-dark field_email"></div>
                        <div class="input-style no-borders has-icon validate-field mt-3">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="password" class="form-control myinput validate-text " data-iden="password" id="form3ac" placeholder="Password"  autocomplete="new-password" required>
                            <label for="form3ac" class="color-blue-dark font-10">Password</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>
                        <div class="valid-feedback color-red-dark field_password"></div>
                        <div class="input-style no-borders has-icon validate-field mt-3">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="passconf" class="form-control myinput validate-text" data-iden="passconf" id="form3a1" placeholder="Ulangi Password" required>
                            <label for="form3a1" class="color-blue-dark font-10 mt-1">Ulangi Password</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>
                        <div class="valid-feedback color-red-dark field_passconf"></div>
                        <div class="input-style no-borders no-icon mb-4">
                            <label for="form5a" class="color-highlight">Pilih Spesialis Brand</label>
                            <select id="form5a" name="validator_brand_id">
                                <option value="" disabled selected>Pilih Brand</option>
                                <option value="1">Vans</option>
                                <option value="2">Converse</option>
                                <option value="3">Nike</option>
                                <option value="4">Adidas</option>
                                <option value="5">Puma</option>
                                <option value="6">New Balance</option>
                                <option value="7">Reebok</option>
                                <option value="8">Dickies</option>
                                <option value="9">Stussy</option>
                                <option value="10">Carhartt</option>
                                <option value="11">Offwhite</option>
                                <option value="12">Supreme</option>
                                <option value="13">Bape</option>
                                <option value="14">Other Brand</option>
                            </select>
                            <span><i class="fa fa-chevron-down"></i></span>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <i class="fa fa-check disabled invalid color-red-dark"></i>
                            <em></em>
                        </div>
                        <!-- <div class="input-style no-borders no-icon mb-4">
                            <label for="form5a" class="color-highlight">Pilih Spesialis Kategori</label>
                            <select id="form5a" name="validator_kategori_id">
                                <option value="default" disabled selected>Spesialis Kategori</option>
                                <option value="1">Sepatu</option>
                                <option value="2">Tas</option>
                                <option value="3">Baju</option>
                                <option value="4">Hoodie</option>
                                <option value="5">Jacket</option>
                                <option value="6">Topi</option>
                                <option value="7">Celana</option>
                                <option value="8">Etc</option>
                            </select>
                            <span><i class="fa fa-chevron-down"></i></span>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <i class="fa fa-check disabled invalid color-red-dark"></i>
                            <em></em>
                        </div> -->
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" id="register_submit" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-blue-dark mt-n2">Buat Akun Baru</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php include('include/footer.php'); ?>