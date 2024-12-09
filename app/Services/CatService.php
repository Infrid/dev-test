<?php

namespace App\Services;

use GuzzleHttp\Client;

class CatService
{
    private string $baseUri;
    private string $apiKey;
    private Client $httpClient;

    public function __construct(string $baseUri, string $apiKey)
    {
        $this->baseUri = $baseUri;
        $this->apiKey = $apiKey;
        $this->httpClient = new Client(
            [
                'base_uri' => $baseUri,
                'headers' => ['x-api-key' => $apiKey]
            ]
        );
    }

    public function getBreeds(): array
    {
        $response = $this->httpClient->get('breeds');
        return $this->parseResponse($response);
    }

    public function getBreed(string $id): array
    {
        $response = $this->httpClient->get('breeds/' . $id);
        return $this->parseResponse($response);
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return array|mixed
     */
    private function parseResponse(\Psr\Http\Message\ResponseInterface $response): mixed
    {
        if ($response->getStatusCode() == 200) {
            try {
                $data = $response->getBody();
                $jsonArray = json_decode($data, true);
                print_r($jsonArray);
                return $jsonArray;
            } catch (\GuzzleHttp\Exception\GuzzleException $e) {
                new \Exception('Error: ' . $e->getMessage());
            }
        } else {
            new \Exception("Error: Request failed with status code " . $response->getStatusCode());
        }
        return [];
    }


}
