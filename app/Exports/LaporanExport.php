<?php

namespace App\Exports;

use App\Models\Kamar;
use App\Models\Penyewa;
use App\Models\Tagihan;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;

class LaporanExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    public function collection()
    {
        $data = collect();
        
        // ===== DATA KAMAR =====
        $kamars = Kamar::all();
        foreach ($kamars as $kamar) {
            $data->push([
                'Kamar',
                $this->cleanText($kamar->nama ?? '-'),
                $this->cleanText('Rp ' . number_format($kamar->harga ?? 0, 0, ',', '.')),
                $this->cleanText($kamar->status ?? '-'),
                $this->cleanText($kamar->fasilitas ?? '-'),
                '',
                '',
                '',
            ]);
        }
        
        // ===== SPACER =====
        $data->push(['', '', '', '', '', '', '', '']);
        $data->push(['--- DATA PENYEWA ---', '', '', '', '', '', '', '']);
        
        // ===== DATA PENYEWA =====
        $penyewas = DB::table('penyewas')
            ->leftJoin('kamars', 'penyewas.kamar_id', '=', 'kamars.id')
            ->select('penyewas.*', 'kamars.nama as kamar_nama')
            ->get();
            
        foreach ($penyewas as $penyewa) {
            $data->push([
                'Penyewa',
                $this->cleanText($penyewa->nama_lengkap ?? '-'),
                $this->cleanText($penyewa->ktp ?? '-'),
                $this->cleanText($penyewa->no_hp ?? '-'),
                $this->cleanText($penyewa->kamar_nama ?? '-'),
                $this->cleanText($penyewa->status ?? '-'),
                $penyewa->tanggal_mulai_sewa ? Carbon::parse($penyewa->tanggal_mulai_sewa)->format('d/m/Y') : '-',
                $penyewa->tanggal_berakhir_sewa ? Carbon::parse($penyewa->tanggal_berakhir_sewa)->format('d/m/Y') : '-',
            ]);
        }
        
        // ===== SPACER =====
        $data->push(['', '', '', '', '', '', '', '']);
        $data->push(['--- DATA TAGIHAN ---', '', '', '', '', '', '', '']);
        
        // ===== DATA TAGIHAN =====
        $tagihans = Tagihan::with('penyewa')->get();
        foreach ($tagihans as $tagihan) {
            $data->push([
                'Tagihan',
                $this->cleanText($tagihan->penyewa ? $tagihan->penyewa->nama_lengkap : '-'),
                $this->cleanText($tagihan->bulan . ' ' . $tagihan->tahun),
                $this->cleanText('Rp ' . number_format($tagihan->nominal ?? 0, 0, ',', '.')),
                $this->cleanText('Rp ' . number_format($tagihan->biaya_tambahan ?? 0, 0, ',', '.')),
                $this->cleanText('Rp ' . number_format(($tagihan->nominal ?? 0) + ($tagihan->biaya_tambahan ?? 0), 0, ',', '.')),
                $this->cleanText($tagihan->status ?? '-'),
                $tagihan->jatuh_tempo ? Carbon::parse($tagihan->jatuh_tempo)->format('d/m/Y') : '-',
            ]);
        }
        
        return $data;
    }

    // ===== FUNGSI UNTUK MEMBERSIHKAN KARAKTER KHUSUS =====
    private function cleanText($text)
    {
        if (empty($text)) {
            return '';
        }
        
        // Jika teks dimulai dengan =, +, -, @, tambahkan spasi di depan
        $firstChar = substr(trim($text), 0, 1);
        if (in_array($firstChar, ['=', '+', '-', '@'])) {
            return ' ' . $text;
        }
        
        return $text;
    }

    public function headings(): array
    {
        return [
            'Tipe',
            'Nama / Penyewa',
            'KTP / Bulan',
            'No HP / Nominal',
            'Kamar / Biaya Tambahan',
            'Status / Total',
            'Status Sewa / Status Bayar',
            'Tanggal',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Style untuk header
        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
        $sheet->getStyle('A1:H1')->getFont()->setSize(12);
        
        // Auto-size
        foreach (range('A', 'H') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }
        
        return [];
    }
}