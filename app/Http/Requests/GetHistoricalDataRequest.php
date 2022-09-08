<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class GetHistoricalDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'companySymbol' => 'required|max:4',
            'startDate' => 'required|date|before_or_equal:endDate|before_or_equal:' . Carbon::now()->toDateString(),
            'endDate' => 'required|date|after_or_equal:start_date|before_or_equal:' . Carbon::now()->toDateString(),
            'email' => 'required|email:rfc,dns',
        ];
    }
}
