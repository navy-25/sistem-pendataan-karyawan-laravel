<?php

namespace App\Exports;

use App\ko_perkes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
class koExport implements FromView{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('menu.perkes.ko.ko_perkes_excel', [
            'datas' => ko_perkes::all()
        ]);
    }
}
