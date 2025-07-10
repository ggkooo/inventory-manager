@extends('layouts.app')

@section('title', ' | Forgot Password')

@section('content')
<div class="login-container">
    <div class="brand-logo">
        <h1>Inventory<span>Manager</span></h1>
    </div>
    <div class="login-form">
        <h2>Forgot Password</h2>
        
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text" id="emailIcon"><i class="bi bi-envelope-fill"></i></span>
                    <div class="form-floating flex-grow-1">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" 
                            placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
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
            
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-envelope-at me-2"></i>Send Reset Link
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