<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetHistoricalDataRequest;
use App\Jobs\SendMailJob;
use App\Services\YhFinanceService;
use Illuminate\Contracts\View\View;

class QuoteController extends Controller
{
    private string $companySymbol;
    private string $startDate;
    private string $endDate;
    private string $email;
    private string $companyName;


    /**
     * @param GetHistoricalDataRequest $request
     * @param YhFinanceService $yhFinanceService
     * @return View
     */
    public function getHistoricalData(GetHistoricalDataRequest $request, YhFinanceService $yhFinanceService): View
    {
        $this->setupVariablesFromRequest($request->all());

        $filteredPrices = $yhFinanceService->getQuotesBySymbolAndDates($this->companySymbol, $this->startDate, $this->endDate);
        if ($filteredPrices) {
            $this->sendInfoEmail();
        }
        return view('historicalData', ['prices' => $filteredPrices, 'companyName' => $this->companyName]);
    }

    /**
     * @param $requestData
     * @return void
     */
    private function setupVariablesFromRequest($requestData): void
    {
        $this->companySymbol = $requestData['companySymbol'];
        $this->startDate = $requestData['startDate'];
        $this->endDate = $requestData['endDate'];
        $this->email = $requestData['email'];
        $this->companyName = $requestData['companyName'] ?? 'Úndefined';

    }

    /**
     * @return void
     */
    private function sendInfoEmail(): void
    {
        SendMailJob::dispatch($this->companyName, $this->startDate, $this->endDate, $this->email);
    }
}
