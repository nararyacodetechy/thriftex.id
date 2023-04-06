<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 pb-4 min-h-1vh">
        <div class="content mb-0">
                <div class="row mb-2 mt-n2">
                    <div class="col-6 text-start">
                        <h4 class="font-700 text-uppercase font-12 opacity-50"><?= $title ?></h4>
                    </div>
                </div>
                <div class="divider mb-3"></div>
                <?php
                foreach ($list_legit as $key => $value) { ?>
                    <a href="<?= base_url('legit/check/'.$value['case_code']) ?>" class="d-flex mb-2">
                        <div class="align-self-center">
                            <img src="<?= base_url('media/'.$value['file_path']) ?>" width="60" height="60px" class="rounded-s me-3 object-fit">
                        </div>
                        <div class="align-self-center w-100">
                            <h5 class="color-dark-light font-500 font-13 mb-0">#<?= $value['case_code']?><span class="badge ms-1 bg-dark-light color-white border-0 font-8 rounded-sm"><?= $value['brand_name'] ?></span></h5>
                            <h5 class="mb-0 font-600"><?= $value['nama_item']?></h5>
                            <p class="mb-0 mt-0 font-9">Created at <?= $value['submit_time']?></p>
                        </div>
                        <div class="align-self-center">
                            <?php
                                if($value['check_result'] == 'Process'){
                                    $badge_color = 'bg-yellow-light';
                                }elseif($value['check_result'] == 'Checking'){
                                    $badge_color = 'bg-yellow-dark';
                                }elseif($value['check_result'] == 'fake'){
                                    $badge_color = 'bg-red-dark';
                                }else{
                                    $badge_color = 'bg-green-light';
                                }
                                $cek_result = 'New!';
                                if($value['check_result'] != null){
                                    $cek_result = $value['check_result'];
                                }
                            ?>
                        <p class="mb-0"><span class="badge ms-1 <?= $badge_color ?> color-white border-0 font-10" style="transform:translateY(-2px);"><?= $cek_result ?></span></p>
                        </div>
                    </a>
                    <div class="divider mb-3"></div>
                <?php } ?>
                
                
            </div> 
        </div>
    </div>
</div>
    
<?php include('include/footer.php'); ?>