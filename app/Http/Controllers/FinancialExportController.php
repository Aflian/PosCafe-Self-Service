<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use App\Exports\FinancialExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class FinancialExportController extends Controller
{
    public function excel($from, $to)
    {
        return Excel::download(
            new FinancialExport($from, $to),
            "laporan-keuangan-$from-$to.xlsx"
        );
    }

    public function pdf($from, $to)
    {
        $data = Financial::whereBetween('tanggal', [$from, $to])->get();

        $pdf = Pdf::loadView('exports.financial-pdf', [
            'data' => $data,
            'from' => $from,
            'to'   => $to,
        ]);

        return $pdf->download("laporan-keuangan-$from-$to.pdf");
    }
}
