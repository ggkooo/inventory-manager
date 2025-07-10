<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\Validation\RegisterValidationService;

class RegisterController extends Controller
{
    /**
     * @var RegisterValidationService
     */
    protected $validationService;

    public function __construct(RegisterValidationService $validationService)
    {
        $this->validationService = $validationService;
    }

    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $this->validationService->validate($request->all());
        $user = User::createUser($validated);

        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Cadastro realizado com sucesso! Bem-vindo ao Sistema de Inventário.');
    }
}
