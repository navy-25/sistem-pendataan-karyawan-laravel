<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use Excel;
use Illuminate\Http\Request;
use App\Exports\dpExport;
use App\Exports\ddExport;
use App\Exports\dpmExport;

//qrcode
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

class RapController extends Controller
{
    public function index()
    {
        return view('menu.rap.index');
    }    
    public function dd(Request $request)
    {       
        if(auth()->user()->is_admin == 'tamu'){
            $dd = \App\dd_rap::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $dd = \App\dd_rap::where('nama_deteni','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);   
            }else{                        
                $dd = \App\dd_rap::
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
                orderBy('id', 'DESC')->get();
            }  
        }
        return view('menu.rap.dd',compact('dd'));
    }    
    public function lp(Request $request){
        if(auth()->user()->is_admin == 'tamu'){
            $lp = \App\riwayat_lapor::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $lp = \App\riwayat_lapor::where('tanggal','LIKE','%'.$request->cari.'%')
                ->orWhere('nama','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);   
            }else{                        
                $lp = \App\riwayat_lapor::orderBy('id', 'DESC')->get();
            }  
        } 
    
        return view('menu.rap.lp',compact('lp'));
    }   

    public function ad_rap(Request $request)
    {
        if(auth()->user()->is_admin == 'tamu'){
            $adrap = \App\ad_rap::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $adrap = \App\ad_rap::where('nama','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{                        
                $adrap = \App\ad_rap::
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
                orderBy('id', 'DESC')->get();
            }   
        }
        return view('menu.rap.ad-rap',compact('adrap'));
    }   
    public function dp(Request $request)
    {       
        if(auth()->user()->is_admin == 'tamu'){
            $dp = \App\dp_rap::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $dp = \App\dp_rap::where('nama_pengungsi','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{                        
                $dp = \App\dp_rap::
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
                orderBy('id', 'DESC')->get();
                
            }   
        }
        return view('menu.rap.dp',compact('dp'));
    }    
    public function dpm(Request $request)
    {      
        if(auth()->user()->is_admin == 'tamu'){
            $dp = \App\dpm_rap::orderBy('id', 'DESC')->get();
        }else{
            if($request->has('cari') ){
                $dp = \App\dpm_rap::where('nama_pengungsi','LIKE','%'.$request->cari.'%')
                // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{                        
                $dp = \App\dpm_rap::
                // where('id_user','LIKE','%'.auth()->user()->id.'%')
                orderBy('id', 'DESC')->get();
            }   
        }
        return view('menu.rap.dpm',compact('dp'));
    }   
    //========================================================================================================
    //exkport excel
    //DP
    public function to_excel_dp()
    {   
        $datas = \App\dp_rap::get();
        return view('menu.rap.dp.dp_rap_excel',compact('datas'));
    }
    public function export_excel_dp()
    {   
        $nama_file = 'DP_Rap'.'_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new dpExport, $nama_file);     
    }
   
    //DPM
    public function to_excel_dpm()
    {   
        $datas = \App\dpm_rap::get();
        return view('menu.rap.dpm.dpm_rap_excel',compact('datas'));
    }
    public function export_excel_dpm()
    {   
        $nama_file = 'DPM_Rap'.'_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new dpmExport, $nama_file);     
    }
    //========================================================================================================
    //eksport pdf
    //DP
    public function cetak_pdf_dp($id)
    {
    	$dp = \App\dp_rap::find($id);
 
        $pdf = PDF::loadview('menu.rap.dp.dp_cetak_kartu',compact('dp'));
    	return $pdf->download('kartu-dp-'.$dp->nama_pengungsi);
    }    
    //DPM
    public function cetak_pdf_dpm($id)
    {
    	$dpm = \App\dpm_rap::find($id);
 
        $pdf = PDF::loadview('menu.rap.dpm.dpm_cetak_kartu',compact('dpm'));
    	return $pdf->download('kartu-dpm-'.$dpm->nama_pengungsi);
    }    
    //========================================================================================================
    //DP
    public function store_dp(Request $request){  
        date_default_timezone_set('Asia/Jakarta');
        $dp = \App\dp_rap::create([            
            'id_user' => auth()->user()->id,  
            'nama_pengungsi' => $request->nama_pengungsi,
            'nomor_register' => '0', 
            'no_unchcr' =>  $request->no_unchcr,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal' => $request->tanggal,
            // 'bulan' => $request->bulan,
            'tahun_registrasi' => $request->tahun_registrasi,
            'tempat_penampungan' => $request->tempat_penampungan,
            'kamar' => $request->kamar,
            'kewarganegaraan' => $request->kewarganegaraan,
            'foto' => $request->foto,
            // 'barcode' => $request->barcode,
        ]);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->file('foto')->getClientOriginalName();
            $foldername = auth()->user()->username;
            $request->file('foto')->move('images/rap/dp/foto/',$filename);
            $dp->foto = $request->file('foto')->getClientOriginalName();
            $dp->save();
        }     
        
