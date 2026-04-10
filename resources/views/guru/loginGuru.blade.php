@extends('layout.navbar')

@section('title', 'Login Guru')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="container py-5 d-flex justify-content-center">
        <div class="card shadow-sm w-100" style="max-width: 900px; border-radius: 20px; background-color: var(--hero-bg);">
            <div class="row g-0 align-items-center">

                {{-- Ilustrasi kiri --}}
                <div class="col-md-6 text-center p-4">
                    <img src="{{ asset('img/landing-pic.png') }}" alt="Ilustrasi Login Guru" class="img-fluid"
                        style="max-height: 230px;">
                </div>

                {{-- Form kanan --}}
                <div class="col-md-6 p-4">
                    <h2 class="fw-bold text-center mb-3" style="color: var(--primary-dark);">
                        LOGIN GURU
                    </h2>

                    <p class="text-center mb-4 fw-semibold">
                        Selamat Datang di LinearEdu!
                    </p>

                    <form action="{{ route('guru.login.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label mb-1">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                style="border-radius: 8px;" required>
                        </div>

                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label mb-1">Password</label>

                            <input type="password" name="password" id="password" class="form-control"
                                style="border-radius: 8px; padding-right: 40px;" required>

                            <span class="position-absolute" onclick="togglePassword()"
                                style="right: 12px; top: 35px; cursor: pointer;">
                                <i id="eyeIcon" class="bi bi-eye-slash"></i>
                            </span>
                        </div>

                        {{-- Ingat Saya --}}
                        <div class="mb-4 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn fw-semibold"
                                style="background-color: var(--primary-color); color: #fff; border-radius: 999px;">
                                Masuk
                            </button>
                        </div>
                    </form>

                    {{-- Belum punya akun --}}
                    <p class="text-center mt-3 mb-0">
                        Belum punya akun?
                        <a href="{{ route('guru.register') }}" class="fw-semibold"
                            style="color: var(--primary-dark); text-decoration: none;">
                            Registrasi
                        </a>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("bi-eye-slash");
                eyeIcon.classList.add("bi-eye");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("bi-eye");
                eyeIcon.classList.add("bi-eye-slash");
            }
        }
    </script>
@endsection
