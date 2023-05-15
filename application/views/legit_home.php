<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card bg-theme mb-2 min-h-1vh">
            <div data-card-height="240" class="card card-style_ mb-4 preload-img" data-src="<?= base_url('assets/front/images/thrift/mainbg.jpeg') ?>">
                <div class="card-center text-center">
                    <div class="boxed-text-xl color-white opacity-80">Sudah lebih dari</div>
                    <h1 class="color-white font-38"><?= $total_legit ?></h1>
                    <p class="boxed-text-xl color-white opacity-80">
                        Sudah melakukan Legit Check di thriftex.id
                    </p>
                    <a href="<?= base_url('legitcheck') ?>" class="btn rounded-sm btn-center-m text-uppercase font-400 btn-m bg-dark-dark">Check Legit</a>
                </div>
                <div class="card-overlay bg-black opacity-80"></div>
            </div>
            <div class="search-box search-header bg-theme card-style me-3 ms-3">
                <i class="fa fa-search"></i>
                <input type="text" class="border-0" placeholder="Masukan Kode Legit Check Anda..." >
                <a href="#" class="clear-search disabled mt-0"><i class="fa fa-times color-red-dark"></i></a>
            </div>
            <div class="card mb-4">
                <div class="content">
                    <div class="row mb-0">
                        <?php
                        $urutan = 1;
                        foreach ($data_legit as $key => $value) {
                        ?>
                        <div class="col-6">
                            <div class="card card-style m-0 " style="background-image: url('<?= base_url('media/'.$value['file_path']) ?>');" data-card-height="140">
                                <div class="card-top p-2">
                                    <?php
                                    if($value['check_result'] == 'fake'){
                                        echo '<span class="bg-red-dark p-2 py-1 rounded-sm font-13 font-600">Fake</span>';
                                    }else{
                                        echo '<span class="bg-green-dark p-2 py-1 rounded-sm font-13 font-600">Original</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <h5 class="font-600 font-16 line-height-sm "><?= $value['nama_item'] ?></h5>
                            <span class="color-light-dark d-block font-11 font-600"><?= $value['submit_time'] ?></span>
                        </div>
                        <?php
                        if($urutan%2 == 0){
                            echo '<div class="col-12"><div class="divider mt-2 mb-4"></div></div>';
                        }
                        $urutan ++;
                        }
                        ?>
                        <!-- <div class="col-6">
                            <div class="card card-style m-0 bg-30" data-card-height="140">
                                <div class="card-top p-2">
                                    <span class="bg-green-dark p-2 py-1 rounded-sm font-13 font-600">Asli</span>
                                </div>
                            </div>
                            <h5 class="font-600 font-16 line-height-sm pt-3">Nama Sepatu</h5>
                            <span class="color-light-dark d-block font-11 font-600">Featured this Week</span>
                        </div>
                        <div class="col-6">
                            <div class="card card-style m-0 bg-28" data-card-height="140">
                                <div class="card-top p-2">
                                    <span class="bg-red-dark p-2 py-1 rounded-sm font-13 font-600">Palsu</span>
                                </div>
                                <div class="card-bottom text-center pb-3">
                                    <a href="#" data-toast="snackbar-favorites" class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i class="fa fa-heart color-red-dark font-12"></i></a>
                                    <a href="#" data-toast="snackbar-cart" class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i class="fa fa-shopping-bag font-12"></i></a>
                                </div>
                            </div>
                            <h5 class="font-600 font-16 line-height-sm pt-3">Macbook Air, </h5>
                            <span class="color-red-dark d-block font-11 font-600">Out of Stock</span>
                        </div>
                        <div class="col-12"><div class="divider mt-2 mb-4"></div></div>
                        <div class="col-6">
                            <div class="card card-style m-0 bg-21" data-card-height="140">
                                <div class="card-bottom text-center pb-3">
                                    <a href="#" data-toast="snackbar-favorites" class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i class="fa fa-heart color-red-dark font-12"></i></a>
                                    <a href="#" data-toast="snackbar-cart" class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i class="fa fa-shopping-bag font-12"></i></a>
                                </div>
                            </div>
                            <h5 class="font-600 font-16 line-height-sm pt-3">Macbook Pro, 2TB SSD, 64GB DDR4, Apple Chip M9X</h5>
                            <span class="color-green-dark d-block font-11 font-600">In Stock</span>
                            <h2 class="mt-n1">$2499.<sup class="font-14 font-400 opacity-50">99</sup></h2>
                        </div>
                        <div class="col-6">
                            <div class="card card-style m-0 bg-8" data-card-height="140">
                                <div class="card-bottom text-center pb-3">
                                    <a href="#" data-toast="snackbar-favorites" class="icon icon-xxs bg-theme rounded-l shadow-xl rounded-m mx-2 color-theme"><i class="fa fa-heart color-red-dark font-12"></i></a>
                                </div>
                            </div>
                            <h5 class="opacity-40 font-600 font-16 line-height-sm pt-3">Macbook Air, 1TB Fushion Drive, 16GB DDR4, M9X</h5>
                            <span class="color-red-dark d-block font-11 font-600">Out of Stock</span>
                            <h2 class="opacity-40 pb-2 mt-n1">$999.<sup class="font-14 font-400 opacity-50">99</sup></h2>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
    </div>
</div>
    
<?php include('include/footer.php'); ?>