<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Exports\dtpExport;
use App\Exports\dpbExport;
use App\Exports\lpjExport;

class KamtibController extends Controller
{
    public function index()
    {
        return view('menu.kamtib.index');
    } 
    public function lpj(Request $request)
    {       
        if(auth()->user()->is_admin == 'tamu'){
            $lpj = \App\lpj_kamtib::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $lpj = \App\lpj_kamtib::where('nama_petugas','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{                        
                $lpj = \App\lpj_kamtib::orderBy('id', 'DESC')->get();
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
            }   
        }
        return view('menu.kamtib.lpj',compact('lpj'));
    }    
    public function dpb(Request $request)
    {
        if(auth()->user()->is_admin == 'tamu'){
            $dpb = \App\dpb_kamtib::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $dpb = \App\dpb_kamtib::where('nama_deteni','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{                        
                $dpb = \App\dpb_kamtib::orderBy('id', 'DESC')->get();
                // $dpb = \App\dpb_kamtib::where('id_user','LIKE','%'.auth()->user()->id.'%')
                //     ->orderBy('id', 'DESC')->paginate(10);
            }        
        }
        return view('menu.kamtib.dpb',compact('dpb'));
    }  
    public function dtp(Request $request)
    {
        if(auth()->user()->is_admin == 'tamu'){
            $dtp = \App\dtp_kamtib::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $dtp = \App\dtp_kamtib::where('nama_petugas','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{            
                $dtp = \App\dtp_kamtib::orderBy('id', 'DESC')->get();
                // $dtp = \App\dtp_kamtib::where('id_user','LIKE','%'.auth()->user()->id.'%')
                // ->orderBy('id', 'DESC')
                // ->paginate(10);
            }        
        }
        return view('menu.kamtib.dtp',compact('dtp'));
    }   
    public function ad_k(Request $request)
    {        
        if(auth()->user()->is_admin == 'tamu'){
            $adk = \App\adk_kamtib::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $adk = \App\adk_kamtib::where('nama','LIKE','%'.$request->cari.'%')      
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{
                $adk = \App\adk_kamtib::
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
                orderBy('id', 'DESC')
                ->get();
            }        
        }
        return view('menu.kamtib.ad-k',compact('adk'));
    }   
    
