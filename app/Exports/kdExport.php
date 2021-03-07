<?php

namespace App\Exports;

use App\kd_perkes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class kdExport implements FromView{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('menu.perkes.kd.kd_perkes_excel', [
            'datas' => kd_perkes::all()
        ]);
    }
}
