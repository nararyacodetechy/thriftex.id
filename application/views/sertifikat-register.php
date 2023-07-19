<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 mt-3 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 min-h-1vh">
            <div class="content pt-3">
                <form action="<?= base_url('sertif-send') ?>" method="post" id="submit-regis-sertif" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $this->input->get('id') ?>" name="idtoko">
                    <div class="text-center mb-3">
                        <h1>Verifikasi Produk Anda untuk mendapatkan Sertifikat dari Kami</h1>
                    </div>
                    <div class="">
                        <div class="sertif-register d-flex flex-column mt-1 mb-3 flex-wrap"></div>
                    </div>
                    <div class="d-flex justify-content-md-center flex-column">
                        <button type="submit" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-600 shadow-s bg-dark-light">Verify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
<?php include('include/footer.php'); ?>