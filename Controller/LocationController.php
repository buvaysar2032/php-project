<?php

class LocationController
{
    private LocationModel $model;
    private LocationView $view;

    public function __construct(LocationModel $model, LocationView $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function getAddressByCoordinates(array $coordinates)
    {
        $result = $this->model->getAddressByCoordinates($coordinates);
        $this->view->renderResult($result);
    }

    public function getCoordinatesByAddress(array $addressData)
    {
        $result = $this->model->getCoordinatesByAddress($addressData);
        $this->view->renderResult($result);
    }
}

?>
