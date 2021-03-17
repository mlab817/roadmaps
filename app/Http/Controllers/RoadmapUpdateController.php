<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoadmapUpdateStoreRequest;
use App\Jobs\DeleteOldFileJob;
use App\Models\ProgressReport;
use App\Models\ReportPeriod;
use App\Models\Roadmap;
use App\Models\RoadmapUpdate;
use App\Services\UploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoadmapUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $roadmap_updates = $request->query('report_period_id')
            ? RoadmapUpdate::with(['roadmap.commodity','progress_report','report_period'])->join('progress_reports','progress_reports.id','=','roadmap_updates.progress_report_id')->where('progress_reports.report_period_id', $request->query('report_period_id'))->paginate(10)
            : RoadmapUpdate::paginate(10);

        return view('roadmap-updates.index', compact('roadmap_updates'))
            ->with('report_periods', ReportPeriod::select('id AS value','name AS label')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $roadmap = Roadmap::with('commodity')->findOrFail($request->query('roadmap_id'));
        $roadmap_update = new RoadmapUpdate();

        $progress_reports = ProgressReport::join('offices','offices.id','=','progress_reports.office_id')
            ->join('report_periods','report_periods.id','=','progress_reports.report_period_id')
            ->selectRaw('progress_reports.id AS value')
            ->selectRaw('concat(offices.name," as of ",report_periods.name) AS label')
            ->get();

        return view('roadmap-updates.form', compact('roadmap_update'))
            ->with('progress_reports', $progress_reports)
            ->with('roadmap', $roadmap);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoadmapUpdateStoreRequest $request
     * @param UploadService $uploadService
     */
    public function store(RoadmapUpdateStoreRequest $request, UploadService $uploadService)
    {
        $attachment = $request->file('attachment')
            ? $uploadService->uploadFile($request->file('attachment'),'roadmap updates')
            : null;

        $roadmapUpdate = RoadmapUpdate::updateOrCreate([
            'id'                    => $request->id,
        ],[
            'roadmap_id'            => $request->roadmap_id,
            'progress_report_id'    => $request->progress_report_id,
            'participants_involved' => $request->participants_involved,
            'activities_done'       => $request->activities_done,
            'activities_ongoing'    => $request->activities_ongoing,
            'overall_status'        => $request->overall_status,
            'report_date'           => $request->report_date,
            'remarks'               => $request->remarks,
            'user_id'               => auth()->user()->id,
        ]);

        if ($attachment) {
            if ($roadmapUpdate->attachment_path) {
                DeleteOldFileJob::dispatch($roadmapUpdate->attachment_path);
            }

            $roadmapUpdate->attachment_path       = $attachment['path'];
            $roadmapUpdate->attachment_url        = $attachment['url'];
            $roadmapUpdate->save();
        }

        return redirect()->route('roadmaps.show', ['roadmap' => $request->roadmap_id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoadmapUpdate  $roadmapUpdate
     * @return Response
     */
    public function show(RoadmapUpdate $roadmapUpdate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoadmapUpdate  $roadmapUpdate
     * @return Response
     */
    public function edit(RoadmapUpdate $roadmapUpdate)
    {
        $progress_reports = ProgressReport::join('offices','offices.id','=','progress_reports.office_id')
            ->join('report_periods','report_periods.id','=','progress_reports.report_period_id')
            ->selectRaw('progress_reports.id AS value')
            ->selectRaw('concat(offices.name," as of ",report_periods.name) AS label')
            ->get();

        return view('roadmap-updates.form')
            ->with('roadmap_update', $roadmapUpdate)
            ->with('roadmap', Roadmap::find($roadmapUpdate->roadmap_id))
            ->with('progress_reports', $progress_reports);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoadmapUpdate  $roadmapUpdate
     * @return Response
     */
    public function update(Request $request, RoadmapUpdate $roadmapUpdate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoadmapUpdate  $roadmapUpdate
     * @return Response
     */
    public function destroy(RoadmapUpdate $roadmapUpdate)
    {
        $roadmapId = $roadmapUpdate->roadmap->id;
        $roadmapUpdate->delete();

        return redirect()->route('roadmaps.show', $roadmapId);
    }
}
