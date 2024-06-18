<?php

namespace App\Exports;

use App\Models\Posyandu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class PosyanduExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        return Posyandu::select([
            'nik',
            'nkk',
            'nama',
            'tempat_lahir',
            'tgl_lahir',
            'alamat',
            'rt_rw',
            'umur',
        ])->orderBy('nik')->get();
    }

    public function headings(): array
    {
        return [
            'Nik',
            'Nkk',
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'Rt/Rw',
            'Umur',
        ];
    }
}
