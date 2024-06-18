<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PosyanduExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Posyandu;

class AnggotaController extends Controller
{
    //
    public function export()
    {
        return Excel::download(new PosyanduExport, 'posyandu.xlsx');
    }
}
