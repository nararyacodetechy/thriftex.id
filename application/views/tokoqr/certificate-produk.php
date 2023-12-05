<div class="row me-0 ms-0 mb-0 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 pb-4 min-h-1vh">
            <div class="content mb-2 store_profile">
                <h1 class="mb-4">Certificate</h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td><?= $page_data['barcode_info']['barcode_kode'] ?></td>
                        </tr>
                        <tr>
                            <td>BRAND</td>
                            <td><?= $page_data['profile']['nama_brand'] ?></td>
                        </tr>
                    </tbody>
                </table>
                <p>It was our great pleasure to engaging with you for this authentic certificate and you proved yourself as one of most important people of this brand. We wish that with this certificate we can cultivate original goods or services.</p>
                <p class="text-center mt-5">
                    <?php
                    global $SConfig;
                    ?>
                    <img src="<?= $SConfig->_panel_qr ?>qr/<?= $page_data['barcode_info']['file_name'] ?>" alt="barcode" style="max-width: 110px;">
                </p>
            </div>
        </div>
    </div>
</div>


