@extends('layouts.app')

@section('title', ' | Login')

@section('content')
<div class="login-container">
    <div class="brand-logo">
        <h1>Inventory<span>Manager</span></h1>
    </div>
    <div class="login-form">
        <h2>Sign In</h2>
        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text" id="emailIcon"><i class="bi bi-envelope-fill"></i></span>
                    <div class="form-floating flex-grow-1">
                        <input type="email" class="form-control" id="email" name="email" 
                            placeholder="name@example.com" required autofocus>
                        <label for="email">Email address</label>
                    </div>
                </div>
                <div class="invalid-feedback" id="emailFeedback">
                    Please enter a valid email address.
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text" id="passwordIcon"><i class="bi bi-lock-fill"></i></span>
                    <div class="form-floating flex-grow-1">
                        <input type="password" class="form-control" id="password" name="password" 
                            placeholder="Password" required disabled>
                        <label for="password">Password</label>
                    </div>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label remember-me" for="remember">Remember me</label>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
            </button>
        </form>
        
        <div class="login-footer">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"><i class="bi bi-key me-1"></i>Forgot your password?</a>
            @endif
            
            @if (Route::has('register'))
                <p class="mt-2">Don't have an account? <a href="{{ route('register') }}"><i class="bi bi-person-plus-fill me-1"></i>Sign Up</a></p>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        padding: 0;
    }
    
    .container {
        max-width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .navbar, .footer {
        display: none;
    }
    
    .login-container {
        width: 100%;
        max-width: 450px;
    }
</style>
@endpush