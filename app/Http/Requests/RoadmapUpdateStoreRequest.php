<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoadmapUpdateStoreRequest extends FormRequest
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
            'roadmap_id'            => 'required|exists:roadmaps,id',
            'progress_report_id'    => 'required|exists:progress_reports,id',
            'participants_involved' => 'required',
            'activities_done'       => 'required',
            'activities_ongoing'    => 'required',
            'overall_status'        => 'required',
            'report_date'           => 'required|date|before_or_equal:now',
            'remarks'               => 'required',
            'attachment'            => 'sometimes|file|mimetypes:application/pdf|mimes:pdf',
        ];
    }
}
