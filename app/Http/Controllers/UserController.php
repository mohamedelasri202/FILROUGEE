<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function showRegistrationForm()
    {
        return view('register');
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,user,vendor,service_provider',
        ]);

        $this->userRepository->register($validated);

        return redirect()->route('login')->with('success', 'User registered successfully!');
    }


    public function showUserDashboard()
    {
        return view('home')->with('user', Auth::user());
    }



    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            Auth::login($user);

            $role = $user->role;

            if ($role === 'admin') {
                return redirect()->route('dashboard.admin')->with('success', 'Admin logged in!');
            } elseif ($role === 'user') {
                return redirect()->route('home')->with('success', 'User logged in!');
            } elseif ($role === 'vendor') {
                return redirect()->route('dashboard.vendor')->with('success', 'Vendor logged in!');
            } elseif ($role === 'service_provider') {
                return redirect()->route('dashboard.service_provider')->with('success', 'Service provider logged in!');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials.']); // Handle invalid login
    }

    // Logout function
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('welcome')->with('success', 'You have been logged out.');
    }


    // showing the website 

}
