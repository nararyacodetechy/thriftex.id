<?php 
use GuzzleHttp\Client;

class Feedback_model extends CI_model {

    private $_client;
    
    public function __construct()
    {
        parent::__construct();
        global $SConfig;
        $this->_client = new Client([
            'base_uri'  => $SConfig->_api_url,
        ]);
    }

    public function feedbacksend($token,$data){
        try {
            $response = $this->_client->request('POST','email/sendemail',[
                    'headers' => [
                    // 'Accept'     => 'application/json',
                    // 'Content-Type' => 'application/json',
                    'Authorization' => $token
                ],
                'form_params'   => $data
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            return $result;
        } catch (\Throwable $th) {
            $response = $th->getResponse();
            $jsonBody = $response->getBody();
            $res = json_decode($jsonBody);
            return $jsonBody;
        }
    }


    
}