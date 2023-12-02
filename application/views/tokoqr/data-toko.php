

<div class="row me-0 ms-0 mb-0 mt-3 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 pb-4 min-h-1vh">
            <div class="content mb-2">
                <div class="d-flex justify-content-between align-items-center mt-3 mb-4">
                    <h3>Data Akun Brand</h3>
                    <button type="button" class="btn btn-sm rounded-s bordered btn-m mb-3 rounded-0 text-uppercase font-600 shadow-s bg-dark-light tokoadd">Register akun Brand</button>
                </div>
                <div class="search-box search-header bg-theme card-style me-0 ms-0 mb-2">
                    <i class="fa fa-search"></i>
                    <input type="text" class="border-0 searchInput" placeholder="Cari nama toko... ">
                    <a href="#" class="clear-search disabled mt-0"><i class="fa fa-times color-red-dark"></i></a>
                </div>
                <div id="notifdelete" class="toast toast-tiny toast-top bg-green-dark notif_regis" data-bs-delay="1500" data-autohide="true"></div>
                <!-- datatable requirement -->
                <input type="hidden" id="list_url" value="<?= base_url('tokoqr-list') ?>" name="">
                <div style="display: none;" id="table_column">[{"data":"data_nama"}]</div>
                <div style="display: none;" id="table_columnDef">[{"className":"p-3","targets":[0]},{"className":"text-end","targets":[1]}]</div>
                <div style="display: none;" data-style="dropdown" id="table_action">{"detail":false,"deletetoko":false}</div>
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
<div class="modal fade" id="DetailUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DetailUserLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content rounded-sm">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="DetailUserLabel">Detail Toko</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="notifregis" class="toast toast-tiny toast-top bg-green-dark notif_regis" data-bs-delay="1500" data-autohide="true"></div>
        <div class="row">
            <div class="col-md-6">
                <form action="<?= base_url('update-register-toko') ?>" method="post" id="post_update_register">
                <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Akun Info</b></li>
                        <li class="list-group-item">Nama User : <span class="fieldmodal_nama"></span></li>
                        <li class="list-group-item">Email : <span class="fieldmodal_email "></span></li>
                        <li class="list-group-item"><b>Toko Info</b></li>
                        <input type="hidden" name="toko_id" class="fieldmodal_toko_id">
                        <li class="list-group-item">Nama Toko : <input type="text" name="nama_toko" class="form-control fieldmodal_nama_toko"></li>
                        <li class="list-group-item">Alamat Toko : <input type="text" name="alamat" class="form-control fieldmodal_alamat"></li>
                        <li class="list-group-item"><button type="submit" class="btn btn-primary update-toko-regis">Simpan</button></li>
                    </ul>
                </form>
            </div>
            <div class="col-md-6">
                <h5>QR Code :</h5>
                <a href="" class="downloadlink" download>Download QR Code</a>
                <img class="fieldmodal_qrcode" src="<?= base_url('qrcode/') ?>" style="width: 100%;border: 2px solid #e5e5e5;">
            </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="AddToko" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddTokoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content rounded-sm">
    <div id="notifregis" class="toast toast-tiny toast-top bg-green-dark notif_regis" data-bs-delay="1500" data-autohide="true"></div>
    <form action="<?= base_url('save-register-brand') ?>" method="post" id="post_register">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="AddTokoLabel">Tambah Data Toko</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="d-flex content mb-1">
                    <div class="flex-grow-1">
                        <h5 class="font-600 mb-0 lh-1">Nama Brand</h5>
                    </div>
                </div>
                <div class="content">
                    <div class="input-style has-borders no-icon validate-field mb-4">
                        <input type="text" class="form-control validate-text" name="nama_brand" id="form4" placeholder="Nama Toko" required>
                        <label for="form4" class="color-highlight">Nama Toko</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                </div>
                <div class="d-flex content mb-1">
                    <div class="flex-grow-1">
                        <h5 class="font-600 mb-0 lh-1">Pilih Akun</h5>
                    </div>
                </div>
                <div class="content has-borders no-icon mb-4">
                    <select id="form5" name="id_user" class="select2 select2_brand form-select" required>
                        <option value="default" disabled selected>Pilih Akun</option>
                    </select>
                </div>
        </div>
        <div class="modal-footer">
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn rounded-s btn-primary submit-regis">Simpan</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>