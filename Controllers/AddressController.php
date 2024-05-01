<?php
// app/Controllers/AddressController.php
class AddressController
{
    private $addressModel;

    public function __construct(AddressModel $addressModel)
    {
        $this->addressModel = $addressModel;
    }

    public function searchNdiByAddress(?float $latitude = null, ?float $longitude = null)
    {
        return $this->addressModel->searchNdiByAddress($latitude, $longitude);
    }
    
}