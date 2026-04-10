@extends('layout.layoutguru')

@section('title', 'Progress Siswa')

@section('content')

    <h3 class="fw-bold mb-4" style="color: var(--primary-dark);">Progress Siswa</h3>


    {{-- ===================== CARD OVERVIEW ===================== --}}
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm p-3" style="border-radius: 12px;">
                <h6 class="fw-bold">Siswa Aktif</h6>
                <h2 class="fw-bold" style="color: var(--primary-dark);">24</h2>
                <small class="text-muted">Dalam 7 hari terakhir</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3" style="border-radius: 12px;">
                <h6 class="fw-bold">Rata-rata Progress Kelas</h6>
                <h2 class="fw-bold" style="color: var(--primary-dark);">68%</h2>
                <small class="text-muted">Dari total 5 bab pembelajaran</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3" style="border-radius: 12px;">
                <h6 class="fw-bold">Rata-rata Waktu Belajar</h6>
                <h2 class="fw-bold" style="color: var(--primary-dark);">35 menit</h2>
                <small class="text-muted">Per siswa</small>
            </div>
        </div>

    </div>



    {{-- ===================== GRAFIK PROGRESS PER BAB ===================== --}}
    <div class="card shadow-sm mb-4" style="border-radius: 12px;">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Progress Per Bab</h5>

            <canvas id="progressChart" style="max-height: 260px;"></canvas>
        </div>
    </div>



    {{-- ===================== SEARCH BAR ===================== --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <input type="text" class="form-control" placeholder="Cari nama siswa..."
            style="max-width: 320px; border-radius: 999px;">
    </div>



    {{-- ===================== TABEL PROGRESS SISWA ===================== --}}
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

                    <tbody>
                        <tr class="row-hover">
                            <td class="py-3 px-3">1</td>
                            <td class="py-3 px-3">Andi Pratama</td>
                            <td class="py-3 px-3 text-center">80%</td>
                            <td class="py-3 px-3 text-center">4 / 5</td>

                            {{-- Evaluasi --}}
                            <td class="py-3 px-3 text-center">
                                <span class="badge bg-success">Sudah</span>
                            </td>

                            <td class="py-3 px-3 text-center">42 menit</td>

                            {{-- Status belajar --}}
                            <td class="py-3 px-3 text-center">
                                <span class="badge bg-success">Aktif</span>
                            </td>

                            {{-- Aksi --}}
                            <td class="py-3 px-3 text-center">
                                <button class="btn btn-sm text-white"
                                    style="background-color: var(--primary-color); border-radius: 6px;">
                                    Detail
                                </button>
                            </td>
                        </tr>

                        <tr class="row-hover">
                            <td class="py-3 px-3">2</td>
                            <td class="py-3 px-3">Siti Nurhaliza</td>
                            <td class="py-3 px-3 text-center">60%</td>
                            <td class="py-3 px-3 text-center">3 / 5</td>

                            {{-- Evaluasi --}}
                            <td class="py-3 px-3 text-center">
                                <span class="badge bg-danger">Belum</span>
                            </td>

                            <td class="py-3 px-3 text-center">30 menit</td>

                            <td class="py-3 px-3 text-center">
                                <span class="badge bg-warning text-dark">Pasif</span>
                            </td>

                            <td class="py-3 px-3 text-center">
                                <button class="btn btn-sm text-white"
                                    style="background-color: var(--primary-color); border-radius: 6px;">
                                    Detail
                                </button>
                            </td>
                        </tr>

                        <tr class="row-hover">
                            <td class="py-3 px-3">3</td>
                            <td class="py-3 px-3">Budi Santoso</td>
                            <td class="py-3 px-3 text-center">35%</td>
                            <td class="py-3 px-3 text-center">2 / 5</td>

                            {{-- Evaluasi --}}
                            <td class="py-3 px-3 text-center">
                                <span class="badge bg-danger">Belum</span>
                            </td>

                            <td class="py-3 px-3 text-center">18 menit</td>

                            <td class="py-3 px-3 text-center">
                                <span class="badge bg-danger">Perlu Perhatian</span>
                            </td>

                            <td class="py-3 px-3 text-center">
                                <button class="btn btn-sm text-white"
                                    style="background-color: var(--primary-color); border-radius: 6px;">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <nav aria-label="Navigasi halaman progress" class="mt-3">
                <ul class="pagination justify-content-end mb-0">
                    <li class="page-item disabled"><a class="page-link">Prev</a></li>
                    <li class="page-item active"><a class="page-link">1</a></li>
                    <li class="page-item"><a class="page-link">2</a></li>
                    <li class="page-item"><a class="page-link">Next</a></li>
                </ul>
            </nav>

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
    </style>
@endpush

@push('scripts')
    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('progressChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Bab A', 'Bab B', 'Bab C', 'Bab D', 'Bab E'],
                datasets: [{
                    label: '% Siswa Selesai',
                    data: [95, 80, 60, 40, 20], // dummy
                    borderWidth: 1
                }]
            },
            options: {
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
