<?php

namespace App\Http\Requests;

use App\Models\Profile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProfileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'       => [
                'string',
                'nullable',
            ],
            'phone'      => [
                'string',
                'required',
                'unique:profiles',
            ],
            'avatar'     => [
                'string',
                'nullable',
            ],
            'address_id' => [
                'required',
                'integer',
            ],
        ];
    }
}