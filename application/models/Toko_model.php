<?php 
use GuzzleHttp\Client;

class Toko_model extends CI_model {

    private $_client;
    
    public function __construct()
    {
        parent::__construct();
        global $SConfig;
        $this->_client = new Client([
            'base_uri'  => $SConfig->_api_url,
        ]);
    }

    public function register($data){
        try {
            $response = $this->_client->request('POST','toko/register',[
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
    public function registerupdate($data){
        try {
            $response = $this->_client->request('PUT','toko/registerupdate',[
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
    public function deletetoko($data){
        try {
            $response = $this->_client->request('DELETE','toko/toko',[
                'form_params'   => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return array('status' => $result['status'], 'message' => $result['message']);
        } catch (\GuzzleHttp\Exception\ClientException $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
            // return array('status' => $res->status,'message' => $res->message,'error_data' => $res->error_data);
        }
    }
    public function getTokoPublic($token){
        try {
            $response = $this->_client->request('GET','toko/TokoListPublic',[
                    'headers' => [
                    'Authorization' => $token
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
    public function getTokolist($token,$param,$role){
        try {
            $response = $this->_client->request('GET','toko/tokolist',[
                    'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'query'   => [
                    'datatable' => $param,
                    'role'  => $role
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

    public function checkcode($token,$code){
        try {
            $response = $this->_client->request('GET','toko/checkcode',[
                    'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'query'   => [
                    'toko_code' => $code,
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
   

    
}