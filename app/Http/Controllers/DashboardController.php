<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function homepage()
    {
        $user = auth()->user();
        if ($user === null){
            $user = 'Guest';
        }
        return view('front.homepage',[
            'user' => $user
        ]);
    }
    public function biolink()
    {
        return view('dashboard.biolink.index');
    }
    public function analytics()
    {
        return view('dashboard.analytics.index');
    }
    public function articles()
    {
        return view('dashboard.articles.index');
    }
    public function profile()
    {
        
    }
    public function index()
    {
        return view('dashboard.homepage');
    }
    public function auth(Request $request)
    {
        if($request->password !== $request->confirm_password){
            return redirect('/login')->with('error','Password not match');
        }
        $request->validate([
            'user' => 'required|string',
            'password' => 'required|string',
        ]);
        $loginType = filter_var($request->user, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginType => $request->user,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Welcome to dashboard, '.auth()->user()->name);
        }
        
        return back()->with('loginError', 'Hubungi admin jika ada kendala login!');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:20|string',
            'username' => 'required|max:20|unique:users|string',
            'email' => 'required|email|string',
            'password' => 'required|max:255|string',
            'confirm_password' => 'required|max:255|string',
        ]);
        
        if ($validatedData['password'] !== $validatedData['confirm_password']){
            return redirect('/register')->with('error','Password not match');
        }
        try {
            $hashedPassword = bcrypt($validatedData['password']);
            $hashedConfirmation = bcrypt($validatedData['confirm_password']);
            $validatedData['created_at'] = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
            $validatedData['updated_at'] = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
            $validatedData['password'] = $hashedPassword;
            $validatedData['confirm_password'] = $hashedConfirmation;
            User::create($validatedData);
            return redirect('/login')->with('success','Registration Success, please login!');
        } catch (\Exception $e){
            return response()->json(['message' => 'not success', 'error' => $e->getMessage()], 500);
        }
    }
    public function login()
    {
        return view('front.login');
    }
    public function register()
    {
        return view('front.register');
    }
    public function features()
    {
        return view('front.features');
    }
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
