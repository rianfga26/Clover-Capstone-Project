<?php

namespace App\Exports;

use App\Models\Posyandu;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PosyanduExport implements FromQuery
{

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function query()
    {
        return Posyandu::all();
    }
}
