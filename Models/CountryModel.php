<?php
require_once 'app/Classes/config/config.php';

class CountryModel {
    private function setupCurl($url, $username, $password) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        return $curl;
    }

    public function fetchCountryData(): ?array {
        $url = COUNTRY . '?iso_alpha2=fr';
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

    public function searchCountry(?string $isoAlpha2 = null): ?array {
        $url = COUNTRY . ($isoAlpha2 ? '?iso_alpha2=' . $isoAlpha2 : '');
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