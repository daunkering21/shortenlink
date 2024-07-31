<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
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
        $username = $this->username();
        return view('dashboard.biolink.index',[
            'username' => $username
        ]);
    }
    public function analytics()
    {
        $username = $this->username();
        return view('dashboard.analytics.index',[
            'username' => $username
        ]);
    }
    public function articles()
    {
        $username = $this->username();
        return view('dashboard.articles.index',[
            'username' => $username
        ]);
    }
    public function profile()
    {
        $user = auth()->user();
        return view('dashboard.profile.index',[
            'user' => $user
        ]);
    }
    public function index()
    {
        $username = $this->username();
        return view('dashboard.homepage',[
            'username' => $username
        ]);
    }
    private function username()
    {
        $user = auth()->user()->username;
        return $user;
    }
    public function auth(Request $request)
    {
        $ipAddress = request()->ip();
        try {
            $request->validate([
                'user' => 'required|string',
                'password' => 'required|string',
            ]);

            $loginType = filter_var($request->user, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            $credentials = [
                $loginType => $request->user,
                'password' => $request->password,
            ];
            $data = [
                'username' => $request['user'],
                'ip' => $ipAddress
            ];
            
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                LoginHistory::create($data);
                return redirect()->intended('/dashboard')->with('success', 'Welcome to dashboard, ' . auth()->user()->name);
            } else {
                return redirect('/login')->with('error', 'Wrong username/password');
            }

        } catch (\Exception $e) {
            return back()->with('error', 'Oops! You may report this error to lovidea-support@lovilink.com');
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:20|string',
            'username' => 'required|max:20|string',
            'email' => 'email|string',
            'password' => 'required|max:255|string',
            'confirm_password' => 'required|max:255|string',
        ]);

        if ($validatedData['password'] !== $validatedData['confirm_password']) {
            return redirect('/register')->with('error', 'Password not match');
        }

        try {
            if (User::where('username', $validatedData['username'])->exists() || User::where('email', $validatedData['email'])->exists()) {
                return redirect('/register')->with('error', 'Username or email already registered, please choose another username or email');
            }

            $hashedPassword = bcrypt($validatedData['password']);
            $hashedConfirmation = bcrypt($validatedData['confirm_password']);
            $validatedData['password'] = $hashedPassword;
            $validatedData['confirm_password'] = $hashedConfirmation; 

            $validatedData['created_at'] = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');
            $validatedData['updated_at'] = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');

            User::create($validatedData);

            return redirect('/login')->with('success', 'Registration Success, please login!');
        } catch (\Exception $e) {
            return back()->with('error', 'Oops! You may report this error to lovidea-support@lovilink.com');
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
    public function feedback()
    {
        return view('front.feedback');
    }
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
