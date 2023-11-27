$(document).ready(function(){

    //Search Page
    var datatableJX = document.querySelectorAll('[table-jx]');
    if(datatableJX.length){

        var base_url = $('#base_urls').val();
        var list_url = $('#list_url').val();
        var actionJSON;
        var columnDef = [];
        var columnsTemp = [];
        var bagdeObject = {};
        var temp;
        if ($("#table_action").length > 0) {
            actionJSON = $("#table_action").html() != "" ? jQuery.parseJSON($("#table_action").html()) : "";
        }
        var actionInTitle = {
            targets: -1,
            responsivePriority: 2,
            title: 'Action',
            orderable: false,
            render: function (data, type, full, meta) {
                var header = '<a href="#" data-bs-toggle="dropdown" class="icon icon-m ps-3"><i class="fa fa-ellipsis-v font-18 color-theme"></i></a>';
                var body = '<div class="dropdown-menu bg-transparent border-0 mb-n5"><div class="card card-style rounded-s shadow-xl me-1"><div class="list-group list-custom-small list-icon-0 px-3 mt-n1"><textarea style="display:none">' + JSON.stringify(data) + '</textarea>\
                '
                if (actionJSON.detail != undefined) body += '<a href="' + ((data.detail_url != undefined) ? data.detail_url : "#") + '" class="mb-n2 mt-n1 detailProfile" title="" ' + (((actionJSON.detail != undefined) && (actionJSON.detail)) ? '' : 'style="display:none"') + '>\
                    Detail\
                </a>\
                '
                if (actionJSON.edit != undefined) body += '<a href="' + ((data.edit_url != undefined) ? data.edit_url : "#") + '" class="mb-n2 mt-n1 editValidator" title="" ' + (((actionJSON.edit != undefined) && (actionJSON.edit)) ? '' : 'style="display:none"') + '>\
                    Edit\
                </a>\
                '
                if (actionJSON.detailregis != undefined) body += '<a href="#" class="mb-n2 mt-n1 detailregis" title="" ' + (((actionJSON.detailregis != undefined) && (actionJSON.detailregis)) ? '' : 'style="display:none"') + '>\
                    Detail Sertif\
                </a>\
                '
                if (actionJSON.delete != undefined) body += '<a href="' + ((data.delete_url != undefined) ? data.delete_url : "#") + '" class="mb-n2 mt-n1" title="" ' + (((actionJSON.delete != undefined) && (actionJSON.delete)) ? '' : 'style="display:none"') + '>\
                    Delete User\
                </a>\
                '
                if (actionJSON.deletevalidator != undefined) body += '<a href="' + ((data.deletevalidator_url != undefined) ? data.deletevalidator_url : "#") + '" class="mb-n2 mt-n1 deletevalidator" title="" ' + (((actionJSON.deletevalidator != undefined) && (actionJSON.deletevalidator)) ? '' : 'style="display:none"') + '>\
                    Delete\
                </a>\
                '
                if (actionJSON.terimaQrcode != undefined) body += '<a href="#" class="mb-n2 mt-n1 terimaQrcode" title="" ' + (((actionJSON.terimaQrcode != undefined) && (actionJSON.terimaQrcode)) ? '' : 'style="display:none"') + '>\
                    Terima Pembayaran\
                </a>\
                '
                if (actionJSON.tolakQrcode != undefined) body += '<a href="#" class="mb-n2 mt-n1 tolakQrcode" title="" ' + (((actionJSON.tolakQrcode != undefined) && (actionJSON.tolakQrcode)) ? '' : 'style="display:none"') + '>\
                    Tolak Permintaan\
                </a>\
                '
                if (actionJSON.deletetoko != undefined) body += '<a href="#" class="mb-n2 mt-n1 hapus_toko" title="" ' + (((actionJSON.deletetoko != undefined) && (actionJSON.deletetoko)) ? '' : 'style="display:none"') + '>\
                    Hapus Toko\
                </a>\
                ';
                body += '</div></div></div>';
                var finals = header + body;
                return finals;
            },
        }
        var badgeTemplate = function (target) {
            return {
                targets: target,
                responsivePriority: 1,
                render: function (data, type, full, meta) {
                    var status = {
                        "contributor": {
                            'title': 'Contributor',
                            'class': 'badge-soft-danger'
                        },
                    };
                    return '<span class="badge ' + status[full[bagdeObject["field_" + target]]].class + '">' + status[full[bagdeObject["field_" + target]]].title + '</span>';
                }
            }
        }
        if ($("#table_action").length > 0) {
            temp = jQuery.parseJSON($("#table_columnDef").html());
            $.each(temp, function (key, value) {
                columnDef.push(value);
            })
        }
        if ($("#table_action").length > 0) {
            columnsTemp = jQuery.parseJSON($("#table_column").html());
            if (actionJSON != "") {
                if ($('.datatable').length > 0) {
                    var actionColumn = {
                        data: null,
                        mData: null
                    }
                    columnsTemp.push(actionColumn);
                    columnDef.push(actionInTitle);
                }
                if ($('.datatable-post').length > 0) {
                    columnsTemp.push(action);
                }
            }
        }
        $.each(columnsTemp, function (key, value) {
            if (value.template != undefined) {
                if (value.template == "badgeTemplate") {
                    columnDef.push(badgeTemplate(key));
                    bagdeObject["field_" + key] = value.data;
                }
            }
        });

        var scrollX = false;
        var scrollY = true;
        if (typeof $('.datatable').data('scx') !== 'undefined' && $('.datatable').data('scx') == true) {
            scrollX = true;
        }
        if (typeof $('.datatable').data('scrl') !== 'undefined' && $('.datatable').data('scrl') == false) {
            scrollY = false;
        }
        var table = $('.datatable').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ordering: false,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            pageLength: 10,
            dom: '<"top datatable_topm text-start"i>rt<"bottom row mt-3 mb-2"<"col-md-12"p>><"clear">',
            ajaxSource: list_url,
            // ajax:{
            //     url: list_url,
            //     method: "GET",
            //     headers: {
            //         "Authorization": "token disini!"
            //     },
            //     data: function ( d ) {
            //         return d;
            //     }
            // },
            columns: columnsTemp,
            columnDefs: columnDef,
            language: {
                info: "Total _TOTAL_ Data",
                paginate: {
                    next: '<span class="fas fa-arrow-right"></span>',
                    previous: '<span class="fas fa-arrow-left"></span>'
                }
            },
            // createdRow: function (row, data, dataIndex) {
            //     $(row).addClass('TdData');
            //     $(row).attr('id', 'post-' + data.id);
            // },
            // footerCallback: function (row, data, start, end, display) {},
        });

        $( '[data-bs-toggle="collapse"]' ).click( function( e ) {
			var href = $( this ).attr( 'href' );
			e.preventDefault();
			if(href == '#semua'){
				table.column(1).search('', false, false);
			}else if(href == '#new'){
				table.column(1).search('new', false, false);
			}else if(href == '#rejected'){
				table.column(1).search('rejected', false, false);
			}
			table.draw();
		} );

        $(".searchInput").on('keyup', function (e) {
			table.search($(".searchInput").val());
			table.draw();
		});

        $(document).on('click','.hapus_toko', function(e){
            e.preventDefault(0);
            if(confirm('Yakin ingin menhapus toko ini?')){
                var json = $(this).siblings('textarea').val();
                var data = JSON.parse(json);
                console.log(data);
                $.ajax({
                    url: site_data.base_url+'/hapus-toko',
                    type: "post",
                    data:{
                        idtoko : data.toko_id,
                        tokocode : data.toko_code
                    },
                    success: function (response) {
                        var data = jQuery.parseJSON(response);
                        if(data.status == false){
                            alert(data.msg);
                        }else{
                            // $(form).trigger("reset");
                            var toastID = document.getElementById('notifdelete');
                            toastID = new bootstrap.Toast(toastID);
                            toastID.show();
                            $('.notif_regis').html('<i class="fa fa-times me-3"></i>'+data.message).css('width','max-content');
                            table.ajax.reload();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        });

        $(document).on('click','.detailProfile', function(e){
            e.preventDefault(0);
            $('#DetailUser').modal('show');
		    var json = $(this).siblings('textarea').val();
            var data = JSON.parse(json);
            // console.log(data);
            $.each(data, function (key, value) {
                console.log(key);
                $('.fieldmodal_' + key).text(value);
                $('.fieldmodal_' + key).val(value);
                if(key == 'qrcode'){
                    $('.downloadlink').attr('href',site_data.base_url+'qrcode/'+value+'.png');
                    $('.fieldmodal_qrcode').attr('src',site_data.base_url+'qrcode/'+value+'.png');
                }
    
            });
        });
        $(document).on('click','.editValidator', function(e){
            e.preventDefault(0);
            $('#EditValidator').modal('show');
		    var json = $(this).siblings('textarea').val();
            var data = JSON.parse(json);
            // console.log(data);
            $.each(data, function (key, value) {
                // console.log(key);
                if(key == 'validator_brand_id'){
                    $(".validator_validator_brand_id option[value='"+value+"']").prop('selected', true);
                }else{
                    $('.validator_' + key).val(value);
                }
            });
        });
        $(document).on('click','.deletevalidator', function(e){
            e.preventDefault(0);
            if (confirm('Yakin ingin mengapus data validator ini?')) {
                var json = $(this).siblings('textarea').val();
                var data = JSON.parse(json);
                $.ajax({
                    url: site_data.base_url+'/hapusvalidator',
                    type: "post",
                    data:{
                        id_user : data.id,
                    },
                    success: function (response) {
                        var data = jQuery.parseJSON(response);
                        if(data.status == false){
                            alert(data.message);
                        }else{
                            table.ajax.reload();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        })

        $(document).on('click','.detailregis', function(e){
            e.preventDefault(0);
            $('#DetailSertif').modal('show');
		    var json = $(this).siblings('textarea').val();
            var data = JSON.parse(json);
            $('.gallery-file a').remove();
            $("#form-validate-sertif").trigger('reset');
            $('#form-validate-sertif').attr('data-idsertif',data.id);
            $.each(data, function (key, value) {
                $('.fieldmodal_' + key).text(value);
                $('.fieldmodal_' + key).val(value);
                if(key == 'data_bukti'){
                    $.each(data['data_bukti'], function (keys, values) {
                        var target_gallery = $('.gallery-file');
                        var newhtml_gallery = '<a class="col-12 mb-4 lightboxx" target="_blank" href="'+site_data.base_url+'/media/sertif/'+values.file_path+'" title="">';
                        newhtml_gallery += '<img src="'+site_data.base_url+'/media/sertif/'+values.file_path+'" data-src="'+site_data.base_url+'/media/sertif/'+values.file_path+'" class="preload-img img-fluid rounded-xs object-fit " alt="img" style="width:100%" >'; 
                        newhtml_gallery += '</a>';
                        target_gallery.append(newhtml_gallery);
                    });
                }
    
            });
        });

        $(document).on('submit','#form-validate-sertif', function(e){
            e.preventDefault(0);
            if($('input[name="sertif_status"]:checked').val() == undefined){
                alert('Pilih Aksi!');
            }else{
                var btn = $('.save-sertif-regis');
                var form = $(this);
                btn.attr('disabled', true);
                const spinerloading = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Loading...';
                btn.html(spinerloading);
                $.ajax({
                    url: form.attr("action"),
                    type: "post",
                    data:$(this).serialize(),
                    success: function (response) {
                        var data = jQuery.parseJSON(response);
                        console.log(data);
                        if(data.status == false){
                            alert(data.msg);
                        }else{
                            var toastID = document.getElementById('notifregis');
                            toastID = new bootstrap.Toast(toastID);
                            toastID.show();
                            $('.notif_regis').html('<i class="fa fa-times me-3"></i>'+data.msg).css('width','max-content');
                            setTimeout(function() {
                                $('#DetailSertif').modal('hide');
                                table.ajax.reload();
                            }, 1000);
                        }
                        btn.attr('disabled', false);
                        const spinerloading = 'Simpan';
                        btn.html(spinerloading);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        alert('terjadi kesalahan!');
                        btn.attr('disabled', false);
                        const spinerloading = 'Simpan';
                        btn.html(spinerloading);
                    }
                });
            }
            // alert('halo');
        });

        $(document).on('click','.tokoadd', function(e){
            e.preventDefault(0);
            $('#AddToko').modal('show');
        });
        $(document).on('submit','#post_register', function(e){
            e.preventDefault(0);
            var btn = $('.submit-regis');
            var form = $(this);
            btn.attr('disabled', true);
            const spinerloading = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Loading...';
            btn.html(spinerloading);
            $.ajax({
                url: form.attr("action"),
                type: "post",
                data:$(this).serialize(),
                success: function (response) {
                    var data = jQuery.parseJSON(response);
                    console.log(data);
                    if(data.status == false){
                        alert(data.msg);
                    }else{
                        $(form).trigger("reset");
                        var toastID = document.getElementById('notifregis');
                        toastID = new bootstrap.Toast(toastID);
                        toastID.show();
                        $('.notif_regis').html('<i class="fa fa-times me-3"></i>'+data.msg).css('width','max-content');
                        setTimeout(function() {
                            $('#AddToko').modal('hide');
                            table.ajax.reload();
                        }, 1000);
                        $('.select2').val(null).trigger("change");
                    }
                    btn.attr('disabled', false);
                    const spinerloading = 'Simpan';
                    btn.html(spinerloading);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

        $(document).on('submit','#post_update_register', function(e){
            e.preventDefault(0);
            var btn = $('.update-toko-regis');
            var form = $(this);
            btn.attr('disabled', true);
            const spinerloading = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Loading...';
            btn.html(spinerloading);
            $.ajax({
                url: form.attr("action"),
                type: "post",
                data:$(this).serialize(),
                success: function (response) {
                    var data = jQuery.parseJSON(response);
                    console.log(data);
                    if(data.status == false){
                        alert(data.msg);
                    }else{
                        // $(form).trigger("reset");
                        var toastID = document.getElementById('notifregis');
                        toastID = new bootstrap.Toast(toastID);
                        toastID.show();
                        $('.notif_regis').html('<i class="fa fa-times me-3"></i>'+data.msg).css('width','max-content');
                        setTimeout(function() {
                            $('#AddToko').modal('hide');
                            table.ajax.reload();
                        }, 1000);
                    }
                    btn.attr('disabled', false);
                    const spinerloading = 'Simpan';
                    btn.html(spinerloading);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    alert('terjadi kesalahan!');
                    btn.attr('disabled', false);
                    const spinerloading = 'Simpan';
                    btn.html(spinerloading);
                }
            });
        });

        $(document).on('click','.terimaQrcode',function(e){
            e.preventDefault(0);
            if(confirm('Yakin menerima Permintaan & konfirmasi pembayaan?')){
                var json = $(this).siblings('textarea').val();
                var data = JSON.parse(json);
                console.log(data);
                $.ajax({
                    url: site_data.base_url+'/konfirmasiqrcode',
                    type: "post",
                    data:{
                        bID : data.barcode_uuid,
                        aksi : 'paid',
                    },
                    success: function (response) {
                        var data = jQuery.parseJSON(response);
                        if(data.status == false){
                            alert('Terjadi kesalahan!');
                        }else{
                            var toastID = document.getElementById('notifregis');
                            toastID = new bootstrap.Toast(toastID);
                            toastID.show();
                            $('.notif_regis').html('<i class="fa fa-times me-3"></i>'+data.msg).css('width','max-content');
                            setTimeout(function() {
                                table.ajax.reload();
                            }, 1000);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        })
        $(document).on('click','.tolakQrcode',function(e){
            e.preventDefault(0);
            if(confirm('Yakin akan menolak Permintaan?')){
                var json = $(this).siblings('textarea').val();
                var data = JSON.parse(json);
                console.log(data);
                $.ajax({
                    url: site_data.base_url+'/konfirmasiqrcode',
                    type: "post",
                    data:{
                        bID : data.barcode_uuid,
                        aksi : 'cencel',
                    },
                    success: function (response) {
                        var data = jQuery.parseJSON(response);
                        if(data.status == false){
                            alert('Terjadi kesalahan!');
                        }else{
                            var toastID = document.getElementById('notifregis');
                            toastID = new bootstrap.Toast(toastID);
                            toastID.show();
                            $('.notif_regis').html('<i class="fa fa-times me-3"></i>'+data.msg).css('width','max-content');
                            setTimeout(function() {
                                table.ajax.reload();
                            }, 1000);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        })



    }


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
});