<?php
class NumberPhoneController
{
    private $numberPhoneModel;

    public function __construct(NumberPhoneModel $numberPhoneModel)
    {
        $this->numberPhoneModel = $numberPhoneModel;
    }

    public function searchNdiByPhoneNumber(?string $phoneNumber = null)
    {
        return $this->numberPhoneModel->searchNdiByPhoneNumber($phoneNumber);
    }
}
?>