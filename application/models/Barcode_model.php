<?php 
use GuzzleHttp\Client;

class Barcode_model extends CI_model {

    private $_client;
    
    public function __construct()
    {
        parent::__construct();
        global $SConfig;
        $this->_client = new Client([
            'base_uri'  => $SConfig->_api_url,
        ]);
    }

    public function total_pending($token){
        try {
            $response = $this->_client->request('GET','barcode/pendingbarcode',[
                    'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'query'   => [
                    'payment_status'  => 'pending'
                ],
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch (\GuzzleHttp\Exception\ClientException $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
        }
    }

    public function getQrcodeListAdmin($token,$param,$status){
        try {
            $response = $this->_client->request('GET','barcode/qrcodelistnew',[
                    'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'query'   => [
                    'datatable' => $param,
                    'payment_status'  => $status
                ],
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch (\GuzzleHttp\Exception\ClientException $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
        }
    }

    public function updatestatus($token,$status){
        try {
            $response = $this->_client->request('POST','barcode/updatestatus',[
                'headers' => [
                    'Authorization' => $token
                ],
                'form_params'   => $status,
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return array('status' => $result['status'], 'message' => $result['message']);
        } catch (\GuzzleHttp\Exception\ClientException $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
        }
    }


    public function getTokolist($token,$param){
        try {
            $response = $this->_client->request('GET','barcode/listakunqr',[
                    'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'query'   => [
                    'datatable' => $param,
                ],
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch (\GuzzleHttp\Exception\ClientException $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
        }
    }

    public function register($data){
        try {
            $response = $this->_client->request('POST','barcode/registerbrand',[
                'form_params'   => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return array('status' => $result['status'], 'message' => $result['message'], 'data' => $result['data']);
        } catch (\GuzzleHttp\Exception\ClientException $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
            // return array('status' => $res->status,'message' => $res->message,'error_data' => $res->error_data);
        }
    }
    public function barcode_profile_cek_url($url,$code){
        try {
            $response = $this->_client->request('GET','barcode/cekurl',[
                // 'debug'   => true,
                'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    // 'Authorization' => $token
                ],
                'query' => ['url' => $url,'code' => $code ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch (\GuzzleHttp\Exception\ClientException $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
        }
    }

}