<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Petugas;
// use App\Models\Penumpang;
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
    
        if ($cek = Petugas::where('username',$request->username)->first()) {
            if(Hash::check($request->username, $cek->password)){
                Session::put('user', $cek);
                Session::put('isLogin', true);
                return redirect()->intended('dashboard')
                            ->withSuccess('Signed in');
            }
        }
        // else if ($cek = Penumpang::where('username',$request->username)->first()) {
        //     if(Hash::check($request->username, $cek->password)){
        //         return redirect()->intended('dashboard')
        //                     ->withSuccess('Signed in');
        //     }
        // }
        return redirect("login")->withSuccess('Login details are not valid');
    }
 
 
 
    public function registration()
    {
        return view('auth.registration');
    }
       
 
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
            'level' => 'required',
        ]);
            
        $data = $request->all();
        $check = $this->create($data);
          
        return redirect("dashboard");
    }
 
 
    public function create(array $data)
    {
      return Petugas::create([
        'nama_petugas' => $data['nama_petugas'],
        'username' => $data['username'],
        'password' => Hash::make($data['password']),
        'id_level' => $data['level']
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
