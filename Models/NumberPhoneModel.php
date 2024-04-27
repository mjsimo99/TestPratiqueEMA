<?php
// app/Models/NumberPhoneModel.php
require_once 'app/Classes/config/config.php';

class NumberPhoneModel
{
    private function setupCurl($url, $username, $password)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        return $curl;
    }

    public function searchNdiByPhoneNumber(?string $phoneNumber = null): ?array
    {
        if (!$phoneNumber) {
            return null;
        }

        $url = NDI_API_URL . '?ndi=' . urlencode($phoneNumber);
        $username = API_USERNAME;
        $password = API_PASSWORD;
        $curl = $this->setupCurl($url, $username, $password);
        $response = curl_exec($curl);
        $error = curl_error($curl);
        if ($error) {
            throw new \RuntimeException("Curl error: $error");
        }
        curl_close($curl);
        $data = json_decode($response, true);
        return $data ?: null;
    }
}