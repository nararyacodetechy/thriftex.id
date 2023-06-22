<?php 
use GuzzleHttp\Client;

class Legit_model extends CI_model {

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

    public function savelegit($data,$token){
        try {
            $response = $this->_client->request('POST','legits/savelegit',[
                'headers' => [
                    // 'Accept'     => 'application/json',
                    // 'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'form_params'   => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            // var_dump($result);
            return $result;
        } catch (\Throwable $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
            // return array('status' => $res->status,'message' => $res->message);
        }
    }

    public function getLegitList($token)
    {   
        $response = $this->_client->request('GET','legits/data',[
            // 'debug'   => true,
            'headers' => [
                'Accept'     => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => $token
            ],
        ]);
        // var_dump($response->getBody()->getContents());
        // die;
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    public function legitDetail($token,$case_code){
        try {
            $response = $this->_client->request('GET','legits/datadetail',[
                // 'debug'   => true,
                'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'query' => ['case_code' => $case_code ]
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

    public function validator_do($token,$tipe){
        try {
            $response = $this->_client->request('GET','legits/validatordo',[
                // 'debug'   => true,
                'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'query' => ['tipe' => $tipe ]
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

    public function validatorData($token,$case_code){
        try {
            $response = $this->_client->request('GET','legits/validdatadetail',[
                // 'debug'   => true,
                'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'query' => ['case_code' => $case_code ]
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

    public function validation_save($token,$data){
        try {
            $response = $this->_client->request('POST','legits/validation',[
                'headers' => [
                    'Authorization' => $token
                ],
                'form_params'   => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return array('status' => $result['status'], 'message' => $result['message']);
        } catch (\Throwable $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
        }
    }

    public function get_summary_admin($token){
        try {
            $response = $this->_client->request('GET','legits/summaryadmin',[
                'headers' => [
                    'Authorization' => $token
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

    public function get_total_legit($token){
        try {
            $response = $this->_client->request('GET','legits/totallegit',[
                // 'debug'   => true,
                'headers' => [
                    'Accept'     => 'application/json',
                    'Content-Type' => 'application/json',
                    // 'Authorization' => $token
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

    public function get_legit_publish($token){
        $response = $this->_client->request('GET','legits/legitpublish',[
            'headers' => [
                'Accept'     => 'application/json',
                'Content-Type' => 'application/json',
                // 'Authorization' => $token
            ],
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    public function searchlegit($token,$data){
        try {
            $response = $this->_client->request('POST','legits/searchlegit',[
                'headers' => [
                    'Accept'     => 'application/json',
                    'Authorization' => $token
                ],
                'form_params' => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['data'];
        } catch (\Throwable $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $res;
        }
    }

    
}