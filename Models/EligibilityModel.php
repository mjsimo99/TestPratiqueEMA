<?php

class EligibilityModel
{
    public function fetchData($ndi, $ndiStatus, $idtown, $street, $number, $latitude, $longitude)
    {
        $apiUrl = "https://demo-xvno.ema.expert/ema/api/v1/retailer_eligibility/?ndi=" . urlencode($ndi) . "&ndi_status=" . urlencode($ndiStatus) . "&idtown=" . urlencode($idtown) . "&street=" . urlencode($street) . "&number=" . urlencode($number) . "&latitude=" . urlencode($latitude) . "&longitude=" . urlencode($longitude);

        $username = "14484";
        $password = "3fca31f5bee9e79e6951a1192c991e1fb05fdf9ebe912e4fbdfb6d5feb79663e525e7d36bd10ae271425f232b55b15e8e166bcc65f5d350509d9f5c4e5f8cad5";
        $auth = base64_encode($username . ":" . $password);

        $curl = curl_init($apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic ' . $auth
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            return array("error" => "Error fetching data: $error");
        } else {
            $data = json_decode($response, true);
            return $data;
        }
    }
}