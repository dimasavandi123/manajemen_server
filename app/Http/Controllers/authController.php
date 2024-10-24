<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        Session::flash('email',$request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);
        
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            $user = Auth::user();
            $userName = $user->name;
            return redirect('/dashboard')->with('success', "Selamat Datang anda Berhasil Login");
        }else{
            return redirect('login-page')->withErrors('Masukan Username Dan Password Yang Valid');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $request){
        Session::flash('email',$request->input('name'));
        Session::flash('email',$request->input('email'));
        Session::flash('username',$request->input('username'));
        $request->validate([
            'name' => 'required|min:5|max:50',
            'username' => 'required|min:5|max:10|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:50|',
        ],[
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama harus berkarakter 5 huruf',
            'name.max' => 'Nama melebihi batas maximal',
            'username.unique' => 'Username sudah ada, silahkan masukan username yang lain',
            'username.min' => 'Username harus berkarakter 5 huruf',
            'username.max' => 'Username melebihi batas maximal',
            'username.required' => 'Username Wajib Diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Masukan email yang valid',
            'email.unique' => 'Email sudah ada, silahkan masukan email yang lain',
            'password.min' => 'Password harus berkarakter 8 huruf',
            'password.max' => 'Password melebihi batas maximal',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($data);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('login-page')->with('success','Selamat Berhasil Membuat Akun');
        }else{
            return redirect('register-page')->withErrors('Data Tidak Boleh Kosong');
        }
    }

    public function logout()
    {
        
        Auth::logout();
        return redirect('login-page')->with('success','Berhasil Logout');
        
    }
    

    
}
