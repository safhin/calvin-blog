<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    @yield('extra-style')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/custom.css') }}">
    {{-- <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.svg') }}" type="image/x-icon"> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <div id="app">
        <x-backend.sidebar/>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Calvin Blog Dashboard</h3>
            </div>
            @yield('content')
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('backend/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    @yield('extra-script')

    @if (request()->route()->getName() == "dashboard")
        <script src="{{ asset('admin/assets/vendors/apexcharts/apexcharts.js') }}"></script>
        <script src="{{ asset('admin/assets/js/pages/dashboard.js') }}"></script>
    @endif
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.tag').select2({
                tags: true
            });
        });
    </script>
</body>

</html>