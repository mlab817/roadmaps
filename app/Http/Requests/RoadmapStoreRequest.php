<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoadmapStoreRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'office_id'                 => 'required|exists:offices,id',
            'commodity_id'              => 'required|exists:commodities,id',
            'start_date'                => 'required|max:50',
            'pcaf_consultation_date'    =>  'sometimes'
        ];
    }
}
