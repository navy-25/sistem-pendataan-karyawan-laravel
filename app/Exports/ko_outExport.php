<?php

namespace App\Exports;

use App\ko_out_perkes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class ko_outExport implements FromView{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('menu.perkes.ko.ko_out_perkes_excel', [
            'datas' => ko_out_perkes::all()
        ]);
    }
}
