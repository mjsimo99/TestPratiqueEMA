<?php

class EligibilityController
{
    private $eligibilityModel;

    public function __construct(EligibilityModel $eligibilityModel)
    {
        $this->eligibilityModel = $eligibilityModel;
    }

    public function fetchData($ndi, $ndiStatus, $idtown, $street, $number, $latitude, $longitude)
    {
        $data = $this->eligibilityModel->fetchData($ndi, $ndiStatus, $idtown, $street, $number, $latitude, $longitude);

        if ($data && isset($data['data'])) {
            return $data['data'];
        } else {
            return array();
        }
    }
}