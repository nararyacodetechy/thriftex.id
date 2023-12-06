<div class="row me-0 ms-0 mb-0 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 pb-4 min-h-1vh">
            <div class="content mb-2 store_profile">
                <h1 class="mb-4">Look Book</h1>
                <div class="row lookbook g-3">
                    <?php foreach ($page_data['barcode_foto_look_book'] as $key => $value) { ?>
                        <div class="col-6 mb-2">
                            <img src="<?= $value['file_path'] ?>" alt="">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


