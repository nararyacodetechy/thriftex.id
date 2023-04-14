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


<!-- menu-gdpr -->
<div id="menu-modal-gdpr" class="menu menu-box-modal menu-box-detached rounded-m" data-menu-height="450">
    <div class="menu-title mt-n1">
        <h1>Personal Information</h1>
        <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
    </div>
    <div class="content mt-2">
        <div class="divider mb-3"></div>
        <div class="d-flex pt-1">
            <div class="align-self-center"><a href="#" class="icon font-12 color-theme  pe-3 ms-2"><i class="fa fa-user"></i></a></div>
            <div class="align-self-center"><h5 class="mb-1">Personal Information</h5></div>
        </div>
        <ul class="px-5 mx-2 line-height-s pt-2 pb-2">
            <li>Favorite Songs</li>
            <li>Favorite Albums</li>
        </ul>
        <div class="d-flex">
            <div class="align-self-center"><a href="#" class="icon font-12 color-theme  pe-3 ms-2"><i class="fa fa-chart-pie"></i></a></div>
            <div class="align-self-center"><h5 class="mb-1">App Usage and Analytics</h5></div>
        </div>
        <ul class="px-5 mx-2 line-height-s pt-2 pb-2">
            <li>Hours Listened</li>
        </ul>
        <div class="d-flex">
            <div class="align-self-center"><a href="#" class="icon font-12 color-theme  pe-3 ms-2"><i class="fa fa-bullseye"></i></a></div>
            <div class="align-self-center"><h5 class="mb-1">Identifiers</h5></div>
        </div>
        <ul class="px-5 mx-2 line-height-s pt-2 pb-3">
            <li>Hours Listened</li>
            <li>Media Types Liked</li>
        </ul>
        <a href="#" data-menu="menu-gdpe-confirm" class="btn btn-m btn-full bg-blue-dark text-uppercase rounded-sm font-800">Cencel</a>
    </div>
</div>
    
<?php include('include/footer.php'); ?>