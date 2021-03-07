<?php
//Route::get('admin/routes', 'HomeController@index')->middleware('admin');

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/cetak', function () {
    return view('menu.rap.dp.dp_cetak_kartu');
});
Route::get('/test', 'TestController@index');


Auth::routes();
Route::get('/error', 'HomeController@error');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/change', 'HomeController@change')->name('change');
Route::get('/akun', 'AdminController@akun')->name('akun');
Route::get('/akun/{id}/destroy', 'AdminController@destroy')->name('destroy');
Route::get('/ganti_foto', 'AdminController@ganti_foto')->name('ganti_foto');
Route::post('/akun/store_foto', 'AdminController@store_foto')->name('store_foto');
Route::post('/akun/ganti_password', 'AdminController@ganti_password')->name('ganti_password');
Route::get('/akun/gantiPass', 'AdminController@gantiPass')->name('gantiPass');
Route::post('/akun/perbarui_akun', 'AdminController@perbarui_akun')->name('perbarui_akun');
Route::get('/akun/akun_edit', 'AdminController@akun_edit')->name('akun_edit');
//barcode
Route::get('barcode', 'HomeController@barcode');

Route::group(['middleware'=>['auth','admin:admin']],function(){
    Route::get('/home/{id}/catatan_admin', 'KamtibController@catatan_admin');
    Route::post('/home/{id}/catatan_admin/update_catatan', 'KamtibController@update_catatan');
    Route::get('/home/{id}/lihat','KamtibController@lihat_lpj');
});
//user % Tamu
Route::group(['middleware'=>['auth','admin:admin,user,tamu']],function(){
    Route::get('/kamtib/lpj/{id}/lihat','KamtibController@lihat_lpj');
});

Route::group(['middleware'=>['auth','admin:user,tamu']],function(){
    //lp
    Route::get('/rap/lp/{id}/lihat_riwayat','RapController@lihat_riwayat_absensi');
    //rap
    Route::get('/rap', 'RapController@index')->name('rap');
    Route::get('/rap/dp', 'RapController@dp')->name('dp');
    Route::get('/rap/dpm', 'RapController@dpm')->name('dpm');
    Route::get('/rap/lp', 'RapController@lp')->name('lp');
    Route::get('/rap/ad-rap', 'RapController@ad_rap')->name('ad-rap');
    Route::get('/rap/dp/{id}/lihat','RapController@lihat_dp');
    Route::get('/rap/lp/{id}/lihat','RapController@lihat_lp');
    Route::get('/rap/dpm/{id}/lihat','RapController@lihat_dpm');   
});

