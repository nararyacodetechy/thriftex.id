<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card bg-theme mb-2 h-1vh">
            <div class="content text-center mt-5">
                <h1>Data Anda Berhasil dikirim</h1>
                <div class="mt-3 mb-3">
                    <i class="fa-regular fa-circle-check text-success" style="font-size: 70px;"></i>
                </div>
                <p>Terima Kasih telah mengirim data produk Anda, kami akan segera memberi hasil validasi ke email terdaftar Anda.</p>
                <p>Anda bisa memantau hasil validasi pada halaman profile</p>
                <a href="<?= base_url('profile/sertifikat') ?>" class="btn btn-sm btn-dark">Cek Hasil</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
    </div>
</div>
    
<?php include('include/footer.php'); ?>