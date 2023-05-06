<?php include('include/header.php'); ?>
<div class="page-content pb-0">
        <div data-card-height="cover" class="card">
            <div class="card-center" id="validation">
            <div id="notiflogin" class="toast toast-tiny toast-top bg-red-dark notif_login" data-bs-delay="1500" data-autohide="true"></div>
                <div class="ps-5 pe-5">
                    <h1 class="text-center font-800 font-40 mb-1">Login</h1>
                    <p class="color-highlight text-center font-12">Masuk dengan akun Anda</p>
                    <form action="<?= base_url('auth/login') ?>" method="post">
                        <div class="input-style no-borders has-icon validate-field mb-4">
                            <i class="fa fa-user"></i>
                            <input type="email" name="email" class="form-control validate-name myfm" id="form1a" placeholder="Email" autocomplete="off">
                            <label for="form1a" class="color-blue-dark">Email</label>
                            
                            <em>(required)</em>
                        </div>
                        <div class="input-style no-borders has-icon validate-field mb-4">
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
                            <button type="submit" id="login" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-dark-dark mt-n2">LOGIN</button>
                        </div>
                    </form>
                    <div class="divider mt-4"></div>
                    <a href="#" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-dark-dark mt-0 mb-4"><i class="fa-brands fa-google"></i> Login dengan Akun Google</a>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php'); ?>