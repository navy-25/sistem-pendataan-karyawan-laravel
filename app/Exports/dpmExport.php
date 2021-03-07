<?php

namespace App\Exports;

use App\dpm_rap;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class dpmExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */   
    public function view(): View
    {
        return view('menu.rap.dpm.dpm_rap_excel', [
            'datas' => dpm_rap::all()
        ]);
    }
}
