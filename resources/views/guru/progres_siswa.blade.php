@extends('layout.layoutguru')

@section('title', 'Progress Siswa')

@section('content')

    <h3 class="fw-bold mb-4" style="color: var(--primary-dark);">Progress Siswa</h3>

    <div class="row g-3 mb-4">

        <div class="col-md-6">
            <div class="card shadow-sm p-3" style="border-radius: 12px;">
                <h6 class="fw-bold">Siswa Aktif</h6>
                <h2 class="fw-bold" style="color: var(--primary-dark);">{{ $jumlahSiswaAktif }}</h2>
                <small class="text-muted">Siswa yang sudah mulai belajar</small>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm p-3" style="border-radius: 12px;">
                <h6 class="fw-bold">Rata-rata Progress Siswa</h6>
                <h2 class="fw-bold" style="color: var(--primary-dark);">{{ $rataProgress }}%</h2>
                <small class="text-muted">Dari seluruh materi pembelajaran</small>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <input type="text" id="searchSiswa" class="form-control" placeholder="Cari nama siswa..."
            style="border-radius: 999px; max-width: 320px;">
    </div>

    <div class="card shadow-sm mb-3" style="border-radius: 12px;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless align-middle table-progress">
                    <thead style="background-color: #f1f5f9; border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th class="text-center">Progress Materi</th>
                            <th class="text-center">Kuis</th>
                            <th class="text-center">Evaluasi</th>
                            <th class="text-center">Materi yang Sedang Dipelajari</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody id="progressTableBody">
                        @forelse ($studentsData as $index => $student)

                            <tr class="row-hover siswa-row" data-nama="{{ strtolower($student['nama']) }}">

                                <td>{{ $index + 1 }}</td>
                                <td>
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
                                <td class="text-center">

                                    <div class="fw-semibold mb-1">{{ $student['progress_persen'] }}%</div>
                                    <div class="progress mx-auto progress-custom">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $student['progress_persen'] }}%; background-color: var(--primary-color);">
                                        </div>
                                    </div>

                                    <small class="text-muted">
                                        {{ $student['materi_selesai'] }}/{{ $student['total_materi'] }} materi
                                    </small>
                                </td>

                                <td class="text-center">
                                    {{ $student['kuis_dikerjakan'] }}/{{ $student['total_quiz'] }}
                                </td>

                                <td class="text-center">
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
                                        <span class="badge bg-secondary">Belum</span>
                                    @endif

                                </td>
                                <td class="materi-col">
                                    @if ($student['materi_fokus'])
                                        <div class="materi-title">
                                            {{ $student['materi_fokus'] }}
                                        </div>

                                        <div class="mt-2">
                                            <span class="badge {{ $student['status_materi_class'] }}">
                                                {{ $student['status_materi_fokus'] }}
                                            </span>
                                        </div>
                                    @else
                                        <span class="badge bg-secondary">
                                            Belum mulai belajar
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge {{ $student['status_class'] }}">
                                        {{ $student['status'] }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
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
            transition: .15s ease-in-out;
        }

        .table-progress th,
        .table-progress td {
            font-size: 15px;
            vertical-align: middle;
        }

        .progress {
            background-color: #e5e7eb;
            border-radius: 999px;
        }

        .progress-custom {
            height: 8px;
            width: 120px;
        }

        .progress-bar {
            border-radius: 999px;
        }

        @media (max-width:768px) {

            h3 {
                font-size: 22px;
            }

            .table-progress th,
            .table-progress td {
                font-size: 13px;
                padding: 10px 8px !important;
            }

            .progress-custom {
                width: 90px;
            }

            #searchSiswa {
                max-width: 100% !important;
            }

            .card-body {
                padding: 1rem;
            }

            .badge {
                font-size: 11px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        const searchInput = document.getElementById('searchSiswa');
        const rows = document.querySelectorAll('.siswa-row');

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const keyword = this.value.toLowerCase().trim();
                rows.forEach((row) => {

                    const nama = row.dataset.nama || '';

                    row.style.display =
                        nama.includes(keyword) ?
                        '' :
                        'none';
                });
            });
        }
    </script>
@endpush
