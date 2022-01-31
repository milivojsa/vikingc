<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelGuideRequest extends FormRequest
{
    public function rules()
    {
        return [
            'country' => 'string|required',
            'city' => 'string|required',
            'date' => 'date|required',
        ];
    }
}
