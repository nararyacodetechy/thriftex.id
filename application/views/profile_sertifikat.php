<?php include('include/header.php'); ?>

<div class="row me-0 ms-0 mb-0 justify-content-md-center">
    <div class="col col-lg-4 ms-0 me-0 ps-0 pe-0">
        <div class="card mb-2 pb-4 min-h-1vh">
        <div class="content mb-0">
                <div class="row mb-2 mt-n2">
                    <div class="col-6 text-start">
                        <h4 class="font-700 text-uppercase font-12 opacity-50">Sertifikat Saya</h4>
                    </div>
                </div>
                <div class="divider mb-3"></div>
                <?php foreach ($list_sertif as $key => $value) { ?>
                    <div class="d-flex justify-content-between mb-2">
                        <div class="align-self-center w-100">
                            <a href="#" class="<?= ($value['status'] != 'accepted') ? '#' : 'detail_sertif'; ?>">
                            <?php
                                $title = '';
                                if($value['status'] == 'new' || $value['status'] == 'pending'){
                                    $badge_color = 'bg-yellow-light';
                                    $title = 'is in preview';
                                }elseif($value['status'] == 'accepted'){
                                    $badge_color ='bg-green-dark';
                                    $title = 'Complete';
                                }elseif($value['status'] == 'rejected'){
                                    $badge_color = 'bg-red-dark';
                                    $title = 'Rejected';
                                }else{
                                    $badge_color = 'bg-yellow-light';
                                }
                            ?>
                            <p class="mb-0"><span class="badge <?= $badge_color ?> color-white border-0 font-10" style="transform:translateY(-2px);"><?= $title?></span></p>
                            <h5 class="mb-0 font-600">#<?= $value['sertif_code'] ?></h5>
                            <div style="line-height: 1em;" class="mt-2 mb-2">
                                <p class="mb-0 mt-0 font-9"><i class="fa-solid fa-store"></i> <?= $value['nama_toko']?></p>
                                <p class="mb-0 mt-0 font-9"><i class="fa-regular fa-clock"></i> Created at : <?= $value['created_at']?></p>
                                <?php
                                if(!empty($value['note'])){
                                ?>
                                <p class="catatan" style="padding: 10px;border: 1px solid #ececec;background: #f7f7f7;border-radius: 5px;"><?= $value['note'] ?></p>
                                <?php 
                                }
                                ?>
                            </div>
                            </a>
                        </div>
                        <div class="align-self-center">
                            <?php
                            if($value['status'] != 'accepted'){
                                ?>
                            <a class="d-flex ms-3 align-self-center" onclick="return confirm('Yakin ingin membatalkan proses ini?')" style="color:red" href="<?= base_url('profile/sertifikat/cencel/'.$value['id']) ?>"><i class="fas fa-trash"></i> <span style="line-height:1;margin-left: 5px;">Hapus</span></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="divider mb-3"></div>
                <?php } ?>
                
                
            </div> 
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="DetailSertif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DetailSertifLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content rounded-sm">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="DetailSertifLabel">Detail Sertifikat</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex flex-column justify-content-center align-items-center certificate-body">
            <h1>Authentic certificate</h1>
            <svg width="50px" height="50px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>certificate_fill</title>
                <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="System" transform="translate(-334.000000, -240.000000)">
                        <g id="certificate_fill" transform="translate(334.000000, 240.000000)">
                            <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero">
                            </path>
                                <path d="M10.5857,2.10056 C11.3256895,1.36061789 12.5011493,1.32167357 13.2868927,1.98372704 L13.4141,2.10056 L15.3136,4.00005 L17.9999,4.00005 C19.0542909,4.00005 19.9180678,4.81592733 19.9944144,5.85078759 L19.9999,6.00005 L19.9999,8.68632 L21.8994,10.5858 C22.6393895,11.3257895 22.6783363,12.5012493 22.0162404,13.2870778 L21.8994,13.4143 L19.9999,15.3138 L19.9999,18.0001 C19.9999,19.0543955 19.18405,19.9182591 18.1491661,19.9946139 L17.9999,20.0001 L15.3136,20.0001 L13.4141,21.8995 C12.6742053,22.6394895 11.4987504,22.6784363 10.7129222,22.0163404 L10.5857,21.8995 L8.68622,20.0001 L5.99991,20.0001 C4.94554773,20.0001 4.08174483,19.1841589 4.00539573,18.1493537 L3.99991,18.0001 L3.99991,15.3137 L2.10043,13.4143 C1.36049737,12.6743105 1.32155355,11.4988507 1.98360703,10.7130222 L2.10044,10.5858 L3.99991,8.68636 L3.99991,6.00005 C3.99991,4.94568773 4.81578733,4.08188483 5.85064759,4.00553573 L5.99991,4.00005 L8.68622,4.00005 L10.5857,2.10056 Z M15.0794,8.98261 L10.8348,13.2271 L9.06704,11.4594 C8.67652,11.0689 8.04336,11.0689 7.65283,11.4594 C7.26231,11.8499 7.26231,12.4831 7.65283,12.8736 L10.057,15.2778 C10.4866,15.7073 11.1831,15.7073 11.6126,15.2778 L16.4936,10.3968 C16.8841,10.0063 16.8841,9.37314 16.4936,8.98261 C16.103,8.59209 15.4699,8.59209 15.0794,8.98261 Z" id="形状" fill="#09244B">
                            </path>
                        </g>
                    </g>
                </g>
            </svg>
            <div class="text-start">
                <h5>CODEDISINI</h5>
                <p>
                    For the experience he/ she has gained in our website. We are hereby verifiedthat this iter STUSSY BEANIE HAT by AJE GILE. Is authenticated 100% original by our partner from STUSSY ARCHIVE INDO for 3 YEAR more experience has gained and trained in our community, brand or company.
                </p>
                <p>
                    It was our great pleasure to engaging with AJE GILE for this authentic certificate and her proved himself/herself as one of most important people of this brand. We wish that with this certificate we can cultivate original goods or products
                </p>
                <br>
            </div>
            <p>THRIFTEXT</p>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


<?php include('include/footer.php'); ?>