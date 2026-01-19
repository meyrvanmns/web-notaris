<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SI NOTARIS - Registrasi Akun</title>

    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #1a1c20;
            background-image: linear-gradient(180deg, #1a1c20 10%, #2c3e50 100%);
            min-height: 100vh;
        }
        .card-register {
            border-radius: 15px;
            overflow: hidden;
        }
        .btn-register {
            background: #4e73df;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-register:hover {
            background: #2e59d9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
        }
        .form-control-user {
            border-radius: 10px !important;
            padding: 20px 15px !important;
            height: auto !important;
        }
        label {
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 5px;
            color: #4e73df;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh; padding: 50px 0;">
        <div class="col-xl-6 col-lg-7 col-md-10">
            <div class="card o-hidden border-0 shadow-lg card-register">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <div class="icon-circle bg-primary text-white mb-3 mx-auto" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-user-plus fa-lg"></i>
                            </div>
                            <h1 class="h4 text-gray-900 font-weight-bold">Daftar Akun Baru</h1>
                            <p class="text-muted small">Lengkapi formulir di bawah untuk akses Dashboard Notaris</p>
                        </div>

                        {{-- Alert error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger border-0 small shadow-sm mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="user" action="{{ route('register.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="full_name" class="form-control form-control-user"
                                            placeholder="Masukkan nama lengkap" value="{{ old('full_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control form-control-user"
                                            placeholder="Buat username" value="{{ old('username') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Alamat Email</label>
                                <input type="email" name="email" class="form-control form-control-user"
                                    placeholder="nama@notaris.com" value="{{ old('email') }}" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control form-control-user"
                                            placeholder="••••••••" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" class="form-control form-control-user"
                                            placeholder="••••••••" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block btn-register mt-4">
                                <i class="fas fa-check-circle mr-2"></i> Buat Akun Sekarang
                            </button>
                        </form>

                        <hr class="my-4">

                        <div class="text-center">
                            <span class="small text-muted">Sudah memiliki akun?</span>
                            <a class="small font-weight-bold" href="{{ route('login') }}"> Masuk Disini</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <p class="small text-white-50">&copy; {{ date('Y') }} SI NOTARIS by Meyrvan Maulana Nur Sasmito</p>
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