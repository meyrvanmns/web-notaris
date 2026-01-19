<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SI NOTARIS - Login</title>

    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #1a1c20; /* Warna gelap solid agar selaras dengan sidebar dark */
            background-image: linear-gradient(180deg, #1a1c20 10%, #2c3e50 100%);
            height: 100vh;
        }
        .card-login {
            border-radius: 15px;
            overflow: hidden;
        }
        .btn-login {
            background: #4e73df;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background: #2e59d9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
        }
        .form-control-user {
            border-radius: 10px !important;
            padding: 25px 15px !important;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-xl-5 col-lg-6 col-md-9">
            <div class="card o-hidden border-0 shadow-lg card-login">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <div class="icon-circle bg-primary text-white mb-3 mx-auto" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-balance-scale fa-2x"></i>
                            </div>
                            <h1 class="h4 text-gray-900 font-weight-bold">Selamat Datang</h1>
                            <p class="text-muted">Silakan masuk ke akun Notaris Anda</p>
                        </div>

                        {{-- Alert error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger border-0 small shadow-sm">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="user" action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="small ml-2 font-weight-bold text-dark">Email Address</label>
                                <input type="email" name="email" class="form-control form-control-user"
                                    placeholder="contoh@email.com" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group">
                                <label class="small ml-2 font-weight-bold text-dark">Password</label>
                                <input type="password" name="password" class="form-control form-control-user"
                                    placeholder="••••••••" required>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block btn-login">
                                <i class="fas fa-sign-in-alt mr-2"></i> Masuk Ke Dashboard
                            </button>
                        </form>

                        <hr class="my-4">

                        <div class="text-center">
                            <span class="small text-muted">Belum punya akses?</span>
                            <a class="small font-weight-bold" href="{{ route('register') }}"> Register Account</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <p class="small text-white-50">&copy; {{ date('Y') }} SI NOTARIS - Sistem Manajemen Terpadu</p>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

</body>
</html>