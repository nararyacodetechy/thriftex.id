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
                var body = '<div class="dropdown-menu bg-transparent border-0 mb-n5"><textarea style="display:none">' + JSON.stringify(data) + '</textarea><div class="card card-style rounded-s shadow-xl me-1"><div class="list-group list-custom-small list-icon-0 px-3 mt-n1">\
                '
                if (actionJSON.detail != undefined) body += '<a href="' + ((data.detail_url != undefined) ? data.detail_url : "#") + '" class="mb-n2 mt-n1 detailProfile" title="" ' + (((actionJSON.detail != undefined) && (actionJSON.detail)) ? '' : 'style="display:none"') + '>\
                    Detail\
                </a>\
                '
                if (actionJSON.delete != undefined) body += '<a href="' + ((data.delete_url != undefined) ? data.delete_url : "#") + '" class="mb-n2 mt-n1" title="" ' + (((actionJSON.delete != undefined) && (actionJSON.delete)) ? '' : 'style="display:none"') + '>\
                    Delete User\
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

        $(".searchInput").on('keyup', function (e) {
			table.search($(".searchInput").val());
			table.draw();
		});

        $(document).on('click','.detailProfile', function(e){
            e.preventDefault(0);
            $('#DetailUser').modal('show');
        });
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