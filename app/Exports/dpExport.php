<?php

namespace App\Exports;

use App\dp_rap;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class dpExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */   
    public function view(): View
    {
        return view('menu.rap.dp.dp_rap_excel', [
            'datas' => dp_rap::all()
        ]);
    }
}
