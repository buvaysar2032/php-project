<?php

class LocationModel
{
    private string $apiUrl;
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiUrl = 'https://us1.locationiq.com/v1/';
        $this->apiKey = $apiKey;
    }

    public function getAddressByCoordinates(array $coordinates): array
    {
        $url = $this->apiUrl . 'reverse.php?key=' . $this->apiKey . '&lat=' . $coordinates['latitude'] . '&lon=' . $coordinates['longitude'] . '&format=json';

        return $this->makeRequest($url);
    }

    public function getCoordinatesByAddress(array $addressData): array
    {
        $url = $this->apiUrl . 'search.php?key=' . $this->apiKey . '&q=' . urlencode($addressData['address']) . '&format=json';

        return $this->makeRequest($url);
    }

    private function makeRequest(string $url): array
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}

?>
