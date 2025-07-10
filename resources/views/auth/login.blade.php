<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Inventory Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- CSS Modularizado -->
    <link rel="stylesheet" href="{{ asset('assets/css/background.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/forms.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth/auth.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="brand-logo">
            <h1>Inventory<span>Manager</span></h1>
        </div>
        <div class="login-form">
            <h2>Sign In</h2>
            <form method="POST" action="{{ route('login') }}">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/auth/form-validation.js') }}"></script>
</body>
</html>