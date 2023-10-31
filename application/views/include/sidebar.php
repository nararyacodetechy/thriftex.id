<div id="menu-sidebar-left-6" class="bg-white menu menu-box-left" data-menu-width="320" data-menu-effect="menu-parallax">
    <div class="ps-3 pe-3 pt-4 pb-4 mb-4 bg-theme mx-3 rounded-m shadow-m my-3 d-none">
        <div class="d-flex">
            <div class="flex-grow-1 align-self-center">
                <h1 class="font-20 font-700 mb-0">Antonio</h1>
                <p class="mt-n2 mb-0 font-10 font-400">@antonio</p>
            </div>
            <div class="flex-grow-1 align-self-center text-end">
                <a href="<?= base_url('profile') ?>" class="btn btn-xxs rounded-5 text-uppercase font-500 border-dark-dark color-dark-dark bg-theme">Profile</a>
            </div>
        </div>
        <div class="divider divider-margins mb-0"></div>
        <div class="d-flex pt-3">
            <div class="flex-grow-1 align-self-center">
                <p class="mt-n2 mb-0 pb-0 font-10 font-400">Thriftex Saldo</p>
                <h2 class="font-20 font-700 mb-0">IDR. 30.000</h2>
            </div>
            <div class="flex-grow-1 align-self-end text-end">
                <a href="#" class="btn btn-xxs rounded-5 text-uppercase font-500 border-blue-dark color-blue-dark bg-theme">Top up</a>
            </div>
        </div>
        <div class="d-flex mb-0 d-none">
            <div class="flex-grow-1 align-self-start pe-2">
                <a href="#" data-menu="menu-login-1" class="btn btn-s btn-full rounded-5 text-uppercase font-700 border-dark-dark color-dark-dark bg-theme">Login</a>
            </div>
            <div class="flex-grow-1 align-self-start ps-2">
                <a href="#" data-menu="menu-register-1" class="btn btn-s btn-full rounded-5 text-uppercase font-700 border-dark-dark color-dark-dark bg-theme">Register</a>
            </div>
        </div>
    </div>

    <div class="divider divider-margins mb-0"></div>

    <div class="me-3 ms-3">
        <div class="list-group list-custom-small">
            <a href="<?= base_url('/') ?>">
                <span>Home</span>
            </a>
            <a href="<?= createurl('legit') ?>">
                <span>Legit Check</span>
            </a>
            <a href="<?= createurl('sertifikat-check') ?>">
                <span>Sertifikat Check</span>
            </a>
            <!-- <a href="#">
                <span>Artikel</span>
            </a> -->
            <a href="<?= createurl('tentang-kami') ?>">
                <span>Tentang kami</span>
            </a>
            <a href="<?= createurl('faq') ?>">
                <span>FAQ</span>
            </a>
            <a href="<?= createurl('privacy-policy') ?>">
                <span>Kebijakan Privasi</span>
            </a>
            <a href="<?= createurl('term-condition') ?>">
                <span>Syarat & Ketentuan</span>
            </a>
        </div>
    </div>
    <div class="me-3 ms-3 mt-4 pt-2">
        <span class="text-uppercase font-900 font-11 opacity-30">Settings</span>
        <div class="list-group list-custom-small">
            <a href="#" data-toggle-theme data-trigger-switch="switch-dark3-mode">
                <i class="fa font-12 fa-moon bg-gray-dark rounded-s"></i>
                <span>Dark Mode</span>
                <div class="custom-control small-switch ios-switch">
                    <input data-toggle-theme type="checkbox" class="ios-input" id="switch-dark3-mode">
                    <label class="custom-control-label" for="switch-dark3-mode"></label>
                </div>
                <i class="fa fa-angle-right"></i>
            </a>
            <?php
            if($this->session->userdata('login') == true){
            ?>
            <a href="<?= createurl('profile') ?>">
                <i class="fa font-12 fa-user bg-gray-dark rounded-s"></i>
                <span>Profile</span>
                <i class="fa fa-angle-right"></i>
            </a>
            <?php }else{ ?>
            <a href="#" data-menu="menu-login-1">
                <i class="fa font-12 fa-user bg-gray-dark rounded-s"></i>
                <span>Profile</span>
                <i class="fa fa-angle-right"></i>
            </a>
            <?php } ?>
        </div>
    </div>
</div>
