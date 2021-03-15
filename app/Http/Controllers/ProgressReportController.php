<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\ProgressReport;
use App\Models\ReportPeriod;
use App\Traits\WithFileUpload;
use Illuminate\Http\Request;

class ProgressReportController extends Controller
{
    use WithFileUpload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progress_reports = ProgressReport::paginate(10);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upload = $this->handleUpload($request->attachment);
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
        //
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
        //
    }
}
