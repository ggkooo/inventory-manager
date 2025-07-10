@extends('layouts.app')

@section('title', ' | Reset Password')

@section('content')
<div class="login-container">
    <div class="brand-logo">
        <h1>Inventory<span>Manager</span></h1>
    </div>
    <div class="login-form">
        <h2>Reset Password</h2>
        
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text" id="emailIcon"><i class="bi bi-envelope-fill"></i></span>
                    <div class="form-floating flex-grow-1">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" 
                            placeholder="name@example.com" value="{{ $email ?? old('email') }}" required autofocus>
                        <label for="email">Email address</label>
                    </div>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text" id="passwordIcon"><i class="bi bi-lock-fill"></i></span>
                    <div class="form-floating flex-grow-1">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" 
                            placeholder="Password" required>
                        <label for="password">New Password</label>
                    </div>
                </div>
                <div class="invalid-feedback" id="passwordFeedback">
                    Password must contain at least 8 characters, including uppercase, lowercase, and numbers.
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text" id="confirmIcon"><i class="bi bi-shield-lock-fill"></i></span>
                    <div class="form-floating flex-grow-1">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" 
                            placeholder="Confirm Password" required>
                        <label for="password_confirmation">Confirm New Password</label>
                    </div>
                </div>
                <div class="invalid-feedback" id="passwordConfirmFeedback">
                    Passwords do not match.
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-key-fill me-2"></i>Reset Password
            </button>
        </form>
        
        <div class="login-footer">
            <p class="mt-2">Remember your password? <a href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-1"></i>Back to Login</a></p>
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