<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} Authentication process</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/pages/auth.css') }}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-6 offset-lg-3">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="#"><img src="{{ asset('backend/assets/images/logo/logo.png') }}" alt="Logo"></a>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>

    </div>
</body>

</html>