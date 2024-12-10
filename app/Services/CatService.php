<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Psr\Http\Message\ResponseInterface;

class CatService
{
    private string $baseUri;
    private string $apiKey;
    private Client $httpClient;

    /**
     * @param string $baseUri
     * @param string $apiKey
     */
    public function __construct(string $baseUri, string $apiKey)
    {
        $this->baseUri = $baseUri;
        $this->apiKey = $apiKey;
        $this->httpClient = new Client(
            [
                'base_uri' => $this->baseUri,
                'headers' => ['x-api-key' => $this->apiKey]
            ]
        );
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function loadData()
    {
        /*
         * There is a very naive cache control here, ideally you want to cache at service level.
         * What I would do is to have varnish, or nginx in reverse proxy to the cat api, and manage the cache from there.
         */
        $response = $this->httpClient->get('breeds');
        $data = array();
        $rawData = $this->parseResponse($response);
        foreach ($rawData as $breed) {
            $data[] = array('name' => $breed['name'], 'id' => $breed['id']);
            Cache::add($breed['name'], $breed, now()->addMinutes(10));
        }
        Cache::add('cat_breeds', $data, now()->addMinutes(10));
        return $data;
    }

    /**
     * @return array
     */
    public function getBreeds(): array
    {
        if (!Cache::has('cat_breeds')) {
            return $this->loadData();
        }
        return Cache::get('cat_breeds');
    }

    /**
     * @param string $name
     * @return string|null
     */
    public function getBreedIdByName(string $name): ?string
    {
        if (!Cache::has($name)) {
            $this->loadData();
        }
        $cat = Cache::get($name, ['id' => null]);
        return $cat['id'];
    }


    /**
     * @param string $id
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getBreedById(string $id): array
    {
        $response = $this->httpClient->get('breeds/' . $id);
        return $this->parseResponse($response);
    }

    /**
     * @param ResponseInterface $response
     * @return array|mixed
     */
    private function parseResponse(ResponseInterface $response): mixed
    {
        if ($response->getStatusCode() == 200) {
            try {
                $data = $response->getBody();
                $jsonArray = json_decode($data, true);
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
