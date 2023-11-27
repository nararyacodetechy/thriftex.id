
</div>
</div>
<?php if($this->session->userdata('login') == true){ ?>
<!-- Menu Modal Sheet Cart-->
<div id="menu-masukan" class="menu menu-box-modal">
    <div class="menu-title"><h1>Masukan</h1><p class="">Silahkan isi form dibawah ini untuk memberi masukan</p><a href="#" class="close-menu"><i class="fa fa-times"></i></a></div>
    <div class="divider divider-margins"></div>
    <div class="content mb-0">
        <div id="toast-notiff-fdbck" class="toast toast-tiny toast-top bg-green-dark" data-bs-delay="2000" data-autohide="true"><i class="fa fa-check me-3"></i>Terima kasih :)</div>
        <form action="<?= base_url('feedback') ?>" method="post" id="sendfeedback">
            <div class="input-style has-borders no-icon mb-4">
                <textarea id="form7" placeholder="Enter your message" name="feedback_txt"></textarea>
                <label for="form7" class="color-highlight">Enter your Message</label>
                <em class="mt-n3">(required)</em>
            </div>
            <div class="divider mb-4 mt-n1"></div>
            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-full sendmailbtn btn-m shadow-l rounded-s text-uppercase font-900 bg-dark-dark mt-n2">Kirim</button>
            </div>
        </form>
    </div>
</div>
<?php } ?>
<script type="text/javascript">
<?php $site_data = [ 'base_url' => base_url() ]; ?>
var site_data = <?php echo json_encode($site_data); ?>;
</script>
<script type="text/javascript" src="<?= get_template_directory_asst('assets/front/plugins/jquery-3.6.4.min.js') ?>"></script>
<script type="text/javascript" src="<?= get_template_directory_asst('assets/front/scripts/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?= get_template_directory_asst('assets/front/scripts/slick.min.js') ?>"></script>
<script type="text/javascript" src="<?= get_template_directory_asst('assets/front/scripts/custom.js') ?>"></script>
<script type="text/javascript" src="<?= get_template_directory_asst('assets/front/scripts/app.js') ?>"></script>
</body>
