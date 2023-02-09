<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Petugas;
use App\Models\Penumpang;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }  
       
 
    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        if ($cek = Penumpang::where('username',$request->username)->first()) {
            // dd(Hash::check($request->password, $cek->password));
            if(Hash::check($request->password, $cek->password)){
                Session::put('user', $cek);
                Session::put('level', "penumpang");
                Session::put('isLogin', true);
                return redirect()->intended('dashboard')
                            ->withSuccess('Signed in');
            }
        }elseif ($cek = Petugas::where('username',$request->username)->first()) {
            if(Hash::check($request->password, $cek->password)){
                Session::put('user', $cek);
                if($cek->id_level == 0){
                    Session::put('level', "admin");
                }else{
                    Session::put('level', "petugas");
                }
                Session::put('isLogin', true);
                return redirect()->intended('dashboard')
                            ->withSuccess('Signed in');
            }
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }
 
 
 
    public function registration()
    {
        return view('auth.registration');
    }
       
 
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'nama_penumpang' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
            
        $data = $request->all();
        $check = $this->create($data);
          
        return redirect("dashboard");
    }
 
 
    public function create(array $data)
    {
      return Penumpang::create([
        'nama_penumpang' => $data['nama_penumpang'],
        'alamat' => $data['alamat'],
        'jenis_kelamin' => $data['jenis_kelamin'],
        'telepon' => $data['telepon'],
        'tanggal_lahir' => $data['tanggal_lahir'],
        'username' => $data['username'],
        'password' => Hash::make($data['password']),
      ]); 
    }    
     
 
    public function dashboard()
    {
        if(Session::has('isLogin')){
			return view('dashboard');
		}else{
			return redirect("login")->withSuccess('are not allowed to access');
		}
          
    }
     
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}
