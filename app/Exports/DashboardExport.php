<?php

namespace App\Exports;

use App\Models\Office;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DashboardExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard', [
            'offices'   => Office::with([
                                'latest_report.roadmap_updates',
                                'latest_report.report_period',
                                'roadmaps.commodity',
                                'roadmaps.latest_update'
                            ])->get(),
        ]);
    }
}
