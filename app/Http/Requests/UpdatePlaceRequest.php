<?php

namespace App\Http\Requests;

use App\Models\Place;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePlaceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('place_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'denloc' => [
                'string',
                'nullable',
            ],
        ];
    }
}