<?php

namespace Tests\Unit;

use App\Jobs\SendMailJob;
use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SendJobTest extends TestCase
{
    public function test_job_dispatched_correctly()
    {
        $url = 'https://yh-finance.p.rapidapi.com/stock/v3/get-historical-datasymbol=AMRN&region=US';
        //it is better to move fake object to setUp() method
        $fakeResponse = new \stdClass();
        $fakeResponse->date = 1662557400;
        $fakeResponse->open = 1.2699999809265137;
        $fakeResponse->high = 1.3600000143051147;
        $fakeResponse->low = 1.25;
        $fakeResponse->close = 1.3300000429153442;
        $fakeResponse->volume = 4452200;
        $fakeResponse->adjclose = 1.3300000429153442;

        Http::fake([
            $url => Http::response([$fakeResponse], 200, []),
        ]);
        Bus::fake();
        $this->get(route('historicalData') . '?companyName=iShares+MSCI+All+Country+Asia+Information+Technology+Index+Fund&companySymbol=AMRN&startDate=08%2F29%2F2022&endDate=09%2F07%2F2022&email=saganroman%40gmail.com');
        Bus::assertDispatched(SendMailJob::class);


    }
}
