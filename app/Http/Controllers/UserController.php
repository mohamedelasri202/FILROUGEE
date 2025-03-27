<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ServiceRepositoryInterface;
use App\Repositories\ServicecartRepositoryInterface;
use App\Repositories\ShoopingcartRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;
    protected $productRepository;
    protected $serviceRepository;
    protected $ServicecartRepository;
    protected $shoopingcartRepository;
    public function __construct(UserRepositoryInterface $userRepository, ProductRepositoryInterface $productRepository, ServiceRepositoryInterface $serviceRepository, ServicecartRepositoryInterface $ServicecartRepository, ShoopingcartRepositoryInterface $shoopingcartRepository)
    {

        $this->ServicecartRepository = $ServicecartRepository;
        $this->shoopingcartRepository = $shoopingcartRepository;
        $this->userRepository = $userRepository;
        $this->serviceRepository = $serviceRepository;
        $this->productRepository = $productRepository;
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
            if ($user->status !== 'active') {
                // Redirect to custom status page if user is not active
                $status = DB::table('users')
                    ->where('id', $user->id)
                    ->value('status');

                return view('dashboard.status', compact('status'));
            }

            Auth::login($user);

            // Redirect based on role
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('dashboard.admin');
                case 'vendor':
                    return redirect()->route('dashboard.vendor');
                case 'service_provider':
                    return redirect()->route('dashboard.service_provider');
                case 'user':
                default:
                    return redirect()->route('home');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }


    // Logout function
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('home')->with('success', 'You have been logged out.');
    }
}
