<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 mt-3 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0 min-h-1vh">
        <div class="card mb-2 ">
            <div class="d-flex content mb-1">
                <!-- left side of profile -->
                <div class="flex-grow-1">
                    <h1 class="font-700 mb-0 lh-1"><?= $nama ?></h1>
                    <p class="mb-2 lh-sm mt-2">
                        @<?= $username ?>
                    </p>
                    <h6 class="mb-2 lh-sm">
                        Profile ID : #<?= $usercode ?>
                    </h6>
                </div>
            </div>
            <div class="divider divider-margins mb-0"></div>
            <div class="d-flex content mb-3 d-none">
                <div class="flex-grow-1 align-self-center">
                    <p class="mt-n2 mb-0 pb-0 font-10 font-400">Thriftex Saldo</p>
                    <h2 class="font-30 font-700 mb-0 text-success">IDR 30.000</h2>
                </div>
                <div class="flex-grow-1 align-self-end text-end">
                    <a href="#" class="btn btn-xxs rounded-5 text-uppercase font-500 border-green-dark color-green-dark bg-theme">Withdraw</a>
                    <a href="#" class="btn btn-xxs rounded-5 text-uppercase font-500 border-blue-dark color-blue-dark bg-theme">Top up</a>
                </div>
            </div>
            <!-- follow buttons-->
            <div class="divider divider-margins mb-0"></div>
            <?php
            if($role == 'user'){
            ?>
            <div class="content mb-0 mt-0">
                <div class="list-group list-custom-small">
                    <a href="<?= base_url('profile/legitchcek') ?>"><span>Legit Check Saya</span><i class="fa fa-angle-right"></i></a>
                </div>
                <div class="row text-center mb-3 mt-4 mx-n2 d-none">
                    <div class="col-4 d-none">
                        <a href="" class="text-dark">
                            <i class="fa-solid fa-money-bill text-secondary font-25 mb-3"></i>
                            <span class="font-9 d-block mt-n3">Waiting Payment</span>
                        </a>
                    </div>
                    <div class="col-4" style="position: relative;">
                        <a href="<?= base_url('profile/legitchcek') ?>" class="text-dark">
                            <i class="fa-solid fa-clock-rotate-left text-secondary font-25 mb-3"></i>
                            <span class="font-9 d-block mt-n3">Processing</span>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="<?= base_url('profile/legitchcek') ?>" class="text-dark">
                            <i class="fa-solid fa-file-contract text-secondary font-25 mb-3"></i>
                            <span class="font-9 d-block mt-n3">Result</span>
                        </a>
                    </div>
                </div>    
            </div>
            <?php
            }
            if($role == 'validator'){
            ?>
            <div class="content mt-3">
                <p class="mb-3">Leigt Check list</p>
                <div class="row mb-n3">
                    <div class="col-4 pe-2">
                        <div class="card card-style mx-0 mb-3">
                            <a href="<?= base_url('legit/newlist') ?>">
                                <div class="p-3">
                                    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Baru</h4>
                                    <h1 class="font-700 font-34 color-yellow-dark  mb-0"><?= $validator_summary_count['total_baru'] ?></h1>
                                    <i class="fa fa-arrow-right float-end mt-n3 opacity-20"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 ps-2 pe-2">
                        <div class="card card-style mx-0 mb-3">
                            <a href="<?= base_url('legit/processlist') ?>">
                                <div class="p-3">
                                    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Proses</h4>
                                    <h1 class="font-700 font-34 color-blue-dark mb-0"><?= $validator_summary_count['total_proses'] ?></h1>
                                    <i class="fa fa-arrow-right float-end mt-n3 opacity-20"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 ps-2">
                        <div class="card card-style mx-0 mb-3">
                            <a href="<?= base_url('legit/completelist') ?>">
                                <div class="p-3">
                                    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Selesai</h4>
                                    <h1 class="font-700 font-34 color-green-dark mb-0"><?= $validator_summary_count['total_selesai'] ?></h1>
                                    <i class="fa fa-arrow-right float-end mt-n3 opacity-20"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
            if($role == 'admin'){ ?>
            <div class="content mt-3">
                <p class="mb-3">Admin Menu</p>
                <div class="row mb-n3">
                    <div class="col-6 pe-2">
                        <div class="card card-style mx-0 mb-3">
                            <a href="<?= base_url('user/list') ?>">
                                <div class="p-3">
                                    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Total User</h4>
                                    <h1 class="font-700 font-34 color-dark-light  mb-0"><?= $dataAdmin['total_user'] ?></h1>
                                    <i class="fa fa-arrow-right float-end mt-n3 opacity-20"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6 ps-2 pe-2">
                        <div class="card card-style mx-0 mb-3">
                            <a href="#">
                                <div class="p-3">
                                    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Total Validator</h4>
                                    <h1 class="font-700 font-34 color-dark-light mb-0"><?= $dataAdmin['total_validator'] ?></h1>
                                    <i class="fa fa-arrow-right float-end mt-n3 opacity-20"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 ps-2">
                        <div class="card card-style mx-0 mb-3">
                            <a href="#">
                                <div class="p-3">
                                    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Total Legit Check</h4>
                                    <h1 class="font-700 font-34 color-dark-light mb-0"><?= $dataAdmin['total_legit_success'] ?></h1>
                                    <i class="fa fa-arrow-right float-end mt-n3 opacity-20"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="list-group list-custom-small">
                        <a href="<?= base_url('registervalidator') ?>"><span>Tambah Akun Validator</span><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="card mb-2">
            <div class="content">
                <h6 class="text-secondary font-300">Akun Setting</h6>
                <div class="list-group list-custom-small">
                    <a href="#"><span>Edit Profile</span><i class="fa fa-angle-right"></i></a>
                    <a href="#"><span>Ganti Password</span><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="content ">
                <h6 class="text-secondary font-300">App setting</h6>
                <div class="list-group list-custom-small">
                    <?php if($role != 'admin'){ ?>
                    <a href="#" data-menu="menu-masukan" ><span>Bantuan & Masukan</span><i class="fa fa-angle-right"></i></a>
                    <a href="<?= base_url('/faq') ?>"><span>FAQ</span><i class="fa fa-angle-right"></i></a>
                    <a href="<?= base_url('/privacy-policy') ?>"><span>Kebijakan Privasi</span><i class="fa fa-angle-right"></i></a>
                    <a href="<?= base_url('/term-condition') ?>"><span>Syarat & Ketentuan</span><i class="fa fa-angle-right"></i></a>
                    <a href="mailto:thriftexcs@gmail.com"><span>Kontak ke Email</span><i class="fa fa-angle-right"></i></a>
                    <?php } ?>
                    <a href="<?= base_url('logout') ?>"><span>Logout</span><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>  
    </div>
</div>
    
<?php include('include/footer.php'); ?>