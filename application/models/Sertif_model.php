<?php 
use GuzzleHttp\Client;

class Sertif_model extends CI_model {

    private $_client;
    
    public function __construct()
    {
        parent::__construct();
        global $SConfig;
        $this->_client = new Client([
            'base_uri'  => $SConfig->_api_url,
        ]);
    }

    public function register($data,$token){
        try {
            $response = $this->_client->request('POST','sertif/index',[
                'headers' => [
                    // 'Accept'     => 'application/json',
                    // 'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'form_params'   => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return array('status' => $result['status'], 'message' => $result['message'], 'data' => $result['data']);
        } catch (\GuzzleHttp\Exception\ClientException $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
        }
    }
    public function cencel($token,$id){
        try {
            $response = $this->_client->request('POST','sertif/cencel',[
                'headers' => [
                    'Authorization' => $token
                ],
                'form_params'   => $id,
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return array('status' => $result['status'], 'message' => $result['message'], 'data' => $result['data']);
        } catch (\GuzzleHttp\Exception\ClientException $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
        }
    }
    public function getSertifList($token)
    {   
        
        try {
            $response = $this->_client->request('GET','sertif/data',[
                // 'debug'   => true,
                'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
            // return array('status' => $result['status'], 'message' => $result['message'], 'data' => $result['data']);
        } catch (\GuzzleHttp\Exception\ClientException $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
        }
    }

    public function getSertifListAdmin($token,$param,$status){
        try {
            $response = $this->_client->request('GET','sertif/sertifverif',[
                    'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'query'   => [
                    'datatable' => $param,
                    'status'  => $status
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
    public function sertifupdate($data,$token){
        try {
            $response = $this->_client->request('PUT','sertif/sertifupdate',[
                'headers' => [
                    'Authorization' => $token
                ],
                'form_params'   => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
            // return array('status' => $result['status'], 'message' => $result['message'], 'data' => $result['data']);
        } catch (\GuzzleHttp\Exception\ClientException $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
            // return array('status' => $res->status,'message' => $res->message,'error_data' => $res->error_data);
        }
    }

    public function total_pending($token){
        try {
            $response = $this->_client->request('GET','sertif/pendingsertif',[
                    'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'query'   => [
                    'status'  => 'new'
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