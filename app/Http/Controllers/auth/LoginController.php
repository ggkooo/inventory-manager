<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Validation\LoginValidationService;

class LoginController extends Controller
{
    /**
     * @var LoginValidationService
     */
    protected $validationService;

    public function __construct(LoginValidationService $validationService)
    {
        $this->validationService = $validationService;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validated = $this->validationService->validate($request->all());
        
        if (User::authenticateUser($validated)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }
        
        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
