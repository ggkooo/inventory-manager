<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Inventory Manager</title>
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
            <h2>Sign Up</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <div class="form-floating flex-grow-1">
                            <input type="text" class="form-control" id="name" name="name" 
                                placeholder="Full Name" required autofocus value="{{ old('name') }}">
                            <label for="name">Full Name</label>
                        </div>
                    </div>
                    <div class="invalid-feedback" id="nameFeedback">
                        Name must contain at least 8 characters.
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text" id="emailIcon"><i class="bi bi-envelope-fill"></i></span>
                        <div class="form-floating flex-grow-1">
                            <input type="email" class="form-control" id="email" name="email" 
                                placeholder="name@example.com" required value="{{ old('email') }}" disabled>
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
                                placeholder="Confirm Password" required disabled>
                            <label for="password_confirmation">Confirm Password</label>
                        </div>
                    </div>
                    <div class="invalid-feedback" id="passwordConfirmFeedback">
                        Passwords do not match.
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-person-plus-fill me-2"></i>Sign Up
                </button>
            </form>
            
            <div class="login-footer">
                <p class="mt-2">Already have an account? <a href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-1"></i>Sign In</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/auth/form-validation.js') }}"></script>
</body>
</html>