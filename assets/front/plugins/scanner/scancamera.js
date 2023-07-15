function onScanSuccess(qrCodeMessage) {
    document.getElementById('result').innerHTML = '<span class="result">'+qrCodeMessage+'</span>';
}
function onScanError(errorMessage) {
  //handle scan error
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

// $(document).ready(function(){
  
// });