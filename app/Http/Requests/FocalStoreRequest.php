<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FocalStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'focal_type_id'     => 'required|exists:focal_types,id',
            'office_id'         => 'required|exists:offices,id',
            'name'              => 'required|max:50',
            'designation'       => 'required|max:50',
            'email'             => 'required|max:50',
            'telephone_number'  => 'max:50',
            'fax_number'        => 'max:50',
            'mobile_number'     => 'max:50',
            'viber_number'      => 'max:50',
            'roadmaps'          => 'required|array',
        ];
    }
}
