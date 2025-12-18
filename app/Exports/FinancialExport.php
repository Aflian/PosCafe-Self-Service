<?php

namespace App\Exports;

use App\Models\Financial;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FinancialExport implements FromCollection, WithHeadings
{
    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    public function collection()
    {
        return Financial::whereBetween('tanggal', [$this->from, $this->to])
            ->select('tanggal', 'order_id', 'pemasukan', 'created_at')
            ->orderBy('tanggal')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Order ID',
            'Pemasukan',
            'Dicatat Pada',
        ];
    }
}
