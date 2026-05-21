@extends('layout.layoutguru')

@section('title', 'Dashboard Guru')

@section('content')

    <h3 class="fw-bold mb-1" style="color: var(--primary-dark);">
        Dashboard Guru
    </h3>

    <p class="text-muted mb-4">
        Selamat datang kembali, {{ auth('guru')->user()->nama }} 👋
    </p>

    {{-- CARD STATISTIK --}}
    <div class="row g-3 mb-4">

        {{-- Total Siswa --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 18px;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Jumlah Siswa</p>

                            <h2 class="fw-bold mb-0" style="color: var(--primary-dark);">
                                {{ $totalSiswa }}
                            </h2>
                        </div>

                        <i class="bi bi-people-fill" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Rata-rata Nilai --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 18px;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Rata-rata Nilai</p>

                            <h2 class="fw-bold mb-0" style="color: var(--primary-dark);">
                                {{ $rataNilai ?? 0 }}
                            </h2>
                        </div>

                        <i class="bi bi-bar-chart-fill" style="font-size: 40px; color: var(--primary-color);"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pengunjung hari ini --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100" style="border-radius: 18px;">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-muted mb-1">
                                Pengunjung Hari Ini
                            </p>

                            <h2 class="fw-bold mb-0" style="color: var(--primary-dark);">

                                {{ $pengunjungHariIni }}

                            </h2>
                        </div>

                        <i class="bi bi-person-check-fill" style="font-size: 40px; color: var(--primary-color);"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- QUICK ACCESS --}}
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">
                Akses Cepat
            </h5>
        </div>
        <div class="row g-3 mb-4">
            {{-- Kelola Siswa --}}
            <div class="col-md-6">
                <a href="{{ route('daftarsiswa.index') }}">
                    <div class="card border-0 shadow-sm h-100 quick-card">
                        <div class="card-body p-4">

                            <div class="d-flex align-items-center gap-3">

                                <div class="quick-icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>

                                <div>
                                    <h5 class="fw-bold mb-1">
                                        Manajemen Siswa
                                    </h5>

                                    <p class="text-muted mb-0">
                                        Lihat daftar siswa, nilai, dan progress belajar
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </a>
            </div>

            {{-- Kelola Kuis --}}
            <div class="col-md-6">
                <a href="{{ route('kuis.index') }}">
                    <div class="card border-0 shadow-sm h-100 quick-card">
                        <div class="card-body p-4">

                            <div class="d-flex align-items-center gap-3">

                                <div class="quick-icon">
                                    <i class="bi bi-journal-text"></i>
                                </div>

                                <div>
                                    <h5 class="fw-bold mb-1">
                                        Manajemen Kuis
                                    </h5>

                                    <p class="text-muted mb-0">
                                        Tambah, edit, dan kelola kuis siswa
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    {{-- CHART --}}
    <div class="card border-0 shadow-sm" style="border-radius: 18px;">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">
                    Rata-rata Nilai Kuis
                </h5>
            </div>

            <canvas id="nilaiChart" style="max-height: 300px;">
            </canvas>

        </div>

    </div>

    {{-- Aktivitas Terbaru --}}
    <div class="card shadow-sm border-0 mt-4" style="border-radius: 18px;">

        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">
                    Aktivitas Terakhir Siswa
                </h5>
            </div>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Materi</th>
                            <th>Status</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($aktivitas as $item)
                            <tr>
                                {{-- Nama --}}
                                <td>
                                    {{ $item->nama }}
                                </td>
                                {{-- Materi --}}
                                <td>
                                    {{ $item->materi }}
                                </td>
                                {{-- Status --}}
                                <td>
                                    @if ($item->status == 'Selesai')
                                        <span class="badge bg-success">
                                            {{ $item->status }}
                                        </span>
                                    @elseif($item->status == 'Sedang dikerjakan')
                                        <span class="badge bg-warning text-dark">
                                            {{ $item->status }}
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            {{ $item->status }}
                                        </span>
                                    @endif
                                </td>
                                {{-- Waktu --}}
                                <td>
                                    {{ $item->waktu }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    Belum ada aktivitas siswa
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        .quick-card {
            border-radius: 18px;
            transition: .2s ease;
        }

        .quick-card:hover {
            transform: translateY(-4px);
        }

        .quick-icon {
            width: 65px;
            height: 65px;
            border-radius: 16px;
            background-color: #e8f4ff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quick-icon i {
            font-size: 28px;
            color: var(--primary-color);
        }

        a {
            text-decoration: none;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('nilaiChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Rata-rata Nilai',
                    data: {!! json_encode($data) !!},
                    borderWidth: 1
                }]
            },

            options: {
                responsive: true,

                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    </script>
@endpush
