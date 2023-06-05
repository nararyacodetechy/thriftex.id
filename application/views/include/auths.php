<?php
if($this->session->userdata('login') == false){
?>
<!-- menu-login-1 -->
<div id="menu-login-1" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="320" data-menu-effect="menu-over">
    <div class="menu-title mt-n1" id="validation">
        <h1>Login</h1>
        <p class="color-theme opacity-50">Please enter your credentials below</p>
        <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
    </div>
    <div id="notiflogin" class="toast toast-tiny toast-top bg-red-dark notif_login" data-bs-delay="1500" data-autohide="true"></div>
    <div class="content mb-0">
        <form action="<?= base_url('auth/login') ?>" method="post">
            <div class="input-style no-borders has-icon  mb-4">
                <i class="fa fa-user"></i>
                <input type="email" name="email" class="form-control validate-name" id="form1a" placeholder="Email" autocomplete="off">
                <label for="form1a" class="color-blue-dark">Email</label>
                <!-- <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i> -->
                <em>(required)</em>
            </div>
            <div class="input-style no-borders has-icon  mb-4">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" class="form-control validate-text" id="form3a" placeholder="Password" autocomplete="new-password"> 
                <label for="form3a" class="color-blue-dark">Password</label>
                <!-- <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i> -->
                <em>(required)</em>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="#" data-menu="menu-forgot-1" class="font-10">Forgot Password?</a>
                </div>
                <div class="col-6">
                    <a data-menu="menu-register-1" href="#" class="float-end font-10">Create Account</a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" id="login" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-dark-dark mt-n2">LOGIN</button>
            </div>
        </form>
        <p class="text-center mt-2 mb-2 d-none">atau</p>
        <a href="#" class="d-none btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-red-dark mt-0 mb-4"><i class="fa-brands fa-google"></i> Daftar dengan Google</a>
    </div>
</div>
<!-- register -->
<div id="menu-register-1" class="menu menu-box-bottom menu-box-detached rounded-m register-box" data-menu-height="530" data-menu-effect="menu-over">
    <div class="menu-title mt-n1 register">
        <h1>Register</h1>
        <p class="color-theme opacity-50">Buat akun baru disini</p>
        <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
    </div>

    <div id="notifs" class="toast toast-tiny toast-top bg-red-dark" data-bs-delay="2000" data-autohide="true"><i class="fa fa-times me-3"></i>Terjadi Kesalahan</div>
    <div class="content mb-0 mt-0 register">
        <form action="<?= base_url('auth/register') ?>" method="post" id="jxfm">
            <div class="input-style no-borders has-icon validate-field_ mt-3">
                <i class="fa fa-user"></i>
                <input type="name" name="nama" class="form-control myinput validate-name" data-iden="nama" id="form1ac" placeholder="Nama lengkap" required>
                <label for="form1ac" class="color-blue-dark font-10">Nama lengkap</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="valid-feedback color-red-dark field_nama"></div>
            <div class="input-style no-borders has-icon validate-field_ mt-3">
                <i class="fa fa-at"></i>
                <input type="email" name="email" class="form-control myinput validate-text" data-iden="email" id="form2ac55" placeholder="Email" autocomplete="off" required>
                <label for="form2ac55" class="color-blue-dark font-10">Email</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="valid-feedback color-red-dark field_email"></div>
            <div class="input-style no-borders has-icon validate-field_ mt-3">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" class="form-control myinput validate-text " data-iden="password" id="form3ac" placeholder="Password"  autocomplete="new-password" required>
                <label for="form3ac" class="color-blue-dark font-10">Password</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="valid-feedback color-red-dark field_password"></div>
            <div class="input-style no-borders has-icon validate-field_ mt-3">
                <i class="fa fa-lock"></i>
                <input type="password" name="passconf" class="form-control myinput validate-text" data-iden="passconf" id="form3a1" placeholder="Ulangi Password" required>
                <label for="form3a1" class="color-blue-dark font-10 mt-1">Ulangi Password</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="valid-feedback color-red-dark field_passconf"></div>
            <div class="row">
                <div class="col-6">
                    <a data-menu="menu-login-1" href="#" class="float-start font-10">Login disini</a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" id="register_submit" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-dark-dark mt-n2">Buat Akun Baru</button>
            </div>
        </form>
        <p class="text-center mt-2 mb-2 d-none">atau</p>
        <a href="#" class="d-none btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-red-dark mt-0 mb-4"><i class="fa-brands fa-google"></i> Daftar dengan Google</a>
    </div>
    <div class="content text-center success_register d-none">
        <i class="fa fa-check-circle scale-box color-green-dark fa-5x pb-3 pt-3"></i>
        <h1>Thank you!</h1>
        <p class="px-3 mb-5">
            Akun berhasil dibuat. Check email Anda untuk aktifasi akun.
        </p>
        <a data-menu="menu-login-1" href="#" class="btn btn-full btn-m rounded-m bg-green-dark font-700 text-uppercase mb-4">Login</a>
    </div>
</div>
<!-- menu-forgot-1 -->
<div id="menu-forgot-1" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="240" data-menu-effect="menu-over">
    <div class="menu-title mt-n1">
        <h1>Forgot</h1>
        <p class="color-theme opacity-50">Recover your account</p>
        <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
    </div>

    <div class="content mb-0 mt-n2">
        <div class="input-style no-borders has-icon validate-field_ mb-4">
            <i class="fa fa-at"></i>
            <input type="email" class="form-control validate-text" id="form24a" placeholder="Email">
            <label for="form24a" class="color-blue-dark">Email</label>
            <!-- <i class="fa fa-times disabled invalid color-red-dark"></i>
            <i class="fa fa-check disabled valid color-green-dark"></i> -->
            <em>(required)</em>
        </div>
        <div class="row">
            <div class="col-6">
                <a href="#" data-menu="menu-login-1" class="font-10">Login Here</a>
            </div>
            <div class="col-6">
                <a data-menu="menu-register-1" href="#" class="float-end font-10">Create Account</a>
                <div class="clearfix"></div>
            </div>
        </div>
        <a href="#" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-dark-dark mt-n2">Reset Password</a>
    </div>
</div>
<?php } ?>