//user
Route::group(['middleware'=>['auth','admin:user']],function(){
    //KAMTIB
    Route::get('/kamtib', 'KamtibController@index')->name('kamtib');
    //LPJ
    Route::get('/kamtib/lpj', 'KamtibController@lpj')->name('lpj');
    Route::post('/kamtib/store_lpj','KamtibController@store_lpj')->name('store_lpj');
    Route::get('/kamtib/lpj/{id}/hapus','KamtibController@hapus_lpj');
    Route::get('/kamtib/lpj/{id}/edit','KamtibController@edit_lpj');    
    Route::post('/kamtib/lpj/{id}/update','KamtibController@update_lpj');
    Route::get('/kamtib/export_excel_lpj', 'KamtibController@export_excel_lpj')->name('export_excel_lpj');
    //DPB
    Route::get('/kamtib/dpb', 'KamtibController@dpb')->name('dpb');
    Route::post('/kamtib/store_dpb','KamtibController@store_dpb')->name('store_dpb');
    Route::get('/kamtib/dpb/{id}/lihat','KamtibController@lihat_dpb');
    Route::get('/kamtib/dpb/{id}/hapus','KamtibController@hapus_dpb');
    Route::get('/kamtib/dpb/{id}/edit','KamtibController@edit_dpb');
    Route::post('/kamtib/dpb/{id}/update','KamtibController@update_dpb');
    Route::get('/kamtib/export_excel_dpb', 'KamtibController@export_excel_dpb')->name('export_excel_dpb');
    //DTP
    Route::get('/kamtib/dtp', 'KamtibController@dtp')->name('dtp');
    Route::post('/kamtib/store_dtp','KamtibController@store_dtp')->name('store_dtp');
    Route::get('/kamtib/dtp/{id}/lihat','KamtibController@lihat_dtp');
    Route::get('/kamtib/dtp/{id}/hapus','KamtibController@hapus_dtp');
    Route::get('/kamtib/dtp/{id}/edit','KamtibController@edit_dtp');    
    Route::post('/kamtib/dtp/{id}/update','KamtibController@update_dtp');
    Route::get('/kamtib/export_excel_dtp', 'KamtibController@export_excel_dtp')->name('export_excel_dtp');
    //ADK
    Route::get('/kamtib/ad-k', 'KamtibController@ad_k')->name('ad-k');
    Route::post('/kamtib/store_foto_adk','KamtibController@store_foto_adk')->name('store_foto_adk');
    Route::get('/kamtib/adk/{id}/hapus','KamtibController@hapus_adk');
    //PERKES
    Route::get('/perkes', 'PerkesController@index')->name('perkes');
    //KD
    Route::post('/perkes/store_kd','PerkesController@store_kd')->name('store_kd');
    Route::get('/perkes/kd/{id}/hapus','PerkesController@hapus_kd');
    Route::post('/perkes/kd/{id}/update','PerkesController@update_kd');
    Route::get('/perkes/kd/{id}/edit','PerkesController@edit_kd'); 
    Route::get('/perkes/kd/{id}/lihat','PerkesController@lihat_kd');
    Route::get('/perkes/kd', 'PerkesController@kd')->name('kd');
    Route::get('/perkes/kd/export_excel_kd', 'PerkesController@export_excel_kd')->name('export_excel_kd');
    Route::get('/perkes/kd/to_excel_kd','PerkesController@to_excel_kd')->name('to_excel_kd');      
    //KO
    Route::post('/perkes/store_ko','PerkesController@store_ko')->name('store_ko');
    Route::post('/perkes/update_ko','PerkesController@update_ko')->name('update_ko');
    Route::post('/perkes/store_ko-out','PerkesController@store_ko_out')->name('store_ko_out');
    Route::get('/perkes/ko/{id}/hapus','PerkesController@hapus_ko');
    Route::get('/perkes/ko_out/{id}/hapus','PerkesController@hapus_ko_out');
    Route::get('/perkes/ko/export_excel_ko', 'PerkesController@export_excel_ko')->name('export_excel_ko');
    Route::get('/perkes/ko/to_excel_ko','PerkesController@to_excel_ko')->name('to_excel_ko');   
    Route::get('/perkes/ko_out/export_excel_ko', 'PerkesController@export_excel_ko_out')->name('export_excel_ko_out');
    Route::get('/perkes/ko_out/to_excel_ko','PerkesController@to_excel_ko_out')->name('to_excel_ko_out');   
    Route::get('/perkes/ko', 'PerkesController@ko')->name('ko');
    Route::get('/perkes/ko-out', 'PerkesController@ko_out')->name('ko_out');
    //ADP
    Route::post('/perkes/store_foto_adp','PerkesController@store_foto_adp')->name('store_foto_adp');
    Route::get('/perkes/ad-p', 'PerkesController@ad_p')->name('ad-p');
    Route::get('/perkes/adp/{id}/hapus','PerkesController@hapus_adp');
    //RAP
    //DP
    Route::post('/rap/store_dp','RapController@store_dp')->name('store_dp');
    Route::get('/rap/dp/{id}/hapus','RapController@hapus_dp');
    Route::post('/rap/dp/{id}/update','RapController@update_dp');
    Route::get('/rap/dp/{id}/edit','RapController@edit_dp');    
    Route::get('/rap/dp/export_excel_dp', 'RapController@export_excel_dp')->name('export_excel_dp');
    Route::get('/rap/dpto_excel_dp','RapController@to_excel_dp')->name('to_excel_dp');
    Route::get('/rap/dp/{id}/cetak_pdf', 'RapController@cetak_pdf_dp');
    //DD
    Route::post('/rap/store_dd','RapController@store_dd')->name('store_dd');
    Route::get('/rap/dd/{id}/hapus','RapController@hapus_dd');    
    Route::get('/rap/dd/{id}/edit','RapController@edit_dd');
    Route::post('/rap/dd/{id}/update','RapController@update_dd');
    Route::get('/rap/dd/{id}/lihat','RapController@lihat_dd');
    Route::get('/rap/dd', 'RapController@dd')->name('dd');
    Route::get('/rap/dd/export_excel_dd', 'RapController@export_excel_dd');
    //ADRAP
    Route::post('/rap/store_foto_adrap','RapController@store_foto_adrap')->name('store_foto_adrap');
    Route::get('/rap/adrap/{id}/hapus','RapController@hapus_adrap');
    //LP    
    Route::post('/rap/store_lp','RapController@store_lp')->name('store_lp');
    Route::post('/rap/store_absen','RapController@store_absen')->name('store_absen');
    Route::get('/rap/lp/{id}/lihat','RapController@lihat_absensi');
    Route::get('/rap/lp/{id}/hapus','RapController@hapus_absen');    
    
    Route::get('/rap/lp/lihat/belum_absensi','RapController@cek_belum_absen')->name('belum_absen');
    //DPM
    Route::get('/rap/dpm/export_excel_dpm', 'RapController@export_excel_dpm');
    Route::post('/rap/store_dpm','RapController@store_dpm')->name('store_dpm');
    Route::get('/rap/dpm/{id}/hapus','RapController@hapus_dpm');
    Route::post('/rap/dpm/{id}/update','RapController@update_dpm');
    Route::get('/rap/dpm/{id}/edit','RapController@edit_dpm');  
    Route::get('/rap/dpm/export_excel_dpm', 'RapController@export_excel_dpm')->name('export_excel_dpm');
    Route::get('/rap/dpm/to_excel_dpm','RapController@to_excel_dpm')->name('to_excel_dpm');   
    Route::get('/rap/dpm/{id}/cetak_pdf', 'RapController@cetak_pdf_dpm');
    
    //PIMPINAN
    Route::get('/pimpinan', 'PimpinanController@index')->name('pimpinan');
    Route::get('/pimpinan/ptk', 'PimpinanController@ptk')->name('ptk');
    //TK
    Route::get('/pimpinan/tk', 'PimpinanController@tk')->name('tk');
    Route::post('/pimpinan/store_tk','PimpinanController@store_tk')->name('store_tk');
    Route::get('/pimpinan/tk/{id}/hapus','PimpinanController@hapus_tk');
    Route::get('/pimpinan/tk/{id}/lihat','PimpinanController@lihat_tk');  
    Route::get('/pimpinan/tk/{id}/edit','PimpinanController@edit_tk');
    Route::post('/pimpinan/tk/{id}/update','PimpinanController@update_tk');      
    Route::get('/pimpinan/export_excel_tk', 'PimpinanController@export_excel_tk')->name('export_excel_tk');     
    //PTK
    Route::post('/pimpinan/store_ptk','PimpinanController@store_ptk')->name('store_ptk');
    Route::get('/pimpinan/ptk/{id}/lihat','PimpinanController@lihat_ptk');
    Route::get('/pimpinan/ptk/{id}/edit','PimpinanController@edit_ptk');
    Route::post('/pimpinan/ptk/{id}/update','PimpinanController@update_ptk');    
    Route::get('/pimpinan/ptk/{id}/hapus','PimpinanController@hapus_ptk');    
    //PWS
    Route::get('/pimpinan/pws', 'PimpinanController@pws')->name('pws');
    Route::post('/pimpinan/store_pws','PimpinanController@store_pws')->name('store_pws');
    Route::get('/pimpinan/pws/{id}/lihat','PimpinanController@lihat_pws');
    Route::get('/pimpinan/pws/{id}/edit','PimpinanController@edit_pws');
    Route::post('/pimpinan/pws/{id}/update','PimpinanController@update_pws');    
    Route::get('/pimpinan/pws/{id}/hapus','PimpinanController@hapus_pws');    
});
//admin % User
Route::group(['middleware'=>['auth','admin:admin,user']],function(){
    Route::get('/users', 'AdminController@users')->name('users');
    Route::post('/users/store_users', 'AdminController@store_users')->name('store_users');
    Route::get('/users/{id}/edit', 'AdminController@edit_users');
    Route::post('/users/{id}/update', 'AdminController@update_users');
});