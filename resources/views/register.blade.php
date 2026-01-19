<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NOTARIS - Register</title>

    <!-- Custom fonts -->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700,900" rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container" style="margin-top: 80px">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="d-none d-lg-block bg-login-image" style="margin-left: 90px"></div>
                        <div class="col-lg-12">
                            <div class="p-5">

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">
                                        Halaman Registrasi Dashboard Notaris
                                    </h1>
                                </div>

                                {{-- Alert error --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form class="user" action="{{ route('register.store') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <input type="text"
                                               name="full_name"
                                               class="form-control form-control-user"
                                               placeholder="Nama Lengkap"
                                               value="{{ old('name') }}"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text"
                                            name="username"
                                            class="form-control form-control-user"
                                            placeholder="Username"
                                            value="{{ old('username') }}"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <input type="email"
                                               name="email"
                                               class="form-control form-control-user"
                                               placeholder="Enter Email Address..."
                                               value="{{ old('email') }}"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password"
                                               name="password"
                                               class="form-control form-control-user"
                                               placeholder="Password"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password"
                                               name="password_confirmation"
                                               class="form-control form-control-user"
                                               placeholder="Konfirmasi Password"
                                               required>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Daftar
                                    </button>
                                </form>

                                <hr>

                                {{-- Login Link --}}
                                <div class="text-center mt-3">
                                    <span>Sudah punya akun?</span>
                                    <a href="{{ route('login') }}">Login</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

</body>
</html>
