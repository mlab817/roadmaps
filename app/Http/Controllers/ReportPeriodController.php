<?php

namespace App\Http\Controllers;

use App\Models\ReportPeriod;
use Illuminate\Http\Request;

class ReportPeriodController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:edit report periods')->only('create','edit','update','store');
        $this->middleware('permission:delete report periods')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportPeriod  $reportPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(ReportPeriod $reportPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportPeriod  $reportPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportPeriod $reportPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportPeriod  $reportPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportPeriod $reportPeriod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportPeriod  $reportPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportPeriod $reportPeriod)
    {
        //
    }
}
