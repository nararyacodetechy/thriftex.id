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
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
    </div>
</div>
    
<?php include('include/footer.php'); ?>