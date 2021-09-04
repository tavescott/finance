<?php

namespace App\Classes;

class SMS
{
    /**
     * @var mixed
     */
    private $key;
    /**
     * @var mixed
     */
    private $secret;
    /**
     * @var mixed
     */
    private $source;

    public function __construct()
    {
        $this->key = env('BEEM_SMS_API_KEY');
        $this->secret = env('BEEM_SMS_API_SECRET');
        $this->source = env('BEEM_SMS_API_SOURCE');
    }

    public function send($recipients, $message)
    {
        $postData = [
            'source_addr' => $this->source,
            'encoding' => 0,
            'schedule_time' => '',
            'message' => $message,
            'recipients' => $recipients,
        ];

        $Url = 'https://apisms.beem.africa/v1/send';

        $ch = curl_init($Url);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Authorization:Basic ' . base64_encode("$this->key:$this->secret"),
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));

        $response = curl_exec($ch);

        if ($response === FALSE)
        {
            abort(500);
//            echo $response;

            die(curl_error($ch));
        }

//        var_dump($response);
    }

    public function sendSingleSMS(string $recipient, string $message)
    {
        $receivers[] = ['recipient_id' =>  1, 'dest_addr' => $recipient];

        return $this->send($receivers, $message);

    }

    public function sendMultipleSMS(array $recipients, string $message)
    {
        foreach ($recipients as $id => $phone){
            $receivers[] = ['recipient_id' => $id + 1, 'dest_addr' => $phone];
        }

        return $this->send($receivers, $message);
    }
}
