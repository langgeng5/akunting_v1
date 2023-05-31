@extends('base_html') @section('layout')

<style>
    .login-body {
        background: url({{ url('images/business-information-accounting-application.jpg') }}) no-repeat center center fixed;
        background-size: cover;
    }
    /*  */
</style>


<body class="login-body">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div
                                class="col-lg-6 d-none d-lg-block bg-login-image"
                            ></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Welcome Back!
                                        </h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ url('auth') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control form-control-user @error('username') is-invalid @enderror"
                                                id="exampleInputEmail"
                                                placeholder="Username"
                                                name="username"
                                                value="{{ old('username', $user->username ?? '') }}"
                                            />
                                            @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input
                                                type="password"
                                                class="form-control form-control-user"
                                                id="exampleInputPassword"
                                                placeholder="Password"
                                                name="password"
                                            />
                                        </div>
                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-user btn-block"
                                        >
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <i><a href="{{ url('user/create') }}">Buat User Baru</a></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
