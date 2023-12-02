$(document).ready(function(){
  
  var baseUrl = document.querySelector('#base_urls').value;
  $('.select2_toko').select2({
      dropdownParent: $("#AddToko"),
      width: '100%' ,
      ajax: {
        url: baseUrl + "user-list-select",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {
          // console.log(params);
          params.page = params.page || 1;
  
          var select2Data = $.map(data.data, function (obj) {
            obj.id = obj.id;
            obj.text = obj.nama;
            return obj;
          });
          return {
            results: select2Data,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        },
        cache: true
      },
      allowClear: true,
      placeholder: 'Cari User',
      minimumInputLength: 1,
      language: {
        inputTooShort: function () {
          return 'Masukan Nama Produk Yang Ingin Dicari';
        }
      },
      templateResult: formatRepo,
      templateSelection: formatRepoSelection,
  });
  $('.select2_brand').select2({
    dropdownParent: $("#AddToko"),
    width: '100%' ,
    ajax: {
      url: baseUrl + "user-list-select",
      dataType: 'json',
      delay: 250,
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        // console.log(params);
        params.page = params.page || 1;

        var select2Data = $.map(data.data, function (obj) {
          obj.id = obj.id;
          obj.text = obj.nama;
          return obj;
        });
        return {
          results: select2Data,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      },
      cache: true
    },
    allowClear: true,
    placeholder: 'Cari User',
    minimumInputLength: 1,
    language: {
      inputTooShort: function () {
        return 'Masukan Nama Produk Yang Ingin Dicari';
      }
    },
    templateResult: formatRepo,
    templateSelection: formatRepoSelection,
});
  function formatRepo(repo) {
		if (repo.loading) {
			return 'Mencari produk...';
		}
		// console.log(repo);

		var $container = $(
			"<div class='select2-result-repository clearfix'>" +
			"<div class='select2-result-repository__title'></div>" +
			"<div class='select2-result-repository__description'></div>" +
			"</div>"
		);

		$container.find(".select2-result-repository__title").html('<b>'+repo.nama+'</b>');
		$container.find(".select2-result-repository__description").html('<span class="">' + repo.email + '</span> ');

		return $container;
	}
  function formatRepoSelection(repo) {
		return repo.nama || repo.text;
	}

});