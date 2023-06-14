<?php include('include/header.php'); ?>
<div class="page-content pb-0">
        <div data-card-height="cover" class="card">
            <div class="card-center" id="validation">
                <div id="notiflogin" class="toast toast-tiny toast-top bg-red-dark notif_login" data-bs-delay="122500" data-autohide="true"></div>
                <div id="successlogin" class="toast toast-tiny toast-top bg-green-dark notif_login_success" data-bs-delay="4500" data-autohide="true"></div>
                <div class="ps-5 pe-5">
                    <h1 class="text-center font-800 font-40 mb-1">Login</h1>
                    <p class="color-highlight text-center font-12">Masuk dengan akun Anda</p>
                    <form action="<?= base_url('auth/login') ?>" method="post">
                        <div class="input-style no-borders has-icon validate-field_ mb-4">
                            <i class="fa fa-user"></i>
                            <input type="email" name="email" class="form-control validate-name myfm" id="form1a" placeholder="Email" autocomplete="off">
                            <label for="form1a" class="color-blue-dark">Email</label>
                            <em>(required)</em>
                        </div>
                        <div class="input-style no-borders has-icon validate-field_ mb-4">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="password" class="form-control validate-text" id="form3a" placeholder="Password" autocomplete="new-password"> 
                            <label for="form3a" class="color-blue-dark">Password</label>
                            
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
                            <?php
                            if(!empty($google_code_auth)){
                                echo '<input type="hidden" class="d-none google-auth-code" value="'.$google_code_auth.'">';
                            }
                            ?>
                            <button type="submit" id="login" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-dark-dark mt-n2">LOGIN</button>
                        </div>
                    </form>
                    <div class="divider mt-4"></div>
                    <div class="d-flex align-item-center flex-column justify-content-center">
                        <p class="text-center mt-2 mb-2">atau</p>
                        <button type="button" data-href="<?= $login_button ?>" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-red-dark mt-0 mb-4 ggl_login_btns"><i class="fa-brands fa-google"></i> Login dengan Akun Google</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php'); ?>