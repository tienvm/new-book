<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');

    }

    public function postRegister()
    {
        $rawData = request()->input();

        $password = bcrypt($rawData['password']);

//        DB::enableQueryLog();
        $email = DB::table('users')->select('*')->where('email', $rawData['email'])->first();
//        dd(DB::getQueryLog());
//        dd($email);

        if($rawData['password'] != $rawData['re-password']){
            dd('password not match');
        }

        if($email){
            dd('Email exist');
        }

        $sql = DB::table('users')->insert([
            'name' => $rawData['first-name'].$rawData['last-name'],
            'email' => $rawData['email'],
            'password' => $password,
            'phone' => $rawData['phone']
        ]);

        dd('Dang ky thanh cong');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin()
    {
        $rawData = request()->input();
        $user = DB::table('users')->select('*')->where('email', $rawData['email'])->first();

        if( ! $user){
            dd('email not exist sys');
        }

        $isLoginSuccess = Hash::check($rawData['password'], $user->password);

        if($isLoginSuccess){

            session(['user' => $user]);
            return redirect('/profile');
        }



        dd('dang nhap that bai');
    }


    public function profile()
    {
        if( ! session('user')){
            return redirect('/login');
        }

        dd('day la profile cua toi');
    }
}
