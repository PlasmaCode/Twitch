<?php
namespace PlasmaCode\Twitch;


use PlasmaCode\Twitch\Configurations;

class Api
{
    public $clientID;
    private $clientSecret;
    public $client;
    
    const BASEURI = 'https://api.twitch.tv/kraken/';
    
    public function __construct()
    {    
        $this->client = new \GuzzleHttp\Client(['base_uri' => $this::BASEURI, 'verify' => 'C:\programming\php-development\bin\ca-bundle.crt']);
    }
    
    
    public function channel($channel, $type)
    {
        $channelReq = $this->client->request('GET', 'channels/' . $channel);
        $channel = $this->decodeResponse($channelReq->getBody());
        
        
        switch($type) {
            case "follows":
                return $channel->followers;
                break;
            case "id":
                return $channel->_id;
                break;
        }
        
        if(!$channel->$type) {
            throw new Exception('Invalid Channel Type');
        }
        
        return $channel->$type;
    }
    
    private function decodeResponse($response)
    {
        $decoded = json_decode($response);
        if(!$decoded) {
            throw new Exception('Response is not a json format');
        }
        
        return $decoded;
    }
}
