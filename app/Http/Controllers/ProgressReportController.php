<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgressReportStoreRequest;
use App\Models\Office;
use App\Models\ProgressReport;
use App\Models\ReportPeriod;
use App\Services\UploadService;
use Illuminate\Http\Request;

class ProgressReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:edit progress reports')->only('create','edit','update','store');
        $this->middleware('permission:delete progress reports')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progress_reports = ProgressReport::with(['office','report_period'])->orderByDesc('id')->paginate(10);

        return view('progress-reports.index', compact('progress_reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $progress_report = new ProgressReport();

        return view('progress-reports.form', compact('progress_report'))
            ->with([
                'offices'           => Office::select('id AS value','name AS label')->get(),
                'report_periods'    => ReportPeriod::select('id AS value','name AS label')->get(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param UploadService $uploadService
     * @return \Illuminate\Http\Response
     */
    public function store(ProgressReportStoreRequest $request, UploadService $uploadService)
    {
        $upload = $uploadService->uploadFile($request->file('attachment'),'roadmaps');

        $progressReport = ProgressReport::updateOrCreate([
            'id'                => $request->id,
        ],[
            'office_id'         => $request->office_id,
            'report_period_id'  => $request->report_period_id,
            'attachment_path'   => $upload['path'],
            'attachment_url'    => $upload['url'],
            'remarks'           => $request->remarks,
            'user_id'           => auth()->user()->id,
        ]);

        return redirect()->route('progress-reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgressReport  $progressReport
     * @return \Illuminate\Http\Response
     */
    public function show(ProgressReport $progressReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgressReport  $progressReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgressReport $progressReport)
    {
        return view('progress-reports.form')
            ->with([
                'progress_report'   => $progressReport,
                'offices'           => Office::select('id AS value','name AS label')->get(),
                'report_periods'    => ReportPeriod::select('id AS value','name AS label')->get(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgressReport  $progressReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgressReport $progressReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgressReport  $progressReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgressReport $progressReport)
    {
        $progressReport->delete();

        return redirect()->route('progress-reports.index');
    }
}
