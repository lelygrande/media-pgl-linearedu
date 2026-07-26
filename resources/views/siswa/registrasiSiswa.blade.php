@extends('layout.navbar')

@section('title', 'Registrasi Siswa')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        .register-wrapper {
            min-height: calc(100vh - 70px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px 12px;
        }

        .register-card {
            max-width: 980px;
            width: 100%;
            border-radius: 18px;
            background-color: var(--hero-bg);
            overflow: hidden;
        }

        .register-img {
            max-height: 250px;
        }

        .register-title {
            color: var(--primary-dark);
            font-size: 24px;
            margin-bottom: 6px;
        }

        .register-subtitle {
            font-size: 14px;
            margin-bottom: 12px;
        }

        .form-compact {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px 12px;
        }

        .form-compact .form-label {
            font-size: 14px;
        }

        .form-compact .form-control,
        .form-compact .form-select {
            height: 38px;
            font-size: 14px;
            border-radius: 8px;
        }

        .form-full {
            grid-column: span 2;
        }

        .token-help {
            font-size: 12px;
        }

        .password-toggle {
            right: 12px;
            top: 34px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .register-wrapper {
                align-items: flex-start;
            }

            .form-compact {
                grid-template-columns: 1fr;
            }

            .form-full {
                grid-column: span 1;
            }

            .register-img {
                max-height: 180px;
            }
        }
    </style>

    <div class="register-wrapper">
        <div class="card shadow-sm register-card">
            <div class="row g-0 align-items-center">

                <div class="col-md-5 text-center p-4">
                    <img src="{{ asset('img/siswapage.png') }}" alt="Ilustrasi Registrasi Siswa"
                        class="img-fluid register-img">
                </div>

                <div class="col-md-7 p-4">
                    <h2 class="fw-bold text-center register-title">
                        REGISTRASI SISWA
                    </h2>

                    <p class="text-center fw-semibold register-subtitle">
                        Daftarkan akun siswa untuk mengakses Halaman Materi LinearEdu.
                    </p>

                    @if (session('success'))
                        <div class="alert alert-success py-2 mb-2">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 mb-2">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('siswa.register.store') }}" method="POST">
                        @csrf

                        <div class="form-compact">

                            <div>
                                <label for="nis" class="form-label mb-1">NIS</label>
                                <input type="text" name="nis" id="nis" class="form-control"
                                    value="{{ old('nis') }}" required>
                            </div>

                            <div>
                                <label for="nama" class="form-label mb-1">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ old('nama') }}" required>
                            </div>

                            <div>
                                <label for="email" class="form-label mb-1">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" required>
                            </div>

                            <div>
                                <label for="token_kelas" class="form-label mb-1">Token Kelas</label>
                                <input type="text" name="token_kelas" id="token_kelas" class="form-control"
                                    style="text-transform: uppercase;" value="{{ old('token_kelas') }}"
                                    placeholder="Token kelas" required>

                                <small class="text-muted token-help">
                                    Diperoleh dari guru.
                                </small>
                            </div>

                            <div>
                                <label for="jenis_kelamin" class="form-label mb-1">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                            </div>

                            <div class="position-relative">
                                <label for="password" class="form-label mb-1">Password</label>

                                <input type="password" name="password" id="password" class="form-control"
                                    style="padding-right: 40px;" required>

                                <span class="position-absolute password-toggle"
                                    onclick="togglePassword('password','eyeIcon1')">
                                    <i id="eyeIcon1" class="bi bi-eye-slash"></i>
                                </span>
                            </div>

                            <div class="position-relative">
                                <label for="password_confirmation" class="form-label mb-1">Konfirmasi Password</label>

                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" style="padding-right: 40px;" required>

                                <span class="position-absolute password-toggle"
                                    onclick="togglePassword('password_confirmation','eyeIcon2')">
                                    <i id="eyeIcon2" class="bi bi-eye-slash"></i>
                                </span>
                            </div>

                            <div class="d-grid form-full mt-1">
                                <button type="submit" class="btn fw-semibold"
                                    style="background-color: var(--primary-color); color: #fff; border-radius: 999px;">
                                    Daftar
                                </button>
                            </div>

                        </div>
                    </form>

                    <p class="text-center mt-2 mb-0" style="font-size: 14px;">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="fw-semibold"
                            style="color: var(--primary-dark); text-decoration: none;">
                            Login
                        </a>
                    </p>

                </div>

            </div>
        </div>
    </div>

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
