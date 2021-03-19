<?php

namespace App\Exports;

use App\Models\Office;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DashboardExport implements FromView, WithStyles, WithColumnWidths
{
    /**
     * @return View
     */
    public function view(): View
    {
        return view('exports.dashboard', [
            'offices'   => Office::with([
                                'latest_report.roadmap_updates',
                                'latest_report.report_period',
                                'roadmaps.commodity',
                                'roadmaps.latest_update'
                            ])->get(),
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1           => [
                'font' => ['bold' => true, 'align' => 'center'],
                'alignment' => ['horizontal' => 'center']
            ],
            'A:G'     => ['alignment' => ['vertical' => 'top', 'wrapText' => true]]
        ];
    }

    /**
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 36,
            'B' => 15,
            'C' => 35,
            'D' => 35,
            'E' => 30,
            'F' => 30,
            'G' => 15,
        ];
    }
}
