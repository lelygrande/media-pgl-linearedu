@extends('layout.navbar')

@section('title', 'Registrasi Guru')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container py-5 d-flex justify-content-center">
        <div class="card shadow-sm w-100" style="max-width: 900px; border-radius: 20px; background-color: var(--hero-bg);">
            <div class="row g-0 align-items-center">

                {{-- Ilustrasi kiri --}}
                <div class="col-md-6 text-center p-4">
                    <img src="{{ asset('img/landing-pic.png') }}" alt="Ilustrasi Registrasi Guru" class="img-fluid"
                        style="max-height: 230px;">
                </div>

                {{-- Form kanan --}}
                <div class="col-md-6 p-4">
                    <h2 class="fw-bold text-center mb-3" style="color: var(--primary-dark);">
                        REGISTRASI GURU
                    </h2>

                    <p class="text-center mb-4 fw-semibold">
                        Daftarkan akun guru Anda untuk mengakses Dashboard Guru LinearEdu.
                    </p>

                    <form action="{{ route('guru.register.store') }}" method="POST">
                        @csrf
                        {{-- Nama --}}
                        <div class="mb-3">
                            <label for="nama" class="form-label mb-1">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                style="border-radius: 8px;" required>
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label mb-1">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                style="border-radius: 8px;" required>
                        </div>

                        {{-- Password --}}
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label mb-1">Password</label>

                            <input type="password" name="password" id="password" class="form-control"
                                style="border-radius: 8px; padding-right:40px;" required>

                            <span class="position-absolute" onclick="togglePassword('password','eyeIcon1')"
                                style="right: 12px; top: 35px; cursor: pointer;">
                                <i id="eyeIcon1" class="bi bi-eye-slash"></i>
                            </span>
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="mb-3 position-relative">
                            <label for="password_confirmation" class="form-label mb-1">Konfirmasi Password</label>

                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" style="border-radius: 8px; padding-right:40px;" required>

                            <span class="position-absolute" onclick="togglePassword('password_confirmation','eyeIcon2')"
                                style="right: 12px; top: 35px; cursor: pointer;">
                                <i id="eyeIcon2" class="bi bi-eye-slash"></i>
                            </span>
                        </div>

                        {{-- Tombol Registrasi --}}
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn fw-semibold"
                                style="background-color: var(--primary-color); color: #fff; border-radius: 999px;">
                                Daftar
                            </button>
                        </div>
                    </form>

                    {{-- Sudah punya akun --}}
                    <p class="text-center mt-3 mb-0">
                        Sudah punya akun?
                        <a href="{{ route('guru.login') }}" class="fw-semibold"
                            style="color: var(--primary-dark); text-decoration: none;">
                            Login
                        </a>
                    </p>

                </div>

            </div>
        </div>
    </div>

    {{-- Script Toggle Password --}}
    <script>
        function togglePassword(fieldId, iconId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);

            if (field.type === "password") {
                field.type = "text";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            } else {
                field.type = "password";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            }
        }
    </script>

@endsection
