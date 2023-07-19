

<div class="row me-0 ms-0 mb-0 mt-3 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 pb-4 min-h-1vh">
            <div class="content mb-2">
                <div class="d-flex justify-content-between align-items-center mt-3 mb-4">
                    <h3>Data Sertifikat By Toko</h3>
                </div>
                <div class="search-box search-header bg-theme card-style me-0 ms-0 mb-2">
                    <i class="fa fa-search"></i>
                    <input type="text" class="border-0 searchInput" placeholder="Cari nama toko... ">
                    <a href="#" class="clear-search disabled mt-0"><i class="fa fa-times color-red-dark"></i></a>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <div class="">
                        <select class="niceSelect wide">
                            <option data-display="Pilih Berdasarkan Toko" selected>Pilih Toko</option>
                            <?php
                            foreach ($data_toko as $key => $value) {
                                echo '<option value="'.$value['nama_toko'].'">'.$value['nama_toko'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div></div>
                </div>
                <div id="notifdelete" class="toast toast-tiny toast-top bg-green-dark notif_regis" data-bs-delay="1500" data-autohide="true"></div>
                <!-- datatable requirement -->
                <input type="hidden" id="list_url" value="<?= base_url('sertif-list-newregis') ?>" name="">
                <div style="display: none;" id="table_column">[{"data":"data_nama"},{"data":"nama_toko"}]</div>
                <div style="display: none;" id="table_columnDef">[{"className":"p-3","targets":[0]},{"className":"text-end","targets":[1]}]</div>
                <div style="display: none;" data-style="dropdown" id="table_action">{"detailregis":true}</div>
                <!-- END datatable requirement -->
                <table class="table table-hover rounded-s shadow-l datatable" style="overflow: hidden;" table-jx id="datatable">
                    <thead>
                        <tr class="bg-night-light sata">
                            <th scope="col" class="color-white p-3">Nama</th>
                            <th scope="col" class="color-white p-3">Nama Toko</th>
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
<div class="modal fade" id="DetailSertif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DetailSertifLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content rounded-sm">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="DetailSertifLabel">Detail Registrasi Sertifikat</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="notifregis" class="toast toast-tiny toast-top bg-green-dark notif_regis" data-bs-delay="1500" data-autohide="true"></div>
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>sertifSubmit Info</b></li>
                    <li class="list-group-item">Sertif Kode : <span class="fieldmodal_sertif_code "></span></li>
                    <li class="list-group-item">Tanggal Kirim : <span class="fieldmodal_created_at "></span></li>
                    <li class="list-group-item">Nama User : <span class="fieldmodal_nama"></span></li>
                    <li class="list-group-item">Email : <span class="fieldmodal_email "></span></li>
                    <li class="list-group-item"><b>Toko Info</b></li>
                    <li class="list-group-item">Nama Toko : <span class="fieldmodal_nama_toko"></span></li>
                    <li class="list-group-item">Alamat Toko : <span class="fieldmodal_alamat"></span></li>
                </ul>
                <div class="container mt-3">
                    <h5>Aksi :</h5>
                    <form action="<?= base_url('sertif-check/validated') ?>" method="post" id="form-validate-sertif" data-idsertif="">
                        <div class="mb-3">
                            <input type="hidden" name="id_sertif" value="" class="fieldmodal_id">
                            <div class="fac fac-radio fac-green"><span></span>
                                <input id="box5-fac-radio" class="sertif_status" type="radio" name="sertif_status" value="accepted" >
                                <label for="box5-fac-radio">Terima</label>
                            </div>
                            <!-- <div class="fac fac-radio fac-blue"><span></span>
                                <input id="box4-fac-radio" class="sertif_status" type="radio" name="sertif_status" value="pending" >
                                <label for="box4-fac-radio">Ragu</label>
                            </div> -->
                            <div class="fac fac-radio fac-red"><span></span>
                                <input id="box6-fac-radio" class="sertif_status" type="radio" name="sertif_status" value="rejected">
                                <label for="box6-fac-radio">Tolak</label>
                            </div>
                        </div>
                        <label for="">Catatan : </label>
                        <textarea name="catatan" class="form-control" id="" cols="30" rows="5"></textarea>
                        <button type="submit" class=" rounded-xs mt-2 btn btn-primary save-sertif-regis">Simpan</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <h5>File Bukti :</h5>
                <div class="gallery-file row" id="data-gallery"></div>
                <!-- <a class="col mb-4" data-gallery="gallery-2" href="<?= base_url('media/'.$value['file_path']) ?>" title="Vynil and Typerwritter">
                    <img src="<?= base_url('media/'.$value['file_path']) ?>" data-src="<?= base_url('media/'.$value['file_path']) ?>" class="preload-img img-fluid rounded-xs object-fit image_gallerys" alt="img">
                </a> -->
            </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>