<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;

class YhFinanceService
{

    /**
     * @param string $symbol
     * @param string $startDate
     * @param string $endDate
     * @return array
     */
    public function getQuotesBySymbolAndDates(string $symbol, string $startDate, string $endDate): array
    {
        try {
            $client = new Client();
            $response = $client->get(config('services.yh-finance.root_url') . '?symbol=' . $symbol . '&region=US', ['headers' => [
                'X-RapidAPI-Key' => config('services.yh-finance.header_parameters.x-rapidapi-key'),
                'X-RapidAPI-Host' => config('services.yh-finance.header_parameters.x-rapidapi-host'),
            ],]);
            $result = json_decode($response->getBody()->getContents());
            $result = $result->prices;
            if (!$result) {
                return [];
            }
            return $this->filterQuotesByDates($result, $startDate, $endDate);
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * @param $prices
     * @param string $startDate
     * @param string $endDate
     * @return array
     */
    private function filterQuotesByDates($prices, string $startDate, string $endDate): array
    {

        $filteredPrices = array_filter($prices, function ($item) use ($startDate, $endDate) {
            $current = Carbon::createFromTimestamp($item->date);
            if ($current->gte(Carbon::parse($startDate)) and $current->lte(Carbon::parse($endDate)) and $item->open and $item->close) {
                $item->date = Carbon::createFromTimestamp($item->date)->toDateString();
                return true;
            }
            return false;
        });
        return $filteredPrices;
    }
}
