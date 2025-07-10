<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.head')
</head>
<body>
    @include('layouts.partials.navbar')
    
    <div class="container my-4">
        @yield('content')
    </div>

    @include('layouts.partials.footer')
</body>
</html>