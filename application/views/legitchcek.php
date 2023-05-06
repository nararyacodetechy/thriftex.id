<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card bg-theme mb-2 ">
            <form action="<?= base_url('legitsend') ?>" method="post" enctype="multipart/form-data">
                <div class="d-flex content mb-1">
                    <!-- left side of profile -->
                    <div class="flex-grow-1">
                        <h5 class="font-600 mb-0 lh-1">Pilih Kategori</h5>
                    </div>
                </div>
                <div class="content">
                    <div class="input-style has-borders no-icon mb-4">
                        <label for="form5" class="color-highlight">Pilih Kategori</label>
                        <select id="form5" name="kategori" required>
                            <option value="default" disabled selected>Pilih Kategori</option>
                            <option value="1">Sepatu</option>
                            <option value="2">Tas</option>
                            <option value="3">Baju</option>
                            <option value="4">Hoodie</option>
                            <option value="5">Jacket</option>
                            <option value="6">Topi</option>
                            <option value="7">Celana</option>
                            <option value="8">Etc</option>
                            <!-- <option value="tad">Tas</option>
                            <option value="pakaian">Pakaian</option>
                            <option value="lainnya">Lainnya</option> -->
                        </select>
                            <span><i class="fa fa-chevron-down"></i></span>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <i class="fa fa-check disabled invalid color-red-dark"></i>
                        <em></em>
                    </div>
                </div>
                <div class="d-flex content mt-1 mb-3 flex-wrap d-none">
                    <a href="?catregory=sepatu" class="flex-grow-1 align-self-center" style="width:33.333%">
                        <div class="card card-style rounded-3 m-1 p-3 text-center justify-content-center align-items-center" data-card-height="150">
                            <img src="<?= base_url(('assets/front/images/icons/shoes.png')) ?>" alt="" style="width: 70%;">
                            <p>Sepatu</p>
                        </div>
                    </a>
                    <a href="?catregory=pakaian" class="flex-grow-1 align-self-center" style="width:33.333%">
                        <div class="card card-style rounded-3 m-1 p-3 text-center justify-content-center align-items-center" data-card-height="150">
                            <img src="<?= base_url(('assets/front/images/icons/tshirt.png')) ?>" alt="" style="width: 70%;">
                            <p>Pakaian</p>
                        </div>
                    </a>
                    <a href="?catregory=tas" class="flex-grow-1 align-self-center" style="width:33.333%">
                        <div class="card card-style rounded-3 m-1 p-3 text-center justify-content-center align-items-center" data-card-height="150">
                            <img src="<?= base_url(('assets/front/images/icons/bag.png')) ?>" alt="" style="width: 70%;">
                            <p>Tas</p>
                        </div style="width: 70%;">
                    </a>
                </div>
                <div class="d-flex content mb-1">
                    <!-- left side of profile -->
                    <div class="flex-grow-1">
                        <h5 class="font-600 mb-0 lh-1">Masukan Brand</h5>
                    </div>
                </div>
                <!-- <div class="content d-none">
                    <div class="input-style has-borders no-icon mb-4">
                        <label for="form6" class="color-highlight">Pilih Brand</label>
                        <select id="form6" name="brand" required>
                            <option value="default" disabled selected>Pilih Brand</option>
                            <option value="1">Vans</option>
                            <option value="2">Converse</option>
                        </select>
                        <span><i class="fa fa-chevron-down"></i></span>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <i class="fa fa-check disabled invalid color-red-dark"></i>
                        <em></em>
                    </div>
                </div> -->
                <div class="content">
                    <div class="input-style has-borders no-icon validate-field mb-4">
                        <input type="text" class="form-control validate-text" name="brand" id="form4" placeholder="Nama Brand" required>
                        <label for="form4" class="color-highlight">Nama Brand</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                </div>
                <div class="d-flex content mb-1">
                    <div class="flex-grow-1">
                        <h5 class="font-600 mb-0 lh-1">Nama Item</h5>
                    </div>
                </div>
                <div class="content">
                    <div class="input-style has-borders no-icon validate-field mb-4">
                        <input type="text" class="form-control validate-text" name="nama_item" id="form4" placeholder="Nama Item" required>
                        <label for="form4" class="color-highlight">Nama Item</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                </div>
                <div class="d-flex content mb-1">
                    <div class="flex-grow-1">
                        <h5 class="font-600 mb-0 lh-1">Foto</h5>
                    </div>
                </div>
                <div class="d-flex content mt-1 mb-3 flex-wrap imagepickercontainer">
                    <!-- <div class="flex-grow-1 align-self-center" style="width:33.333%">
                        <div class="upload-btn-wrapper">
                            <button class="btn">
                                <i class="mb-2 fas fa-image"></i>
                                <p>Exterior Outer</p>
                                <img src="" id="output" class="image_thumbnails_previews_1 d-none image_primary ">
                            </button>
                            <input type="file" name="produk_image[]" data-pick="1" class="fotoimg pickimage" data-imgtype='primary' required/>
                        </div>
                    </div>
                    <div class="flex-grow-1 align-self-center" style="width:33.333%">
                        <div class="upload-btn-wrapper">
                            <button class="btn">
                                <i class="mb-2 fas fa-image"></i>
                                <p>Exterior Inner</p>
                                <img src="" id="output" class="image_thumbnails_previews_2 d-none image_primary ">
                            </button>
                            <input type="file" name="produk_image[]" data-pick="2" class="fotoimg pickimage" data-imgtype='primary' required/>
                        </div>
                    </div>
                    <div class="flex-grow-1 align-self-center" style="width:33.333%">
                        <div class="upload-btn-wrapper">
                            <button class="btn">
                                <i class="mb-2 fas fa-image"></i>
                                <p>Inside Label</p>
                                <img src="" id="output" class="image_thumbnails_previews_3 d-none image_primary ">
                            </button>
                            <input type="file" name="produk_image[]" data-pick="3" class="fotoimg pickimage" data-imgtype='primary' required/>
                        </div>
                    </div>
                    <div class="flex-grow-1 align-self-center" style="width:33.333%">
                        <div class="upload-btn-wrapper">
                            <button class="btn">
                                <i class="mb-2 fas fa-image"></i>
                                <p>Tag Front</p>
                                <img src="" id="output" class="image_thumbnails_previews_4 d-none image_primary ">
                            </button>
                            <input type="file" name="produk_image[]" data-pick="4" class="fotoimg pickimage" data-imgtype='primary' required/>
                        </div>
                    </div>
                    <div class="flex-grow-1 align-self-center" style="width:33.333%">
                        <div class="upload-btn-wrapper">
                            <button class="btn">
                                <i class="mb-2 fas fa-image"></i>
                                <p>Tag Back</p>
                                <img src="" id="output" class="image_thumbnails_previews_5 d-none image_primary ">
                            </button>
                            <input type="file" name="produk_image[]" data-pick="5" class="fotoimg pickimage" data-imgtype='primary' required/>
                        </div>
                    </div>
                    <div class="flex-grow-1 align-self-center" style="width:33.333%">
                        <div class="upload-btn-wrapper">
                            <button class="btn">
                                <i class="mb-2 fa-solid fa-plus"></i>
                                <p>Add More</p>
                                <img src="" id="output" class="image_thumbnails_previews d-none image_primary ">
                            </button>
                        </div>
                    </div> -->
                </div>
                <div class="d-flex content mb-1">
                    <!-- left side of profile -->
                    <div class="flex-grow-1">
                        <h5 class="font-600 mb-0 lh-1">Catatan lainnya</h5>
                    </div>
                </div>
                <div class="content">
                    <div class="input-style has-borders no-icon mb-4">
                        <textarea id="form7" name="catatan" placeholder="Masukan Catatan"></textarea>
                        <label for="form7" class="color-highlight">Masukan Catatan</label>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-600 shadow-s bg-dark-light">Kirim</button>
                            </div>
                            <!-- <a href="#" type="submit" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-600 shadow-s bg-dark-light checkss">Kirim</a> -->
                            <!-- <a href="<?= base_url('legitchcek/send') ?>" type="submit" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-600 shadow-s bg-dark-light">Kirim</a> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
    </div>
</div>
    
<?php include('include/footer.php'); ?>