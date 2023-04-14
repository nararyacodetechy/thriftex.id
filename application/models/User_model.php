<?php 
use GuzzleHttp\Client;

class User_model extends CI_model {

    private $_client;
    
    public function __construct()
    {
        parent::__construct();
        global $SConfig;
        $this->_client = new Client([
            'base_uri'  => $SConfig->_api_url,
        ]);
    }

    public function cek_login($data){
        try {
            $response = $this->_client->request('POST','users/login',[
                'form_params'   => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return array('status' => $result['status'],'uid' => $result['uid'], 'token' => $result['token']);
        } catch (\Throwable $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return array('status' => $res->status,'message' => $res->message);
        }
    }

    public function register($data){
        try {
            $response = $this->_client->request('POST','users/register',[
                'form_params'   => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return array('status' => $result['status'], 'message' => $result['message']);
        } catch (\Throwable $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return array('status' => $res->status,'message' => $res->message,'error_data' => $res->error_data);
        }
    }

    public function checkuser($token){
        try {
            $response = $this->_client->request('POST','users/validatetoken',[
                    'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch (\Throwable $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return array('status' => $res->status,'message' => $res->message);
        }
    }

    public function getUserList($token,$param,$role){
        try {
            $response = $this->_client->request('GET','users/userlist',[
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
        } catch (\Throwable $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
        }
    }

    // public function getAllMahasiswa()
    // {   
    //     $response = $this->_client->request('GET','mahasiswa',[
    //         // 'debug'   => true,
    //         'headers' => [
    //             'Accept'     => 'application/json',
    //             'Content-Type' => 'application/json',
    //             'Authorization' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxMjEsImZ1bGxuYW1lIjoiY29kZSIsImVtYWlsIjoiY29kZUBnbWFpbC5jb20iLCJBUElfVElNRSI6MTY4MDA4Mzk1N30.AYK6pGB420xg5Ztt4OiGoE5MA_Tcwi77iAtDmD_gH3Y'
    //         ],
    //     ]);
    //     // var_dump($response->getBody()->getContents());
    //     // die;
    //     $result = json_decode($response->getBody()->getContents(), true);
    //     return $result['data'];
    // }

    
}