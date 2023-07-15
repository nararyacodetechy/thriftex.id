$(document).ready(function(){
    if($('[data-mailto]').length){
        $(document).on('click','[data-mailto]', function(e){
            var mails = $(this).attr('data-mailto');
            window.location.href = mails;
        });
    }
    if($('#copycode').length){
        $(document).on('click','#copycode',function(e){
            e.preventDefault(0);
            var $temp = $(".casecode").select();
            document.execCommand("copy");
            $('.copy-text').addClass('active');
            window.getSelection().removeAllRanges();
            setTimeout(() => {
                $('.copy-text').removeClass('active');
            }, 2500);
        });
    }
    if($('.imagepickercontainer').length > 0){
        var albumList = {
            albums: [],
            addAlbum: function(title, artist, year) {
                this.albums.push({
                    title,
                    artist,
                    year
                });
            }
        };
        const viewData = {
            tampilakn: function(){
                albumList.albums.forEach(function(k,v){
                    console.log(v);
                });
            }
        }
        $(document).on('click','.checkss', function(e){
            e.preventDefault(0);
            albumList.addAlbum('saya makan','dini','2022');
            // viewData.tampilakn();
            console.log(albumList.albums);
        });
        const pickJson = [
            {'id' : '1','name' : 'Foto 1'},
            {'id' : '2','name' : 'Foto 2'},
            {'id' : '3','name' : 'Foto 3'},
            {'id' : '4','name' : 'Foto 4'},
            {'id' : '5','name' : 'Foto 5'},
            {'id' : '6','name' : 'Foto 6'},
        ]
        $.each(pickJson, function(k,v){
            var el =    '<div class="flex-grow-1 align-self-center" style="width:33.333%">'+
                            '<div class="upload-btn-wrapper">'+
                                '<button class="btn">'+
                                    '<i class="mb-2 fas fa-image"></i>'+
                                    '<p>'+v.name+'</p>'+
                                    '<img src="" id="output" class="image_thumbnails_previews_'+v.id+' d-none image_primary ">'+
                                '</button>'+
                                '<input type="file" name="legitimage[]" data-pick="'+v.id+'" class="fotoimg pickimage" data-imgtype="primary" accept="capture=camera,image/*"/>'+
                            '</div>'+
                        '</div>'
            // console.log(v.id);
            $('.imagepickercontainer').append(el);
        });
        // console.log(pickJson);
    }

    if($('#register_submit').length){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $(document).on('click','#login', function(e){
            e.preventDefault(0);
            var btn = $(this);
            var form = $(this).closest('form');
            form.validate({
                debug: true,
                errorClass:'error',
                validClass:'success',
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }
            btn.attr('disabled', true);
            const spinerloading = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Loading...';
            btn.html(spinerloading);
            form.ajaxSubmit({
                url: form.attr("action"),
                success: function(response, status, xhr, $form) {
                    btn.attr('disabled', false);
                    const spinerloading = 'Login';
                    btn.html(spinerloading);
                    var data = jQuery.parseJSON(response);
                    if (data.status == true) {
                        window.location.href = data.redirect_url;
                        // setTimeout(function() {
                        // }, 1000);
                    } else {
                        var toastID = document.getElementById('notiflogin');
                        toastID = new bootstrap.Toast(toastID);
                        toastID.show();
                        // if(typeof data.msg === "object" && !Array.isArray(data.msg) && data.msg !== null){
                        //     console.log(data.msg);
                        // }
                        $('.notif_login').html('<i class="fa fa-times me-3"></i>'+data.msg).css('width','max-content');
                    }
                },
                error : function(response){
                    // console.log(response);
                }
            });
        });
        
        $(document).on('click','#register_submit', function(e){
            e.preventDefault(0);
            var btn = $(this);
            var form = $(this).closest('form');

            btn.attr('disabled', true);
            const spinerloading = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Loading...';
            btn.html(spinerloading);
            form.ajaxSubmit({
                url: form.attr("action"),
                success: function(response, status, xhr, $form) {
                    btn.attr('disabled', false);
                    const spinerloading = 'Buat Akun Baru';
                    btn.html(spinerloading);
                    var data = jQuery.parseJSON(response);
                    if (data.status == true) {
                        $('.register').fadeOut(300);
                        $('.register').addClass('d-none');
                        $('.success_register').removeClass('d-none');
                        $('.register-box').css('height','330');
                        if(data.redirect_url.length){
                            alert('User berhasil ditambahkan');
                            window.location.href = data.redirect_url;
                        }
                    } else {
                        if(data.data != null){
                            
                            $.each(data.data, function(k,v){
                                if(v != ''){
                                    $('.field_'+k).addClass('d-block');
                                    $('.field_'+k).html(v);
                                }
                            });
                        }
                    }
                },
                error: function(response, status, xhr, $form) {
                    console.log(response)
                }
            });
        });

        $('.myinput').on('keyup', function(e){
            e.preventDefault(0);
            var target = $(this).data('iden');
            $('.field_'+target).removeClass('d-block');
        });
    }
    $(document).on('click','.ggl_login_btns', function(e){
        e.preventDefault(0);
        var btn = $(this);
        btn.attr('disabled', true);
        const spinerloading = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Checking...';
        btn.html(spinerloading);
        $.ajax({
            url: site_data.base_url+'authurl',
            type: "GET",
            success: function (response) {
                var data = jQuery.parseJSON(response);
                window.location.href = data.url;
            }
        });

    });
    if($('.google-auth-code').length){
        var btn = $('.ggl_login_btns');
        btn.attr('disabled', true);
        const spinerloading = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Checking...';
        btn.html(spinerloading);
        $.ajax({
            url: site_data.base_url+'authcheck',
            type: "post",
            data: {
                code : $('.google-auth-code').val()
            } ,
            success: function (response) {
                // var data = jQuery.parseJSON(response);

                // if(data.status == true){
                //     $(form).trigger("reset");
                //     var toastID = document.getElementById('toast-notiff-fdbck');
                //     toastID = new bootstrap.Toast(toastID);
                //     toastID.show();
                //     setTimeout(function() {
                //         menu('menu-masukan', 'hide', 250);
                //     }, 2000);
                // }
                setTimeout(function() {
                    btn.attr('disabled', false);
                    const spinerloading = '<i class="fa-brands fa-google"></i> Login dengan Akun Google';
                    btn.html(spinerloading);
                }, 1000);
                var data = jQuery.parseJSON(response);
                if (data.status == true) {
                    var toastID = document.getElementById('successlogin');
                    toastID = new bootstrap.Toast(toastID);
                    toastID.show();
                    $('.notif_login_success').html('<i class="fa fa-times me-3"></i>'+data.msg).css('width','auto');
                    setTimeout(function() {
                        window.location.href = data.redirect_url;
                    }, 1000);
                } else {
                    var toastID = document.getElementById('notiflogin');
                    toastID = new bootstrap.Toast(toastID);
                    toastID.show();
                    $('.notif_login').html('<i class="fa fa-times me-3"></i>'+data.msg).css('width','max-content');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }
    if($('#saveLegitcheck').length){
        $(document).on('click','#saveLegitcheck', function(e){
            e.preventDefault(0);
            var btn = $(this);
            var form = $(this).closest('form');

            btn.attr('disabled', true);
            const spinerloading = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Loading...';
            btn.html(spinerloading);
            form.ajaxSubmit({
                url: form.attr("action"),
                success: function(response, status, xhr, $form) {
                    var data = jQuery.parseJSON(response);
                    btn.attr('disabled', false);
                    const spinerloading = 'SAVE';
                    btn.html(spinerloading);
                    if (data.status == true) {
                       alert('Hasil validasi disimpan');
                       window.location.href = data.redirect_url;
                    }else{
                        alert('Tejadi kesalahan');
                    }
                }
            });
        });
    }
    if($('#sendfeedback').length){
        function menu(menuName, menuFunction, menuTimeout){
            setTimeout(function(){
                if(menuFunction === "show"){
                    return document.getElementById(menuName).classList.add('menu-active'),
                    document.querySelectorAll('.menu-hider')[0].classList.add('menu-active')
                } else {
                    return document.getElementById(menuName).classList.remove('menu-active'),
                    document.querySelectorAll('.menu-hider')[0].classList.remove('menu-active')
                }
            },menuTimeout)
        }
        $(document).on('submit','#sendfeedback', function(e){
            e.preventDefault(0);
            var values = $(this).serialize();
            var form = $(this).closest('form');
            
            var btn = $('.sendmailbtn');
            btn.attr('disabled', true);
            const spinerloading = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Mengirim Pesan...';
            btn.html(spinerloading);
            $.ajax({
                    url: form.attr("action"),
                    type: "post",
                    data: values ,
                    success: function (response) {
                        var data = jQuery.parseJSON(response);
                        btn.attr('disabled', false);
                        const spinerloading = 'KIRIM';
                        btn.html(spinerloading);

                        if(data.status == true){
                            $(form).trigger("reset");
                            var toastID = document.getElementById('toast-notiff-fdbck');
                            toastID = new bootstrap.Toast(toastID);
                            toastID.show();
                            setTimeout(function() {
                                menu('menu-masukan', 'hide', 250);
                            }, 2000);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
        });
    }
    if($('.search_legit').length){
        $(document).on('submit','.search_legit', function(e){
            e.preventDefault(0);
            
            var formdata = {
                query : $('.searchlegit').val()
            };
            var form = $(this).closest('form');
            $.ajax({
                url: form.attr("action"),
                type: "post",
                data: formdata ,
                success: function (response) {
                    var data = jQuery.parseJSON(response);
                    console.log(data);
                    // if(data.status == true){
                    //     $(form).trigger("reset");
                    //     var toastID = document.getElementById('toast-notiff-fdbck');
                    //     toastID = new bootstrap.Toast(toastID);
                    //     toastID.show();
                    //     setTimeout(function() {
                    //         menu('menu-masukan', 'hide', 250);
                    //     }, 2000);
                    // }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    }

    if($('.sertif-register').length > 0){
        const pickJson = [
            {'id' : '1','name' : 'Tag in the box'},
            {'id' : '2','name' : 'Bill From Official Store'},
            {'id' : '3','name' : 'Shoes Box in Thriftex display'}
        ]
        $.each(pickJson, function(k,v){
            var el =    '<div class="flex-grow-1 align-self-center" style="width:50%">'+
                            '<h5 class="font-600 mb-0 lh-1">'+(k+1)+'. '+v.name+'</h5>'+
                            '<div class="upload-btn-wrapper">'+
                                '<button class="btn">'+
                                    '<i class="mb-2 fas fa-image"></i>'+
                                    '<p>'+v.name+'</p>'+
                                    '<img src="" id="output" class="image_thumbnails_previews_'+v.id+' d-none image_primary ">'+
                                '</button>'+
                                '<input type="file" name="legitimage[]" data-pick="'+v.id+'" class="fotoimg pickimage" data-imgtype="primary" accept="capture=camera,image/*"/>'+
                            '</div>'+
                        '</div>'
            $('.sertif-register').append(el);
        });
    }

    const compressImage = async (file, { quality = 1, type = file.type }) => {
        const imageBitmap = await createImageBitmap(file);
        const canvas = document.createElement('canvas');
        canvas.width = imageBitmap.width;
        canvas.height = imageBitmap.height;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(imageBitmap, 0, 0);
        const blob = await new Promise((resolve) =>
            canvas.toBlob(resolve, type, quality)
        );
        return new File([blob], file.name, {
            type: blob.type,
        });
    };
    $(".pickimage").change(async function(e) {
        const targetpreview = e.target.attributes[2].value;
        const { files } = e.target;
        if (!files.length) return;
        const dataTransfer = new DataTransfer();
        for (const file of files) {
            if (!file.type.startsWith('image')) {
                dataTransfer.items.add(file);
                continue;
            }
            const compressedFile = await compressImage(file, {
                quality: 0.5,
                type: 'image/jpeg',
            });
            dataTransfer.items.add(compressedFile);
        }
        e.target.files = dataTransfer.files;

        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function (b) {
                $('.image_thumbnails_previews_'+targetpreview).attr('src', b.target.result);
                $('.image_thumbnails_previews_'+targetpreview).removeClass('d-none');
            };
            reader.readAsDataURL(e.target.files[0]);
        }

    });

});