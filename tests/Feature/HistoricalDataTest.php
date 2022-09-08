<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class HistoricalDataTest extends TestCase
{
    /**
     * @return void
     */
    public function test_view_can_be_rendered()
    {
        //it is better to move fake object to setUp() method
        $fakeResponse = new \stdClass();
        $fakeResponse->date = 1662557400;
        $fakeResponse->open = 1.2699999809265137;
        $fakeResponse->high = 1.3600000143051147;
        $fakeResponse->low = 1.25;
        $fakeResponse->close = 1.3300000429153442;
        $fakeResponse->volume = 4452200;
        $fakeResponse->adjclose = 1.3300000429153442;

        $view = $this->view('historicalData', ['companyName' => 'fake company', 'prices' => [$fakeResponse],]);
        $view->assertSee($fakeResponse->open);
    }

    public function test_view_without_data_can_be_rendered()
    {
        $view = $this->view('historicalData', ['companyName' => 'fake company', 'prices' => [],]);
        $view->assertSee('No data to display');
    }
}