        $noUrut=$dp->id;
        $kode =  sprintf("%03s", $noUrut);    
        if($request->tempat_penampungan == 'Puspa Agro') {
            $kode2 = 'PA';
        }else if($request->tempat_penampungan == 'Green Bamboo') {
            $kode2 = 'GB';
        }
        //Qrcode
        $code_qr= $kode2."-".$kode;        
        $qrCode = new QrCode($code_qr);
        $qrCode->setSize(300);
        $qrCode->writeFile('../public/images/codeQR/'.$code_qr.'.png');
        //end qr code
        $data = [            
            'nomor_register' =>  $kode2."-".$kode, 
            'barcode' =>  $kode2."-".$kode.".png", 
        ];
        $dp->update($data);            
        return redirect('/rap/dp')->with('status','Data Berhasil Ditambahkan');
    }
    public function hapus_dp($id){
        $dp = \App\dp_rap::find($id);
        $dp->delete($dp);
        return redirect('/rap/dp')->with('status','Data Berhasil Dihapus');
    }   
    public function edit_dp($id){
        $dp = \App\dp_rap::find($id);
        return view('menu.rap.dp.dp_edit',compact('dp'));
    }
    public function update_dp(Request $request,$id){        
        date_default_timezone_set('Asia/Jakarta');
        $dp = \App\dp_rap::find($id);
        if ($request->hasFile('foto')==null ) {
                if($dp->foto == null){
                    $this->validate($request,[                                   
                        'foto' => '',
                    ]);   
                }else{
                    $this->validate($request,[                                   
                        'foto' => $dp->foto,
                    ]);   
                }
        }else if ($request->hasFile('foto')!=null ) {
                $this->validate($request,[                  
                    'foto' => 'required',
                ]);
        }
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->file('foto')->getClientOriginalName();
            $foldername = auth()->user()->username;
            $request->file('foto')->move('images/rap/dp/foto/',$filename);
            $dp->foto = $request->file('foto')->getClientOriginalName();
            $dp->save();
        }     
        $noUrut=$dp->id;
        $kode =  sprintf("%03s", $noUrut);    
        if($request->tempat_penampungan == 'Puspa Agro') {
            $kode2 = 'PA';
        }else if($request->tempat_penampungan == 'Green Bamboo') {
            $kode2 = 'GB';
        }
        $data = [            
            'id_user' => auth()->user()->id,  
            'nama_pengungsi' =>  $request->nama_pengungsi, 
            'nomor_register' => $kode2."-".$kode, 
            'no_unchcr' => $request->no_unchcr, 
            'jenis_kelamin' =>  $request->jenis_kelamin, 
            'tanggal' =>$request->tanggal, 
            // 'bulan' =>$request->bulan, 
            'tahun_registrasi' => $request->tahun_registrasi, 
            'tempat_penampungan' =>$request->tempat_penampungan, 
            'kamar' =>$request->kamar, 
            'kewarganegaraan' =>$request->kewarganegaraan, 
            'barcode' =>  $kode2."-".$kode.".png"
        ];
        //Qrcode
        $code_qr= $kode2."-".$kode;        
        $qrCode = new QrCode($code_qr);
        $qrCode->setSize(300);
        $qrCode->writeFile('../public/images/codeQR/'.$code_qr.'.png');
      
        $dp->update($data);        
        return redirect('/rap/dp')->with('status','Data Berhasil Diperbarui');
    }
    public function lihat_dp($id){
        $dp = \App\dp_rap::find($id);
        return view('menu.rap.dp.dp_tampil',compact('dp'));
    }
    //========================================================================================================
    //DD
    public function store_dd(Request $request){       
        date_default_timezone_set('Asia/Jakarta');         
        $dd = \App\dd_rap::create([            
            'id_user' => auth()->user()->id,  
            'nama_deteni' => $request->nama_deteni,
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'no_identitas' => $request->no_identitas, 
            'jenis_kelamin' => $request->jenis_kelamin,
            'blok' => $request->blok,
            'kewarganegaraan' => $request->kewarganegaraan,
            'jenis_pelanggaran' => $request->jenis_pelanggaran,
            'asal_kiriman' => $request->asal_kiriman,
            'foto' => $request->foto,
        ]);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->file('foto')->getClientOriginalName();
            $foldername = auth()->user()->username;
            $request->file('foto')->move('images/rap/dd/foto/',$filename);
            $dd->foto = $request->file('foto')->getClientOriginalName();
            $dd->save();
        }     
       
        return redirect('/rap/dd')->with('status','Data Berhasil Ditambahkan');
    }
    public function lihat_dd($id){
        $dd = \App\dd_rap::find($id);
        return view('menu.rap.dd.dd_tampil',compact('dd'));
    }
    public function hapus_dd($id){
        $dd = \App\dd_rap::find($id);
        $dd->delete($dd);
        return redirect('/rap/dd')->with('status','Data Berhasil Dihapus');
    }   
    public function edit_dd($id){
        $dd = \App\dd_rap::find($id);
        return view('menu.rap.dd.dd_edit',compact('dd'));
    }
    public function update_dd(Request $request,$id){       
        date_default_timezone_set('Asia/Jakarta'); 
        $dd = \App\dd_rap::find($id);
        if ($request->hasFile('foto')==null ) {
            if($dd->foto != null){
                $this->validate($request,[                                   
                    'foto' => $dd->foto,
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
            $request->file('foto')->move('images/rap/dd/foto/',$filename);
            $dd->foto = $request->file('foto')->getClientOriginalName();
            $dd->save();
        }           
      
        $data = [            
            'id_user' => auth()->user()->id,  
            'nama_deteni' =>  $request->nama_deteni, 
            'tanggal' =>$request->tanggal, 
            'bulan' =>$request->bulan, 
            'tahun' => $request->tahun, 
            'no_identitas' =>$request->no_identitas, 
            'jenis_kelamin' => $request->jenis_kelamin, 
            'blok' =>  $request->blok, 
            'kewarganegaraan' =>$request->kewarganegaraan, 
            'jenis_pelanggaran' =>  $request->jenis_pelanggaran, 
            'asal_kiriman' =>$request->asal_kiriman, 
        ];
        $dd->update($data);        
        return redirect('/rap/dd')->with('status','Data Berhasil Diperbarui');
    }
    //========================================================================================================
    //ADRAP
    public function store_foto_adrap(Request $request){     
        date_default_timezone_set('Asia/Jakarta');
        $a = array("B", "KB", "MB", "GB", "TB", "PB");
        $pos = 0;
        $size = filesize( $request->file('file'));
        while ($size >= 1024){
            $size /= 1024;
            $pos++;
        }
        $adrap = \App\ad_rap::create([            
            'id_user' => auth()->user()->id,     
            'nama' => $request->nama.'.'.$request->file('file')->getClientOriginalExtension(),
            'ukuran' => number_format($size,0) ." ".$a[$pos],
            'file' => $request->file,
            ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $request->nama.'.'.$request->file('file')->getClientOriginalExtension();
            $foldername = auth()->user()->username;
            $request->file('file')->move('files/rap/adrap',$filename);

            $adrap->file = $request->file('file')->getClientOriginalName();
            $adrap->save();
        }        
        
        return redirect('/rap/ad-rap')->with('status','File Berhasil Ditambahkan');               
    }    
    public function hapus_adrap($id){
        $adrap = \App\ad_rap::find($id);
        $adrap->delete($adrap);
        return redirect('/rap/ad-rap')->with('status','File Berhasil Dihapus');
    } 
   
    //========================================================================================================
    //DPM
    public function store_dpm(Request $request){    
        date_default_timezone_set('Asia/Jakarta');
        $dp = \App\dpm_rap::create([            
            'id_user' => auth()->user()->id,  
            'nama_pengungsi' => $request->nama_pengungsi,
            'nomor_register' => '0', 
            'no_unchcr' => $request->no_unchcr,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal' => $request->tanggal,
            'tahun_registrasi' => $request->tahun_registrasi,
            // 'bulan' => $request->bulan,
            // 'tahun' => $request->tahun,
            'alamat' => $request->alamat,
            'kewarganegaraan' => $request->kewarganegaraan,
            'foto' => $request->foto,
            'barcode' => $request->barcode,
        ]);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->file('foto')->getClientOriginalName();
            $foldername = auth()->user()->username;
            $request->file('foto')->move('images/rap/dpm/foto/',$filename);
            $dp->foto = $request->file('foto')->getClientOriginalName();
            $dp->save();
        }     
    
        $noUrut=$dp->id;
        $kode =  sprintf("%03s", $noUrut);           
        $kode2 = 'MAN';
        //Qrcode
        $code_qr= $kode2."-".$kode;        
        $qrCode = new QrCode($code_qr);
        $qrCode->setSize(300);
        $qrCode->writeFile('../public/images/codeQR/'.$code_qr.'.png');
        //end qr code
        $data = [            
            'nomor_register' =>  $kode2."-".$kode, 
            'barcode' =>  $kode2."-".$kode.".png", 
        ];     
        $dp->update($data);            
        return redirect('/rap/dpm')->with('status','Data Berhasil Ditambahkan');
    }
    public function hapus_dpm($id){
        $dp = \App\dpm_rap::find($id);
        $dp->delete($dp);
        return redirect('/rap/dpm')->with('status','Data Berhasil Dihapus');
    }   
    public function edit_dpm($id){
        $dp = \App\dpm_rap::find($id);
        return view('menu.rap.dpm.dpm_edit',compact('dp'));
    }
    public function update_dpm(Request $request,$id){       
        date_default_timezone_set('Asia/Jakarta'); 
        $dp = \App\dpm_rap::find($id);
        if ($request->hasFile('foto')==null ) {
            if($dp->foto == null){
                $this->validate($request,[                                   
                    'foto' => '',
                ]);   
            }else{
                $this->validate($request,[                                   
                    'foto' => $dp->foto,
                ]);   
            }
        }else if ($request->hasFile('foto')!=null ) {
            $this->validate($request,[                  
                'foto' => 'required',
            ]);
        }
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->file('foto')->getClientOriginalName();
            $foldername = auth()->user()->username;
            $request->file('foto')->move('images/rap/dpm/foto/',$filename);
            $dp->foto = $request->file('foto')->getClientOriginalName();
            $dp->save();
        }     
    
        $noUrut=$dp->id;
        $kode =  sprintf("%03s", $noUrut);    
        $kode2 = 'MAN';
        $data = [            
            'id_user' => auth()->user()->id,  
            'nama_pengungsi' =>  $request->nama_pengungsi, 
            'nomor_register' =>  $kode2."-".$kode, 
            'no_unchcr' => $request->no_unchcr, 
            'jenis_kelamin' =>  $request->jenis_kelamin, 
            'tanggal' =>$request->tanggal, 
            // 'bulan' =>$request->bulan, 
            // 'tahun' => $request->tahun, 
            'tahun_registrasi' => $request->tahun_registrasi,
            'alamat' =>$request->alamat, 
            'kewarganegaraan' =>$request->kewarganegaraan, 
            'barcode' =>  $kode2."-".$kode.".png", 
        ];
        //Qrcode
        $code_qr= $kode2."-".$kode;        
        $qrCode = new QrCode($code_qr);
        $qrCode->setSize(300);
        $qrCode->writeFile('../public/images/codeQR/'.$code_qr.'.png');
        //end qr code
        $dp->update($data);        
        return redirect('/rap/dpm')->with('status','Data Berhasil Diperbarui');
    }
    public function lihat_dpm($id){
        $dp = \App\dpm_rap::find($id);
        return view('menu.rap.dpm.dpm_tampil',compact('dp'));
    }
    //========================================================================================================
    //LP
    public function store_lp(Request $request){       
        date_default_timezone_set('Asia/Jakarta');    
        
        $this->validate($request, [
            'tanggal' =>  'required|max:50|unique:riwayat_lapor,tanggal',
        ]);   
        $riwayat_lapor = new \App\riwayat_lapor();
        $riwayat_lapor->tanggal = $request->tanggal;
        $riwayat_lapor->nama = $request->nama;
        $riwayat_lapor->id_user = auth()->user()->id;
        $riwayat_lapor->save();
    
        return redirect('/rap/lp')->with('status','Absensi Harian Dibuka');
    }   
    public function lihat_absensi(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');    
        $tanggal= mktime(date("m"),date("d"),date("Y"));
        $newTanggal = date("d-M-Y", $tanggal);

        $dp = \App\dp_rap::orderBy('id', 'DESC')->get();
        // $dp = \App\dp_rap::where('id_user','LIKE','%'.auth()->user()->id.'%')
        //     ->orderBy('id', 'DESC')->paginate(10);
        $lp = \App\lp_rap::where('tanggal','LIKE','%'.$newTanggal.'%')
            // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
            ->orderBy('id', 'DESC')->paginate(15);
        return view('menu.rap.lp.lp_tampil',compact('lp','dp'));
    }    
   
    public function store_absen(Request $request){       
        date_default_timezone_set('Asia/Jakarta');    
        $tanggal= mktime(date("m"),date("d"),date("Y"));
        $newTanggal = date("d-M-Y", $tanggal);
        $kalimat = $request->code;

        $kode_pengungsi =  substr($kalimat,0,3);
        // dd($kode_pengungsi);
        $kode =  substr($kalimat,4);
        // dd($kode);
        $kodeInt = (int)$kode;
        $this->validate($request, [
            'code' =>  'required',
        ]);   
        $lp = \App\dp_rap::all();
        $id_lp = count($lp);
        $count = \App\lp_rap::where('code','LIKE','%'.$request->code.'%')
        ->where('tanggal','LIKE','%'. $newTanggal.'%')->count();
        if($count > 0){
            return redirect('/rap/lp/'.$id_lp.'/lihat')->with('gagal','Pengungsi sudah Absen');
        }else{
            if($kode_pengungsi == 'PA-' || $kode_pengungsi == 'GB-'){
                $dp = \App\dp_rap::find($kodeInt);       
                $absen = new \App\lp_rap();
                $absen->tanggal = $newTanggal;
                $absen->nama_pengungsi = $dp->nama_pengungsi;
                $absen->id_user = auth()->user()->id;
                $absen->dp_rap_id = $kodeInt;
                $absen->lapor = "Sudah";
                $absen->status = "Pengungsi";
                $absen->code = $request->code;                
            }else{
                // dd($kodeInt);
                $dpm = \App\dpm_rap::find($kodeInt);       
                $absen = new \App\lp_rap();
                $absen->tanggal = $newTanggal;
                $absen->nama_pengungsi = $dpm->nama_pengungsi;
                $absen->id_user = auth()->user()->id;
                $absen->dpm_rap_id = $kodeInt;
                $absen->lapor = "Sudah";
                $absen->status = "Pengungsi Mandiri";
                $absen->code = $request->code;                
            }
            $absen->save();    
            return redirect('/rap/lp/'.$id_lp.'/lihat')->with('status','Absen Berhasil');
        }
    }
    public function hapus_absen($id){
        $lp = \App\lp_rap::all();
        $id_lp = count($lp);
        $lp = \App\lp_rap::find($id);
        $lp->delete($lp);
        return redirect('/rap/lp/'.$id_lp.'/lihat')->with('status','Absen Berhasil Dihapus');
    }   
    public function lihat_riwayat_absensi(Request $request,$id){
        date_default_timezone_set('Asia/Jakarta');
        $lp_Master = \App\riwayat_lapor::find($id);      
        $dp = \App\dp_rap::
            // where('id_user','LIKE','%'.auth()->user()->id.'%')
            orderBy('id', 'DESC')->get();
        $lp = \App\lp_rap::where('tanggal','LIKE','%'.$lp_Master->tanggal.'%')
            // ->where('id_user','LIKE','%'.auth()->user()->id.'%')
            ->orderBy('id', 'DESC')->get();
        return view('menu.rap.lp.lp_tampil_riwayat',compact('lp','dp','lp_Master'));
    } 
    //LP
    public function lihat_lp($id){
        $lp = \App\lp_rap::all();
        return view('menu.rap.lp.lp_tampil',compact('lp'));
    }
    public function cek_belum_absen(){
        date_default_timezone_set('Asia/Jakarta');
        $riwayat = \App\riwayat_lapor::all();
        $id_riwayat = count($riwayat);
        $riwayat_lapor = \App\riwayat_lapor::find($id_riwayat);
        $dp = \App\dp_rap::all();
        $dpm = \App\dpm_rap::all();
        // dd($riwayat);
        return view('menu.rap.lp.lp_belum_absen',compact('riwayat_lapor','dpm','dp'));
    }
    //========================================================================================================
}

