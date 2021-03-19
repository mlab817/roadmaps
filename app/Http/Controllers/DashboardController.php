<?php

namespace App\Http\Controllers;

use App\Exports\DashboardExport;
use App\Models\Office;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $offices = Office::with([
            'latest_report.roadmap_updates',
            'latest_report.report_period',
            'roadmaps.commodity',
            'roadmaps.latest_update'
        ])->get();

        return view('dashboard', compact('offices'));
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new DashboardExport, 'dashboard.xlsx');
    }
}
