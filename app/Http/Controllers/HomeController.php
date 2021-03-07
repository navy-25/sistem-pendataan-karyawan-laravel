<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(auth()->user()->is_admin == 'admin'){
            if($request->has('cari') ){
                $lpj = \App\lpj_kamtib::where('nama_petugas','LIKE','%'.$request->cari.'%')
                ->orderBy('id', 'DESC');
            }else{                        
                $lpj = \App\lpj_kamtib::orderBy('id', 'DESC')->get();
            }   
            return view('home',compact('lpj'));
        }else{
            return view('home');
        }
    }    
    public function change()
    {
        Auth::logout();
        return redirect('/');
    }    
    public function error()
    {
        return view('error');
    }
    public function barcode()
    {
        return view('barcode');
    }
}
