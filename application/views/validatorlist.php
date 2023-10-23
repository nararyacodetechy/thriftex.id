<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 mt-3 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 pb-4 min-h-1vh">
            <div class="content mb-2">
                <h3>Daftar Validator</h3>
                <p>
                    Daftar validator yang sudah terdaftar
                </p>
                <div class="search-box search-header bg-theme card-style me-0 ms-0 mb-2">
                    <i class="fa fa-search"></i>
                    <input type="text" class="border-0 searchInput" placeholder="Cari nama user... ">
                    <a href="#" class="clear-search disabled mt-0"><i class="fa fa-times color-red-dark"></i></a>
                </div>
                <!-- datatable requirement -->
                <input type="hidden" id="list_url" value="<?= base_url('validator-list') ?>" name="">
                <!-- <input type="hidden" id="list_url" value="<?= api_url('users/userlist?type=1') ?>" name=""> -->
                <div style="display: none;" id="table_column">[{"data":"data_nama"}]</div>
                <div style="display: none;" id="table_columnDef">[{"className":"p-3","targets":[0]},{"className":"text-end","targets":[1]}]</div>
                <div style="display: none;" data-style="dropdown" id="table_action">{"edit":true,"deletevalidator":true}</div>
                <!-- END datatable requirement -->
                <table class="table table-hover rounded-s shadow-l datatable" style="overflow: hidden;" table-jx id="datatable">
                    <thead>
                        <tr class="bg-night-light sata">
                            <th scope="col" class="color-white p-3">Nama</th>
                            <th scope="col" class="color-white p-3 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="EditValidator" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditValidatorLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content rounded-sm">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="EditValidatorLabel">Edit Validator</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('updatevalidator') ?>" method="post" id="jxfm">
            <input type="hidden" name="id_user" class="validator_id">
            <div class="input-style no-borders has-icon validate-field mt-3">
                <i class="fa fa-user"></i>
                <input type="name" name="nama" class="form-control myinput validate-name validator_nama" data-iden="nama" id="form1ac" placeholder="Nama lengkap" required disabled>
                <label for="form1ac" class="color-blue-dark font-10">Nama lengkap</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="valid-feedback color-red-dark field_nama"></div>
            <div class="input-style no-borders no-icon mb-4">
                <label for="form5a" class="color-highlight">Pilih Spesialis Brand</label>
                <select id="form5a" name="validator_brand_id" class="validator_validator_brand_id">
                    <option value="" disabled selected>Pilih Brand</option>
                    <option value="1">Vans</option>
                    <option value="2">Converse</option>
                    <option value="3">Nike</option>
                    <option value="4">Adidas</option>
                    <option value="5">Puma</option>
                    <option value="6">New Balance</option>
                    <option value="7">Reebok</option>
                    <option value="8">Dickies</option>
                    <option value="9">Stussy</option>
                    <option value="10">Carhartt</option>
                    <option value="11">Offwhite</option>
                    <option value="12">Supreme</option>
                    <option value="13">Bape</option>
                    <option value="14">Other Brand</option>
                </select>
                <span><i class="fa fa-chevron-down"></i></span>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <i class="fa fa-check disabled invalid color-red-dark"></i>
                <em></em>
            </div>
            <div class="d-grid gap-2 mt-4">
                <button type="submit" id="" class="btn btn-full btn-m shadow-l rounded-s text-uppercase font-900 bg-blue-dark mt-n2">Simpan</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

    
<?php include('include/footer.php'); ?>