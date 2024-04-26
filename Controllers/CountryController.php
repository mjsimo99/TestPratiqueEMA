<?php
class CountryController
{
    private $countryModel;

    public function __construct(CountryModel $countryModel)
    {
        $this->countryModel = $countryModel;
    }

    public function fetchCountryData()
    {
        return $this->countryModel->fetchCountryData();
    }

    public function searchCountry(?string $isoAlpha2 = null) {
        return $this->countryModel->searchCountry($isoAlpha2);
    }
}

?>