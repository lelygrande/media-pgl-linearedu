@extends('layout.layoutguru')

@section('title', 'Progress Siswa')

@section('content')

    <h3 class="fw-bold mb-4" style="color: var(--primary-dark);">Progress Siswa</h3>

    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm p-3" style="border-radius: 12px;">
                <h6 class="fw-bold">Siswa Aktif</h6>
                <h2 class="fw-bold" style="color: var(--primary-dark);">
                    {{ $jumlahSiswaAktif }}
                </h2>
                <small class="text-muted">Dalam 7 hari terakhir</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3" style="border-radius: 12px;">
                <h6 class="fw-bold">Rata-rata Progress Kelas</h6>
                <h2 class="fw-bold" style="color: var(--primary-dark);">
                    {{ $rataProgress }}%
                </h2>
                <small class="text-muted">Dari seluruh materi pembelajaran</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3" style="border-radius: 12px;">
                <h6 class="fw-bold">Estimasi Waktu Belajar</h6>
                <h2 class="fw-bold" style="color: var(--primary-dark);">
                    {{ $rataWaktuBelajar }} menit
                </h2>
                <small class="text-muted">Rata-rata per siswa</small>
            </div>
        </div>

    </div>

    <div class="card shadow-sm mb-4" style="border-radius: 12px;">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Progress Per Bab</h5>
            <canvas id="progressChart" style="max-height: 260px;"></canvas>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <input type="text" id="searchSiswa" class="form-control" placeholder="Cari nama siswa..."
            style="max-width: 320px; border-radius: 999px;">
    </div>

    <div class="card shadow-sm mb-3" style="border-radius: 12px;">
        <div class="card-body">

            <div class="table-responsive" style="overflow-x: auto; overflow-y: hidden;">
                <table class="table table-borderless align-middle table-progress" style="white-space: nowrap;">
                    <thead style="background-color: #f1f5f9; border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th class="py-3 px-3">No</th>
                            <th class="py-3 px-3">Nama</th>
                            <th class="py-3 px-3 text-center">Progress Materi</th>
                            <th class="py-3 px-3 text-center">Kuis Dikerjakan</th>
                            <th class="py-3 px-3 text-center">Evaluasi</th>
                            <th class="py-3 px-3 text-center">Waktu Belajar</th>
                            <th class="py-3 px-3 text-center">Status</th>
                            <th class="py-3 px-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="progressTableBody">
                        @forelse ($studentsData as $index => $student)
                            <tr class="row-hover siswa-row" data-nama="{{ strtolower($student['nama']) }}">
                                <td class="py-3 px-3">{{ $index + 1 }}</td>

                                <td class="py-3 px-3">
                                    <div class="fw-semibold">{{ $student['nama'] }}</div>

                                    @if ($student['last_activity'])
                                        <small class="text-muted">
                                            Aktivitas terakhir:
                                            {{ \Carbon\Carbon::parse($student['last_activity'])->format('d M Y H:i') }}
                                        </small>
                                    @else
                                        <small class="text-muted">Belum ada aktivitas</small>
                                    @endif
                                </td>

                                <td class="py-3 px-3 text-center">
                                    <div class="fw-semibold mb-1">
                                        {{ $student['progress_persen'] }}%
                                    </div>

                                    <div class="progress mx-auto" style="height: 8px; width: 120px;">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $student['progress_persen'] }}%; background-color: var(--primary-color);"
                                            aria-valuenow="{{ $student['progress_persen'] }}"
                                            aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>

                                    <small class="text-muted">
                                        {{ $student['materi_selesai'] }} / {{ $student['total_materi'] }} materi
                                    </small>
                                </td>

                                <td class="py-3 px-3 text-center">
                                    {{ $student['kuis_dikerjakan'] }} / {{ $student['total_quiz'] }}
                                </td>

                                <td class="py-3 px-3 text-center">
                                    @if ($student['evaluasi_sudah'])
                                        @if ($student['evaluasi_lulus'])
                                            <span class="badge bg-success">
                                                Lulus · {{ $student['evaluasi_score'] }}
                                            </span>
                                        @else
                                            <span class="badge bg-warning text-dark">
                                                Belum Lulus · {{ $student['evaluasi_score'] }}
                                            </span>
                                        @endif
                                    @else
                                        <span class="badge bg-danger">Belum</span>
                                    @endif
                                </td>

                                <td class="py-3 px-3 text-center">
                                    {{ $student['waktu_belajar'] }} menit
                                </td>

                                <td class="py-3 px-3 text-center">
                                    <span class="badge {{ $student['status_class'] }}">
                                        {{ $student['status'] }}
                                    </span>
                                </td>

                                <td class="py-3 px-3 text-center">
                                    <a href="{{ route('guru.progress-siswa.detail', $student['id']) }}"
                                        class="btn btn-sm text-white"
                                        style="background-color: var(--primary-color); border-radius: 6px;">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    Belum ada data siswa.
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
        .row-hover:hover {
            background-color: #f8fafc !important;
            transition: 0.15s ease-in-out;
        }

        .table-progress th,
        .table-progress td {
            white-space: nowrap;
            font-size: 15px;
        }

        .pagination .page-link {
            border-radius: 999px;
            margin-left: 4px;
            margin-right: 4px;
            color: var(--primary-dark);
            border-color: #d0d7e2;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
        }

        .progress {
            background-color: #e5e7eb;
            border-radius: 999px;
        }

        .progress-bar {
            border-radius: 999px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('progressChart').getContext('2d');

        const progressLabels = @json($babLabels);
        const progressData = @json($chartData);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: progressLabels,
                datasets: [{
                    label: '% Siswa Selesai',
                    data: progressData,
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });

        const searchInput = document.getElementById('searchSiswa');
        const rows = document.querySelectorAll('.siswa-row');

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const keyword = this.value.toLowerCase().trim();

                rows.forEach((row) => {
                    const nama = row.dataset.nama || '';
                    row.style.display = nama.includes(keyword) ? '' : 'none';
                });
            });
        }
    </script>
@endpush
