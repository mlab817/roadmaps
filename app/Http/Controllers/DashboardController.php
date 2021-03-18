<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

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
}
