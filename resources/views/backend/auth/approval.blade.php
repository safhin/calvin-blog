<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('backend/assets/css/app.css') }}"> --}}
</head>
<body> 
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="card">
            <div class="card-content">
                <img class="card-img-top img-fluid" src="{{ asset('backend/assets/images/samples/origami.jpg') }}" alt="Card image cap" style="height: 20rem">
                <div class="card-body">
                    <h4 class="card-title">Waiting for Approval</h4>
                    <p class="card-text">
                        Your account is waiting for our administrator approval.
                        <br />
                        Please check back later.
                    </p>
                    <p class="card-text">
                        Please be patient.
                    </p>
                    <a href="{{ route('home') }}" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>