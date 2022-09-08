<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SearchFormTest extends TestCase
{
    /**
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_a_search_form_can_be_rendered()
    {
        $companyNameField = 'Company Name';
        $fakeCompany = new \stdClass();
        $fakeCompany->$companyNameField = 'test company';
        $fakeCompany->Symbol = 'AAAA';

        $view = $this->view('searchForm', ['companies' => [$fakeCompany], 'errors' => null]);
        $view->assertSee('AAAA');
    }

    public function test_form_validation()
    {
        $this->get(route('historicalData'))->assertSessionHasErrors(['email', 'startDate', 'endDate', 'companySymbol']);
    }
}
