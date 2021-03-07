<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\tkExport;
use Excel;
class PimpinanController extends Controller
{
    public function index()
    {
        return view('menu.pimpinan.index');
    }  
    public function tk(Request $request)
    {
        if(auth()->user()->is_admin == 'tamu'){
            $tk = \App\tk_pimpinan::orderBy('id', 'DESC')->get();
        }else{    
            if($request->has('cari') ){
                $tk = \App\tk_pimpinan::where('nama_kegiatan','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{                        
                $tk = \App\tk_pimpinan::
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
                orderBy('id', 'DESC')->get();
            }   
        }
        return view('menu.pimpinan.tk',compact('tk'));
    }    
    public function ptk(Request $request)
    {
        if(auth()->user()->is_admin == 'tamu'){
            $ptk = \App\ptk_pimpinan::orderBy('id', 'DESC')->get();
        }else{    
            if($request->has('cari') ){
                $ptk = \App\ptk_pimpinan::where('nama_kegiatan','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{                        
                $ptk = \App\ptk_pimpinan::
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
                orderBy('id', 'DESC')->get();
            }   
        }
        return view('menu.pimpinan.ptk',compact('ptk'));
    }  
    public function pws(Request $request)
    {
        if(auth()->user()->is_admin == 'tamu'){
            $pws = \App\pws_pimpinan::orderBy('id', 'DESC')->get();
        }else{    
            if($request->has('cari') ){
                $pws = \App\pws_pimpinan::where('nama_petugas','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{                        
                $pws = \App\pws_pimpinan::
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
                orderBy('id', 'DESC')->get();
            }   
        }
        return view('menu.pimpinan.pws',compact('pws'));
    }   
     //Excel
     public function export_excel_tk()
     {        
         return Excel::download(new tkExport, 'TK_Pimpinan.xlsx');
     }

     //TK
     public function store_tk(Request $request){       
        date_default_timezone_set('Asia/Jakarta');
        $tk = \App\tk_pimpinan::create([            
            'id_user' => auth()->user()->id,     
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'tempat' => $request->tempat,
            'status' => $request->status,
            'konsep' => $request->konsep,
            'dasar' => $request->dasar,
        ]);
        return redirect('/pimpinan/tk')->with('status','Data Berhasil Ditambahkan');
    }
    public function lihat_tk($id){
        $tk = \App\tk_pimpinan::find($id);
        return view('menu.pimpinan.tk.tk_tampil',compact('tk'));
    }
    public function hapus_tk($id){
        $tk = \App\tk_pimpinan::find($id);
        $tk->delete($tk);
        return redirect('/pimpinan/tk')->with('status','Data Berhasil Dihapus');
    }   
    public function edit_tk($id){
        $tk = \App\tk_pimpinan::find($id);
        return view('menu.pimpinan.tk.tk_edit',compact('tk'));
    }
    public function update_tk(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
    	$this->validate($request,[    	
            'nama_kegiatan'  => 'required',
            'tanggal'  => 'required',
            'bulan'  => 'required',
            'tahun'  => 'required',
            'tempat'  => 'required',
            'status'  => 'required',
            'konsep'  => 'required',
            'dasar'  => 'required',
    	]);
        $tk = \App\tk_pimpinan::find($id);
        $tk->update($request->all());
        return redirect('/pimpinan/tk')->with('status','Data Berhasil Diperbarui');
    }
     //PTK
     public function store_ptk(Request $request){   
        date_default_timezone_set('Asia/Jakarta');    
        $ptk = \App\ptk_pimpinan::create([            
            'id_user' => auth()->user()->id,     
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'tempat' => $request->tempat,
            'status' => $request->status,
            'persiapan' => $request->persiapan,
            'penanggung_jawab' => $request->penanggung_jawab,
        ]);
        return redirect('/pimpinan/ptk')->with('status','Data Berhasil Ditambahkan');
    }
    public function edit_ptk($id){
        $ptk = \App\ptk_pimpinan::find($id);
        return view('menu.pimpinan.ptk.ptk_edit',compact('ptk'));
    }
    public function lihat_ptk($id){
        $ptk = \App\ptk_pimpinan::find($id);
        return view('menu.pimpinan.ptk.ptk_tampil',compact('ptk'));
    }
    public function update_ptk(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $ptk = \App\ptk_pimpinan::find($id);
    	$this->validate($request,[
            'nama_kegiatan' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' =>'required',
            'tempat' => 'required',
            'status' => 'required',
            'persiapan' => 'required',
            'penanggung_jawab' => 'required',
         
    	]);
        $ptk->update($request->all());
        return redirect('/pimpinan/ptk')->with('status','Data Berhasil Diperbarui');
    }
    public function hapus_ptk($id){
        $ptk = \App\ptk_pimpinan::find($id);
        $ptk->delete($ptk);
        return redirect('/pimpinan/ptk')->with('status','Data Berhasil Dihapus');
    }   
     //PWS
     public function store_pws(Request $request){     
        date_default_timezone_set('Asia/Jakarta');  
        $pws = \App\pws_pimpinan::create([            
            'id_user' => auth()->user()->id,     
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama_pegawai' => $request->nama_pegawai,
            'kegiatan' => $request->kegiatan,
            'hasil_kegiatan' => $request->hasil_kegiatan,
            'jam_mulai' => $request->jam_mulai,
            'menit_mulai' => $request->menit_mulai,
            'jam_selesai' => $request->jam_selesai,
            'menit_selesai' => $request->menit_selesai,
            'foto' => $request->foto,
        ]);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->file('foto')->getClientOriginalName();
            $foldername = auth()->user()->username;
            $request->file('foto')->move('images/pimpinan/pengawasan/foto/',$filename);
            $pws->foto = $request->file('foto')->getClientOriginalName();
            $pws->save();
        }     
        return redirect('/pimpinan/pws')->with('status','Data Berhasil Ditambahkan');
    }
    public function hapus_pws($id){
        $pws = \App\pws_pimpinan::find($id);
        $pws->delete($pws);
        return redirect('/pimpinan/pws')->with('status','Data Berhasil Dihapus');
    }   
    public function edit_pws($id){
        $pws = \App\pws_pimpinan::find($id);
        return view('menu.pimpinan.pws.pws_edit',compact('pws'));
    }
    public function update_pws(Request $request,$id){      
        date_default_timezone_set('Asia/Jakarta');  
        $pws = \App\pws_pimpinan::find($id);
        if ($request->hasFile('foto')==null ) {
            if($pws->foto != null){
                $this->validate($request,[                                   
                    'foto' => $pws->foto,
                ]);   
            }else{
                $this->validate($request,[                                   
                    'foto' => '',
                ]);   
            }
            // dd($dd->foto);
        }else if ($request->hasFile('foto')!=null) {
            $this->validate($request,[                                 
                'foto' => 'required',
            ]);            
        }
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->file('foto')->getClientOriginalName();
            $foldername = auth()->user()->username;
            $request->file('foto')->move('images/pimpinan/pengawasan/foto/',$filename);
            $pws->foto = $request->file('foto')->getClientOriginalName();
            $pws->save();
        }           
      
        $data = [            
            'id_user' => auth()->user()->id,     
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama_pegawai' => $request->nama_pegawai,
            'kegiatan' => $request->kegiatan,
            'hasil_kegiatan' => $request->hasil_kegiatan,
            'jam_mulai' => $request->jam_mulai,
            'menit_mulai' => $request->menit_mulai,
            'jam_selesai' => $request->jam_selesai,
            'menit_selesai' => $request->menit_selesai,
        ];
        $pws->update($data);        
        return redirect('/pimpinan/pws')->with('status','Data Berhasil Diperbarui');
    }
    public function lihat_pws($id){
        $pws = \App\pws_pimpinan::find($id);
        return view('menu.pimpinan.pws.pws_tampil',compact('pws'));
    }
}
