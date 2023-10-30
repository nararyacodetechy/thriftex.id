<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 pb-4 min-h-1vh">
            <div class="content">
                <h2 class="vcard-title mb-1">Legit Detail</h2>
                <p class="mb-3">
                    Mohon laukan validasi dengan detail.
                </p>
                <div class="divider my-2"></div>
                <a href="" class="default-link d-flex">
                    <div>
                        <span class="font-11 d-block mb-n1 opacity-50 color-theme">Kategori</span>
                        <span class="default-link d-block color-theme font-15 font-400"><?= $legit_data[0]['kategori_name'] ?></span>
                    </div>
                </a>
                <div class="divider my-2"></div>
                <a href="" class="default-link d-flex">
                    <div>
                        <span class="font-11 d-block mb-n1 opacity-50 color-theme">Brand</span>
                        <span class="default-link d-block color-theme font-15 font-400"><?= $legit_data[0]['brand_name'] ?></span>
                    </div>
                </a>
                <div class="divider my-2"></div>
                <a href="" class="default-link d-flex">
                    <div>
                        <span class="font-11 d-block mb-n1 opacity-50 color-theme">Nama Item</span>
                        <span class="default-link d-block color-theme font-15 font-400"><?= $legit_data[0]['nama_item'] ?></span>
                    </div>
                </a>
                <div class="divider my-2"></div>
                <a href="" class="default-link d-flex">
                    <div>
                        <span class="font-11 d-block mb-n1 opacity-50 color-theme">Kondisi</span>
                        <span class="default-link d-block color-theme font-15 font-400"><?= $legit_data[0]['kondisi'] ?></span>
                    </div>
                </a>
                <div class="divider my-2"></div>
                <a href="" class="default-link d-flex">
                    <div>
                        <span class="font-11 d-block mb-n1 opacity-50 color-theme">Toko Pembelian</span>
                        <span class="default-link d-block color-theme font-15 font-400"><?= $legit_data[0]['toko_pembelian'] ?></span>
                    </div>
                </a>
                <div class="divider my-2"></div>
                <a href="" class="default-link d-flex">
                    <div>
                        <span class="font-11 d-block mb-n1 opacity-50 color-theme">Catatan</span>
                        <span class="default-link d-block color-theme font-15 font-400"><?= $legit_data[0]['catatan'] ?></span>
                    </div>
                </a>
            </div>
            <div class="content mb-0">
                <div class="divider mb-3"></div>
                <h4 class="font-700 text-uppercase font-12 opacity-50">Legit Foto</h4>
                <div class="row text-center row-cols-3 mb-0 mt-4">
                    <?php
                    foreach($legit_data[0]['image_list'] as $key=>$value){
                    ?>
                        <a class="col mb-4" data-gallery="gallery-2" href="<?= base_url('media/'.$value['file_path']) ?>" title="">
                            <img src="<?= base_url('media/'.$value['file_path']) ?>" data-src="<?= base_url('media/'.$value['file_path']) ?>" class="preload-img img-fluid rounded-xs object-fit image_gallerys" alt="img">
                        </a>
                    <?php
                    }
                    ?>
                </div>
                <div class="divider mb-3 mt-3"></div>
            </div>
           
            <div class="content">
                <div id="notifLegit" class="toast toast-tiny toast-top bg-red-dark notif_login" data-bs-delay="1500" data-autohide="true"></div>
                <form action="<?= base_url('legit/validation') ?>" method="post" id="saveLegitcheck">
                    <h6>Legit Result :</h6>
                    <div class="mb-3">
                        <input type="hidden" name="legit_id" value="<?= $legit_data[0]['id'] ?>">
                        <div class="fac fac-radio fac-blue"><span></span>
                            <input id="box7-fac-radio" type="radio" class="radio_legit_result" name="legit_status" value="processing" <?= (isset($legit_data[0]['authentic_comment']['check_result']) && $legit_data[0]['authentic_comment']['check_result'] == 'processing')?'checked':'' ?>>
                            <label for="box7-fac-radio">Processing</label>
                        </div>
                        <div class="fac fac-radio fac-green"><span></span>
                            <input id="box5-fac-radio" type="radio" class="radio_legit_result" name="legit_status" value="real" <?= (isset($legit_data[0]['authentic_comment']['check_result']) && $legit_data[0]['authentic_comment']['check_result'] == 'real')?'checked':'' ?>  >
                            <label for="box5-fac-radio">Original</label>
                        </div>
                        <div class="fac fac-radio fac-red"><span></span>
                            <input id="box6-fac-radio" type="radio" class="radio_legit_result" name="legit_status" value="fake" <?= (isset($legit_data[0]['authentic_comment']['check_result']) && $legit_data[0]['authentic_comment']['check_result'] == 'fake')?'checked':'' ?> >
                            <label for="box6-fac-radio">Fake</label>
                        </div>
                    </div>
                    <div class="processing_mode_option">
                    <?php if(isset($legit_data[0]['authentic_comment']['check_result']) && $legit_data[0]['authentic_comment']['check_result'] == 'processing' && $legit_data[0]['processing_status'] != 'none'){
                    ?>
                    <h6>Processing Mode :</h6>
                    <div class="input-style has-borders no-icon mb-4">
                        <select id="form5" name="processing_mode" required>
                            <option value="" disabled>Processing Mode</option>
                            <option value="no_brand_info" <?= ($legit_data[0]['processing_status'] == 'no_brand_info')?'selected':'' ?> >NO BRAND INFORMATION</option>
                            <option value="no_product_info" <?= ($legit_data[0]['processing_status'] == 'no_product_info')?'selected':'' ?>>NO PRODUCT INFORMATION</option>
                            <option value="no_detail_picture" <?= ($legit_data[0]['processing_status'] == 'no_detail_picture')?'selected':'' ?>>NO DETAIL PICTURE</option>
                        </select>
                            <span><i class="fa fa-chevron-down"></i></span>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <i class="fa fa-check disabled invalid color-red-dark"></i>
                        <em></em>
                    </div>
                    <?php
                    }?>
                    </div>
                    <div class="input-style has-borders no-icon mb-4">
                        <textarea id="form7" name="message_validation" placeholder="Enter your message"><?= (isset($legit_data[0]['authentic_comment']['check_result']))? $legit_data[0]['authentic_comment']['check_note'] : ''; ?></textarea>
                        <label for="form7" class="color-highlight">Enter your Message</label>
                        <em class="mt-n3">(required)</em>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" id="" class="saveLegitcheck btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-green-dark mt-n2">SAVE</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
    
<?php include('include/footer.php'); ?>