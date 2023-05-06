<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 pb-4 min-h-1vh">
            <div class="content mb-0">
                <div class="row mb-2 mt-n2">
                    <div class="col-6 text-start">
                        <h4 class="font-700 text-uppercase font-12 opacity-50">Legit Result</h4>
                    </div>
                </div>
                <div class="divider mb-3"></div>
                <div class="text-center">
                    <h1>YOUR LEGIT CHECK RESULT</h1>
                    <h5>Case ID : #<?= $legit_data[0]['case_code'] ?></h5>
                    <div class="clear_p font-10">
                        <p>Submitted At : <?= $legit_data[0]['submit_time'] ?></p>
                    </div>
                    <?php
                        if($legit_data[0]['check_result'] == 'processing'){
                            $badge_color = 'bg-blue-light';
                        }elseif($legit_data[0]['check_result'] == 'Checking'){
                            $badge_color ='bg-yellow-dark';
                        }elseif($legit_data[0]['check_result'] == 'Original'){
                            $badge_color ='bg-green-dark';
                        }elseif($legit_data[0]['check_result'] == 'fake'){
                            $badge_color = 'bg-red-dark';
                        }else{
                            $badge_color = 'bg-yellow-light';
                        }
                    ?>
                    <h6 class="<?= $badge_color ?> p-2 rounded-xs d-inline-block font-18 mt-5"><?= $legit_data[0]['check_result'] ?></h6>
                </div>
                <div class="divider mb-3 mt-3"></div>
                <div class="row text-center row-cols-3 mb-0 mt-4">
                    <?php
                    foreach($legit_data[0]['image_list'] as $key=>$value){
                    ?>
                        <a class="col mb-4" data-gallery="gallery-2" href="<?= base_url('media/'.$value['file_path']) ?>" title="Vynil and Typerwritter">
                            <img src="<?= base_url('media/'.$value['file_path']) ?>" data-src="<?= base_url('media/'.$value['file_path']) ?>" class="preload-img img-fluid rounded-xs object-fit image_gallerys" alt="img">
                        </a>
                    <?php
                    }
                    ?>
                </div>
                <div class="divider mb-3 mt-3"></div>
            </div> 
            <div class="content">
                <?php
                if(isset($legit_data[0]['authentic_comment']) && !empty($legit_data[0]['authentic_comment'])){ ?>
                    <h6>Authenticator Comments</h6>
                    <div class="bg-theme mt-4">
                            <?php  foreach ($legit_data[0]['authentic_comment'] as $key => $value) { ?>
                                    <div class="d-flex border-xxs p-3 border-gray-light rounded-xs">
                                        <div class="align-self-center p-3">
                                            <!-- <img src="images/pictures/faces/1s.png" width="45" alt="img" class="rounded-xl me-3"> -->
                                            <i class="fa-regular fa-user"></i>
                                        </div>
                                        <div class="align-self-center">
                                            <span class="font-11 ps-2 d-inline-block font-700 color-theme">Authenticator - <?= $value['nama'] ?></span>
                                            <span class="font-9 ps-1 d-inline-block font-400 color-theme opacity-40"><?= $value['final_time_check'] ?></span>
                                            <div class="bg-theme shadow-m px-3 py-2 rounded-m">
                                                <p class="lh-base mb-0 color-theme"><?= $value['check_note'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
    
<?php include('include/footer.php'); ?>