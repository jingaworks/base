<?php

namespace App\Http\Requests;

use App\Models\Certificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCertificateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('certificate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'       => [
                'string',
                'required',
            ],
            'serie'      => [
                'string',
                'required',
                'unique:certificates',
            ],
            'address_id' => [
                'required',
                'integer',
            ],
            'valid_year' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}