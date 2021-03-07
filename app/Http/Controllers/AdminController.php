<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function akun()
    {
        $data_user = \App\User::find(auth()->user()->id);      
        return view('admin.akun',compact('data_user'));
    }   
    public function ganti_foto()
    {
        $data_user = \App\User::find(auth()->user()->id);      
        return view('admin.akun_edit',compact('data_user'));
    }   
    public function store_foto(Request $request){             
        $user = \App\User::find(auth()->user()->id);     
        $this->validate($request,[    		
            'foto' => 'required',
        ]);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->file('foto')->getClientOriginalName();
            $foldername = auth()->user()->username;
            $request->file('foto')->move('images/foto_profil/',$filename);
            $user->foto = $request->file('foto')->getClientOriginalName();
            $user->save();
        }        
        return redirect('/akun');
    }
    public function users(Request $request)
    {        
        if(auth()->user()->is_admin == 'admin'){
            if($request->has('cari') ){
                $data_user = \App\User::where('name','LIKE','%'.$request->cari.'%')
                ->where('is_admin','LIKE','%'."user".'%')->orWhere('is_admin','LIKE','%'."tamu".'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{                        
                $data_user = \App\User::where('is_admin','LIKE','%'."user".'%')->orWhere('is_admin','LIKE','%'."tamu".'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }   
        }else if(auth()->user()->is_admin == 'user'){
            if($request->has('cari') ){
                $data_user = \App\User::where('name','LIKE','%'.$request->cari.'%')
                ->where('is_admin','LIKE','%'."tamu".'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }else{                        
                $data_user = \App\User::where('is_admin','LIKE','%'."tamu".'%')
                ->orderBy('id', 'DESC')->paginate(10);
            }   
        }
        return view('admin.users',compact('data_user'));
    }   
    //GANTI PASSWORD
    public function gantiPass(){       
        return view('admin.akun_password');
    }      
    public function ganti_password(Request $request){             
         // update password
         $user = \App\User::find(auth()->user()->id);
 
         $user->password = bcrypt(request('password'));
         $user->save();
  
        return redirect('/akun')->with('status','Password berhasil diperbarui');
    }

    //EDIT DATA AKUN
    public function akun_edit(){       
        $data_user = \App\User::find(auth()->user()->id);      
        return view('admin.akun_edit',compact('data_user'));
    }   
    public function destroy($id){
        $user = \App\User::findOrFail($id);
        $user->delete($user);
        return redirect('/users')->with('status','Data Berhasil Dihapus');
    }   

    //TAMBAH AKUN
    public function users_tambah(){       
        $data_user = \App\User::all();      
        return view('admin.users_tambah',compact('data_user'));
    }   
    public function store_users(Request $request){       
        $users = \App\User::create([            
            'name'  => $request->name,    
            'username' => $request->username,    
            'jabatan'  => $request->jabatan,
            'password' => Hash::make($request->password),
            'is_admin' =>  $request->is_admin,    
        ]);
        return redirect('/users')->with('status','Data Berhasil Ditambahkan');
    }
    public function edit_users($id){
        $users = \App\User::find($id);
        return view('admin.users_edit',compact('users'));
    }
 
    public function update_users(Request $request,$id){
        $users = \App\User::find($id);
    	$this->validate($request,[
            'name' => 'required',
            'username' => 'required',
            'jabatan' => 'required',
            'password' => Hash::make($request->password),
            'is_admin' => 'required',
    	]);
        $users->update($request->all());
        return redirect('/users')->with('status','Data Berhasil Diperbarui');
    }
   
}
