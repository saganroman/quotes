<?php

namespace App\Services;

use GuzzleHttp\Client;

class PkgStoreService
{


    /**
     * @return array|mixed
     */
    public function getData() :?array
    {
        try {
            $client = new Client();
            $response = $client->get(config('services.pkgstore.url'));
            $result = json_decode($response->getBody()->getContents());
            if (!$result) {
                return [];
            }
            return $result;
        } catch (\Throwable $e) {
            return [];
        }
    }
}
