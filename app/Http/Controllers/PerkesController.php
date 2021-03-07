<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Exports\koExport;
use App\Exports\ko_outExport;
use App\Exports\kdExport;
class PerkesController extends Controller
{
    public function index()
    {
        return view('menu.perkes.index');
    }   
    public function ad_p(Request $request)
    {
        if(auth()->user()->is_admin == 'tamu'){
            $ad = \App\ad_perkes::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $ad = \App\ad_perkes::where('nama','LIKE','%'.$request->cari.'%')      
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{
                $ad = \App\ad_perkes::
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
                orderBy('id', 'DESC')
                ->get();
            }   
        }     
        return view('menu.perkes.ad-p',compact('ad'));
    }        
    public function kd(Request $request)
    {       
        if(auth()->user()->is_admin == 'tamu'){
            $kd = \App\kd_perkes::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $kd = \App\kd_perkes::where('nama_penerima','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{                        
                $kd = \App\kd_perkes::
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
                orderBy('id', 'DESC')->get();
            }   
        }
        return view('menu.perkes.kd',compact('kd'));
    }  
    public function ko_out(Request $request)
    {       
        if(auth()->user()->is_admin == 'tamu'){
            $ko_out = \App\ko_out_perkes::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $ko_out = \App\ko_out_perkes::where('nama_obat','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(100);
            }else{                        
                $ko_out = \App\ko_out_perkes::
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
                orderBy('id', 'DESC')->get();
            } 
        }  
        $ko = \App\ko_perkes::all();
        return view('menu.perkes.ko.ko-out',compact('ko_out','ko'));
    }  
    public function ko(Request $request)
    {
        if(auth()->user()->is_admin == 'tamu'){
            $ko = \App\ko_perkes::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $ko = \App\ko_perkes::where('nama_obat','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{                        
                $ko = \App\ko_perkes::
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
                orderBy('id', 'DESC')->get();
            }   
        }
        return view('menu.perkes.ko',compact('ko'));
    }   
    //exkport excel
    //KO
    public function to_excel_ko()
    {   
        $datas = \App\ko_perkes::get();
        return view('menu.perkes.ko.ko_perkes_excel',compact('datas'));
    }
    public function export_excel_ko()
    {   
        $nama_file = 'KO_Perkes'.'_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new koExport, $nama_file);     
    }
    //KO_OUT
    public function to_excel_ko_out()
    {   
        $datas = \App\ko_out_perkes::get();
        return view('menu.perkes.ko.ko_out_perkes_excel',compact('datas'));
    }
    public function export_excel_ko_out()
    {   
        $nama_file = 'KO_OUT_Perkes'.'_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new ko_outExport, $nama_file);     
    }
    //KD
    public function to_excel_kd()
    {   
        $datas = \App\kd_perkes::get();
        return view('menu.perkes.kd.kd_perkes_excel',compact('datas'));
    }
    public function export_excel_kd()
    {   
        $nama_file = 'KD_Perkes'.'_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new kdExport, $nama_file);     
    }
   
