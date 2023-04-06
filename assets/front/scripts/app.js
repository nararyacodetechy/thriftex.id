$(document).ready(function(){
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
            {'id' : '1','name' : 'Exterior Outer'},
            {'id' : '2','name' : 'Exterior Inner'},
            {'id' : '3','name' : 'Inside Label'},
            {'id' : '4','name' : 'Tag Front'},
            {'id' : '5','name' : 'Tag Back'},
            {'id' : '6','name' : 'Other'},
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
    // const input = document.querySelector('.pickimage');
    // input.addEventListener('change', async (e) => {
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
                // const imagePreviewElement = document.querySelector("#output");
                // imagePreviewElement.src = b.target.result;
                $('.image_thumbnails_previews_'+targetpreview).attr('src', b.target.result);
                $('.image_thumbnails_previews_'+targetpreview).removeClass('d-none');
            };
            reader.readAsDataURL(e.target.files[0]);
        }

    });

    if($('#register_submit').length){
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $(document).on('click','#login', function(e){
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
                    const spinerloading = 'Login';
                    btn.html(spinerloading);
                    if (data.status == true) {
                        window.location.href = data.redirect_url;
                        // setTimeout(function() {
                        // }, 1000);
                    } else {
                        var toastID = document.getElementById('notiflogin');
                        toastID = new bootstrap.Toast(toastID);
                        toastID.show();
                        $('.notif_login').html('<i class="fa fa-times me-3"></i>'+data.msg).css('width','200px');
                    }
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
                    var data = jQuery.parseJSON(response);
                    btn.attr('disabled', false);
                    const spinerloading = 'Buat Akun Baru';
                    btn.html(spinerloading);
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
                }
            });
        });

        $('.myinput').on('keyup', function(e){
            e.preventDefault(0);
            var target = $(this).data('iden');
            $('.field_'+target).removeClass('d-block');
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
});