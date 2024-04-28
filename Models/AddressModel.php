<?php
require_once 'app/Classes/config/config.php';

class AddressModel
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

    public function searchNdiByAddress(?float $latitude = null, ?float $longitude = null): ?array
    {
        if (!$latitude || !$longitude) {
            return null;
        }

        $url = ADDRESS_API_URL . '?latitude=' . urlencode($latitude) . '&longitude=' . urlencode($longitude);
        $username = API_USERNAME;
        $password = API_PASSWORD;

        $curl = $this->setupCurl($url, $username, $password);
        $response = curl_exec($curl);
        $error = curl_error($curl);

        if ($error) {
            throw new RuntimeException("Curl error: $error");
        }

        curl_close($curl);
        $data = json_decode($response, true);

        return $data ?: null;
    }
}