    //LPJ
    public function store_lpj(Request $request){    
        date_default_timezone_set('Asia/Jakarta');
        $count = \App\lpj_kamtib::where('id_user','LIKE','%'.auth()->user()->id.'%')->count();   
        $lpj = \App\lpj_kamtib::create([            
            'no_laporan' => $count+1,            
            'id_user' => auth()->user()->id,     
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama_petugas' => $request->nama_petugas,
            'jam_mulai' => $request->jam_mulai,
            'menit_mulai' => $request->menit_mulai,
            'jam_selesai' => $request->jam_selesai,
            'menit_selesai' => $request->menit_selesai,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/kamtib/lpj')->with('status','Data Berhasil Ditambahkan');
    }
    public function hapus_lpj($id){
        $lpj = \App\lpj_kamtib::find($id);
        $lpj->delete($lpj);
        return redirect('/kamtib/lpj')->with('status','Data Berhasil Dihapus');
    }   
    public function edit_lpj($id){
        $lpj = \App\lpj_kamtib::find($id);
        return view('menu.kamtib.lpj.lpj_edit',compact('lpj'));
    }
    public function lihat_lpj($id){
        $lpj = \App\lpj_kamtib::find($id);
        return view('menu.kamtib.lpj.lpj_tampil',compact('lpj'));
    }
    public function update_lpj(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $lpj = \App\lpj_kamtib::find($id);
    	$this->validate($request,[
    		// 'no_laporan' => $lpj->no_laporan,
            // 'id_user' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'nama_petugas' => 'required',
            'jam_mulai' => 'required',
            'menit_mulai' => 'required',
            'jam_selesai' =>'required',
            'menit_selesai' => 'required',
            'deskripsi' => 'required',
    	]);
        $lpj->update($request->all());
        return redirect('/kamtib/lpj')->with('status','Data Berhasil Diperbarui');
    }

    //DPB
    public function store_dpb(Request $request){          
        date_default_timezone_set('Asia/Jakarta');
        $count = \App\dpb_kamtib::where('id_user','LIKE','%'.auth()->user()->id.'%')->count();         
        $dpb = \App\dpb_kamtib::create([            
            // 'no' => $count+1,            
            'id_user' => auth()->user()->id,     
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama_deteni' => $request->nama_deteni,
            'blok' => $request->blok,
            'jenis_pelanggaran' => $request->jenis_pelanggaran,
            'foto' => $request->foto,
            'kasus' => $request->kasus,
        ]);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('images/kamtib/dpb/',$filename);
            $dpb->foto = $request->file('foto')->getClientOriginalName();
            $dpb->save();
        }        
        return redirect('/kamtib/dpb')->with('status','Data Berhasil Ditambahkan');
    }
    public function hapus_dpb($id){
        $dpb = \App\dpb_kamtib::find($id);
        $dpb->delete($dpb);
        return redirect('/kamtib/dpb')->with('status','Data Berhasil Dihapus');
    }   
    public function edit_dpb($id){
        $dpb = \App\dpb_kamtib::find($id);
        return view('menu.kamtib.dpb.dpb_edit',compact('dpb'));
    }
    public function lihat_dpb($id){
        $dpb = \App\dpb_kamtib::find($id);
        return view('menu.kamtib.dpb.dpb_tampil',compact('dpb'));
    }
    public function update_dpb(Request $request,$id){        
        date_default_timezone_set('Asia/Jakarta');
        $dpb = \App\dpb_kamtib::find($id);
        if ($request->hasFile('foto')==null ) {
            if($dpb->foto != null){
                $this->validate($request,[                                   
                    'foto' => $dpb->foto,
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
            $request->file('foto')->move('images/kamtib/dpb/',$filename);
            $dpb->foto = $request->file('foto')->getClientOriginalName();
            $dpb->save();
        }        

        $data = [
            // 'no' => $dpb->no,       
            'tanggal' =>  $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama_deteni' => $request->nama_deteni,
            'blok' =>$request->blok,
            'jenis_pelanggaran' => $request->jenis_pelanggaran,
            'kasus' => $request->kasus,
        ];
        $dpb->update($data);        
        return redirect('/kamtib/dpb')->with('status','Data Berhasil Diperbarui');
    }

    //DTP
    public function store_dtp(Request $request){     
        date_default_timezone_set('Asia/Jakarta');
        $count = \App\dtp_kamtib::where('id_user','LIKE','%'.auth()->user()->id.'%')->count();           
        $dtp = \App\dtp_kamtib::create([            
            // 'no' => $count+1,            
            'id_user' => auth()->user()->id,     
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nama_petugas' => $request->nama_petugas,
            'tujuan' => $request->tujuan,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect('/kamtib/dtp')->with('status','Data Berhasil Ditambahkan');
    }
    public function hapus_dtp($id){
        $dtp = \App\dtp_kamtib::find($id);
        $dtp->delete($dtp);
        return redirect('/kamtib/dtp')->with('status','Data Berhasil Dihapus');
    }   
    public function edit_dtp($id){
        $dtp = \App\dtp_kamtib::find($id);
        return view('menu.kamtib.dtp.dtp_edit',compact('dtp'));
    }
    public function lihat_dtp($id){
        $dtp = \App\dtp_kamtib::find($id);
        return view('menu.kamtib.dtp.dtp_tampil',compact('dtp'));
    }
    public function update_dtp(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $dtp = \App\dtp_kamtib::find($id);        
    	$this->validate($request,[
    		// 'no' => $dtp->no,
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'nama_petugas' => 'required',
            'tujuan' => 'required',
            'deskripsi' => 'required',
    	]);
        $dtp->update($request->all());
        return redirect('/kamtib/dtp')->with('status','Data Berhasil Diperbarui');
    }

    //ADK   
    public function store_foto_adk(Request $request){     
        date_default_timezone_set('Asia/Jakarta');
        $count = \App\adk_kamtib::where('id_user','LIKE','%'.auth()->user()->id.'%')->count();           
        $a = array("B", "KB", "MB", "GB", "TB", "PB");
        $pos = 0;
        $size = filesize( $request->file('file'));
        while ($size >= 1024){
            $size /= 1024;
            $pos++;
        }
        $adk = \App\adk_kamtib::create([                 
            'id_user' => auth()->user()->id,     
            'nama' => $request->nama.'.'.$request->file('file')->getClientOriginalExtension(),
            'ukuran' => number_format($size,0) ." ".$a[$pos],
            'file' => $request->file,
            ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $request->nama.'.'.$request->file('file')->getClientOriginalExtension();
            $foldername = auth()->user()->username;
            $request->file('file')->move('files/kamtib/adk/',$filename);
            $adk->file = $request->file('file')->getClientOriginalExtension();
            $adk->save();
        }        
        
        return redirect('/kamtib/ad-k')->with('status','File Berhasil Ditambahkan');               
    }    
    public function hapus_adk(Request $request,$id){
        $adk = \App\adk_kamtib::find($id);
        $adk->delete($adk);
        return redirect('/kamtib/ad-k')->with('status','File Berhasil Dihapus');
    } 

    //Excel
    public function export_excel_lpj()
	{        
		return Excel::download(new lpjExport, 'LPJ_Kamtib.xlsx');
    }
    public function export_excel_dpb()
	{        
		return Excel::download(new dpbExport, 'DPB_Kamtib.xlsx');
    }
    public function export_excel_dtp()
	{        
		return Excel::download(new dtpExport, 'DTP_Kamtib.xlsx');
    }
     //===========CATATAN=================================================================
    public function catatan_admin($id){
        $lpj = \App\lpj_kamtib::find($id);
        return view('admin.catatan_admin',compact('lpj'));
    }    
    public function update_catatan(Request $request,$id){
        $lpj = \App\lpj_kamtib::find($id);        
        $data = [            
            'catatan' =>$request->catatan, 
        ];
        $lpj->update($data);
        return redirect('/home/'.$id.'/lihat')->with('status','Data Berhasil dibuat');
    }
}
