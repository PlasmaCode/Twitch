<?php
namespace PlasmaCode\Twitch;


class Api
{
    public $clientID;
    private $clientSecret;
    public $client;
    
    /** @constant string Contains the base URL for Guzzle requests. */
    const BASEURI = 'https://api.twitch.tv/kraken/';
    
    /**
     * Sets up a Guzzle Client for easy request calls.
     * 
     * @return void;
     */
    public function __construct()
    {    
        $this->client = new \GuzzleHttp\Client(['base_uri' => $this::BASEURI, 'verify' => 'C:\programming\php-development\bin\ca-bundle.crt']);
    }
    
    /**
     * Grabs simple information from a specified channel.
     * 
     * This method is used to specify the desired channel and the type of information it wishes to grab.
     * I have setup some shortcuts like "id" in place of "_id".
     * 
     * @param string $channel
     * @param string $type
     * @return string|null|boolean
     * @throws Exception
     */
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
    
    /**
     * Decodes a json response.
     * 
     * May add different decoding options in the future.
     * 
     * @param string $response
     * @return string
     * @throws Exception
     */
    private function decodeResponse($response)
    {
        $decoded = json_decode($response);
        if(!$decoded) {
            throw new Exception('Response is not a json format');
        }
        
        return $decoded;
    }
}
