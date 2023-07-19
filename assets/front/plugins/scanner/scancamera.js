
$(document).ready(function(){
  
  function onScanSuccess(qrCodeMessage) {
      // document.getElementById('result').innerHTML = '<span class="result">'+qrCodeMessage+'</span>';
      $.ajax({
        url: site_data.base_url+'scan-check',
        type: "post",
        data:{
            resultcode : qrCodeMessage,
        },
        success: function (response) {
            let shouldPauseVideo = true;
            let showPausedBanner = false;
            html5QrcodeScanner.pause(shouldPauseVideo, showPausedBanner);

            var data = jQuery.parseJSON(response);
            if(data.status == false){
              alert(data.message);
              html5QrcodeScanner.resume();
            }else{
              window.location.href=site_data.base_url+"sertifikat-register?id="+data.data[0].toko_code;
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
  }
  function onScanError(errorMessage) {
    //handle scan error
    // alert(errorMessage)
  }
  let config = {
      fps: 10,
      qrbox: {width: 200, height: 200},
      rememberLastUsedCamera: true,
      // Only support camera scan type.
      // supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
    };
  var html5QrcodeScanner = new Html5QrcodeScanner(
      "reader-camera", config);
  html5QrcodeScanner.render(onScanSuccess, onScanError);
});