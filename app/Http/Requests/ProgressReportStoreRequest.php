<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgressReportStoreRequest extends FormRequest
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
            'office_id'         => 'required|exists:offices,id',
            'report_period_id'  => 'required|exists:report_periods,id',
            'attachment'        => 'required|file|mimetypes:application/pdf|mimes:pdf',
        ];
    }
}