    //KD
    public function store_kd(Request $request){     
        date_default_timezone_set('Asia/Jakarta');  
        $kd = \App\kd_perkes::create([            
            // 'no' => $request->no,            
            'id_user' => auth()->user()->id,     
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama_penerima' => $request->nama_penerima,
            'jenis_kebutuhan' => $request->jenis_kebutuhan,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/perkes/kd')->with('status','Data Berhasil Ditambahkan');
    }
    public function hapus_kd($id){
        $kd = \App\kd_perkes::find($id);
        $kd->delete($kd);
        return redirect('/perkes/kd')->with('status','Data Berhasil Dihapus');
    }   
    public function edit_kd($id){
        $kd = \App\kd_perkes::find($id);
        return view('menu.perkes.kd.kd_edit',compact('kd'));
    }
    public function update_kd(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
    	$this->validate($request,[
    		// 'no' => 'required',
            // 'id_user' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'nama_penerima' => 'required',
            'jenis_kebutuhan' => 'required',
            'deskripsi' => 'required',
    	]);
        $kd = \App\kd_perkes::find($id);
        $kd->update($request->all());
        return redirect('/perkes/kd')->with('status','Data Berhasil Diperbarui');
    }
    public function lihat_kd($id){
        $kd = \App\kd_perkes::find($id);
        return view('menu.perkes.kd.kd_tampil',compact('kd'));
    }
    //ADP
    public function store_foto_adp(Request $request){     
        date_default_timezone_set('Asia/Jakarta');
        $a = array("B", "KB", "MB", "GB", "TB", "PB");
        $pos = 0;
        $size = filesize( $request->file('file'));
        while ($size >= 1024){
            $size /= 1024;
            $pos++;
        }
        $ad = \App\ad_perkes::create([            
            'id_user' => auth()->user()->id,     
            'nama' => $request->nama.'.'.$request->file('file')->getClientOriginalExtension(),
            'ukuran' => number_format($size,0) ." ".$a[$pos],
            'file' => $request->file,
            ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $request->nama.'.'.$request->file('file')->getClientOriginalExtension();
            $foldername = auth()->user()->username;
            $request->file('file')->move('files/perkes/adp/',$filename);
            $ad->file = $request->file('file')->getClientOriginalName();
            $ad->save();
        }        
        
        return redirect('/perkes/ad-p')->with('status','File Berhasil Ditambahkan');               
    }    
    public function hapus_adp($id){
        $ad = \App\ad_perkes::find($id);
        $ad->delete($ad);
        return redirect('/perkes/ad-p')->with('status','File Berhasil Dihapus');
    } 
    //KO
    public function store_ko(Request $request){       
        date_default_timezone_set('Asia/Jakarta');
        $ko = \App\ko_perkes::create([            
            // 'no' => $request->no,            
            'id_user' => auth()->user()->id,     
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama_obat' => $request->nama_obat,
            'kuantitas' => $request->kuantitas,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/perkes/ko')->with('status','Data Berhasil Ditambahkan');
    }
    public function hapus_ko($id){
        $ko = \App\ko_perkes::find($id);
        $ko->delete($ko);
        return redirect('/perkes/ko')->with('status','File Berhasil Dihapus');
    } 
    //KO
    public function store_ko_out(Request $request){    
        date_default_timezone_set('Asia/Jakarta');
        $ko = \App\ko_perkes::find($request->nama_obat);   
        $nama_obat = $ko->nama_obat;
        $ko_out = \App\ko_out_perkes::create([            
            'id_user' => auth()->user()->id,     
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama_obat' =>  $nama_obat,
            'kuantitas' => $request->kuantitas,
            'deskripsi' => $request->deskripsi,
        ]);

        $ko = \App\ko_perkes::find($request->nama_obat);
        $obatLama = $ko->kuantitas;
        $sisaObat =  $obatLama - $request->kuantitas;        
        $data = [            
            'kuantitas' => $sisaObat,
        ];
        $ko->update($data);
        return redirect('/perkes/ko-out')->with('status','Data Berhasil Ditambahkan');
    }
    public function update_ko(Request $request){           
        date_default_timezone_set('Asia/Jakarta');  
        $ko = \App\ko_perkes::find($request->nama_obat);
        $obatLama = $ko->kuantitas;
        $sisaObat =  $obatLama + $request->kuantitas;        
        $data = [            
            'kuantitas' => $sisaObat,
        ];
        $ko->update($data);
        return redirect('/perkes/ko')->with('status','Data Berhasil Ditambahkan');
    }
    public function hapus_ko_out($id){
        $ko_out = \App\ko_out_perkes::find($id);
        $ko_out->delete($ko_out);
        return redirect('/perkes/ko-out')->with('status','File Berhasil Dihapus');
    } 
}
