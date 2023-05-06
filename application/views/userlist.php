<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 mt-3 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 pb-4 min-h-1vh">
            <div class="content mb-2">
                <h3>Daftar User</h3>
                <p>
                    Daftar user yang sudah melakukan register di website
                </p>
                <div class="search-box search-header bg-theme card-style me-0 ms-0 mb-2">
                    <i class="fa fa-search"></i>
                    <input type="text" class="border-0 searchInput" placeholder="Cari nama user... ">
                    <a href="#" class="clear-search disabled mt-0"><i class="fa fa-times color-red-dark"></i></a>
                </div>
                <!-- datatable requirement -->
                <input type="hidden" id="list_url" value="<?= base_url('user-list') ?>" name="">
                <!-- <input type="hidden" id="list_url" value="<?= api_url('users/userlist?type=1') ?>" name=""> -->
                <div style="display: none;" id="table_column">[{"data":"data_nama"}]</div>
                <div style="display: none;" id="table_columnDef">[{"className":"p-3","targets":[0]},{"className":"text-end","targets":[1]}]</div>
                <div style="display: none;" data-style="dropdown" id="table_action">{"detail":true,"delete":true}</div>
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
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content rounded-sm">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="DetailUserLabel">Detail User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

    
<?php include('include/footer.php'); ?>