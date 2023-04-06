<?php include('include/header.php'); ?>
<div class="page-content pb-0">
    <div data-card-height="cover" class="card">
        <div class="card-center text-center">
            <h1 class="center-text mb-5"><i class="fa fa-3x fa-exclamation-triangle color-red-dark "></i></h1>
            <h1 class="center-text fa-5x mb-3">404</h1>
            <h6 class="center-text font-800 font-14 mb-4">Halaman tidak ditemukan!</h6>

            <p class="boxed-text-l mb-5 opacity-80">
                Halaman yang anda cari tidak ditemuakn
            </p>
            <div class="row me-5 ms-5 mb-0">
                <div class="col-12">
                    <a href="<?= base_url()?>" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-600 shadow-s bg-dark-light">HOME</a>
                </div>
                <div class="claerfix"></div>
            </div>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>