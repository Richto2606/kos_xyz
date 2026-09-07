<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SimpleExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return collect([
            ['John Doe', 'john@email.com', '2026-08-03'],
            ['Jane Doe', 'jane@email.com', '2026-08-03'],
            ['Budi Santoso', 'budi@email.com', '2026-08-03'],
        ]);
    }

    public function headings(): array
    {
        return ['Nama', 'Email', 'Tanggal'];
    }
}