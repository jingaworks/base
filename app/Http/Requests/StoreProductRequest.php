<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title'          => [
                'string',
                'required',
            ],
            'category_id'    => [
                'required',
                'integer',
            ],
            'subcategory_id' => [
                'required',
                'integer',
            ],
            'profile_id'     => [
                'required',
                'integer',
            ],
            'address_id'     => [
                'required',
                'integer',
            ],
        ];
    }
}