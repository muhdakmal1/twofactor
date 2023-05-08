<?php

namespace App\Http\Requests;

use App\Models\model_cps_template;
use App\Models\model_cps_customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateKadRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'intro_desc' => [
                'required',
            ],
        ];
    }
}
