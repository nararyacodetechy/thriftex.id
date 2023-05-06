<div class="footer card">
    <div class="text-center mb-3">
    </div>
    <div class="clear"></div>
    <div class="row">
        <div class="col-12 col-md-4 text-md-start">
        <?php
        if($this->session->userdata('login') == true){
        ?>
            <p class="footer-copyright"><a href="#" data-menu="menu-masukan" class=""> Masukan</a></p>
        <?php } ?>
        </div>
        <div class="col-12 col-md-4">
            <p class="footer-copyright">Copyright &copy; thriftex.id <span id="copyright-year">2023</span>. All Rights Reserved.</p>
        </div>
        <div class="col-12 col-md-4 text-center text-md-end">
            <a href="#" class="icon icon-xs icon-gray"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="icon icon-xs icon-gray"><i class="fab fa-twitter"></i></a>
            <a href="#" class="icon icon-xs icon-gray"><i class="fa fa-phone"></i></a>
        </div>
        
    </div>
    <div class="clear"></div>
</div>
</div>
    <!-- End of Page Content--> 
    <!-- All Menus, Action Sheets, Modals, Notifications, Toasts, Snackbars get Placed outside the <div class="page-content"> -->
    <?php include(__DIR__.'/sidebar.php'); ?>
    <?php include(__DIR__.'/auths.php'); ?>
    
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
            </div>
            <div class="divider mb-4 mt-n1"></div>
            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-full sendmailbtn btn-m shadow-l rounded-s text-uppercase font-900 bg-dark-dark mt-n2">Kirim</button>
            </div>
        </form>
    </div>
</div>
<?php } ?>
<script type="text/javascript" src="<?= get_template_directory_asst('assets/front/plugins/jquery-3.6.4.min.js') ?>"></script>
<script type="text/javascript" src="<?= get_template_directory_asst('assets/front/scripts/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?= get_template_directory_asst('assets/front/scripts/custom.js') ?>"></script>
<script type="text/javascript" src="<?= get_template_directory_asst('assets/front/scripts/app.js') ?>"></script>
</body>
