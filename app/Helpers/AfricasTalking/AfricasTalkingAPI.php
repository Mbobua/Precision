<?php


namespace App\Helpers\AfricasTalking;


use AfricasTalking\SDK\AfricasTalking;

class AfricasTalkingAPI
{

    protected $AT;

    protected $username;

    protected $apiKey;

    public function __construct()
    {
        $this->username = env('AT_USERNAME');
        $this->apiKey = env('AT_API_KEY');

        $this->AT = new AfricasTalking($this->username, $this->apiKey);
    }

    public function sms($to, $message, $enqueue = false)
    {
        // Get sms service
        $sms = $this->AT->sms();

        // Use the service
        return $sms->send([
            'to' => $to,
            'message' => $message,
            'enqueue' => $enqueue
        ]);
    }
}
