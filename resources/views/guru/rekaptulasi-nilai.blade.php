@extends('layout.layoutguru')

@section('title', 'Rekapitulasi Nilai')

@section('content')

    <h3 class="fw-bold mb-4" style="color: var(--primary-dark);">
        Rekapitulasi Nilai Siswa
    </h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <form method="GET" action="{{ route('rekapitulasi-nilai') }}" style="max-width:320px;width:100%;">

            <input type="text" name="search" class="form-control" placeholder="Cari nama siswa..."
                value="{{ request('search') }}" style="border-radius:999px;">
        </form>
        <div class="d-flex gap-2 align-items-center flex-wrap">

            {{-- Dropdown Export --}}
            <div class="dropdown">
                <button class="btn fw-semibold dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    style="background-color:#64748b;color:#fff;border-radius:8px;">
                    Export
                </button>
                <ul class="dropdown-menu shadow-sm" style="border-radius:10px;">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2"
                            href="{{ route('guru.rekap.export.pdf', ['kelas' => request('kelas')]) }}">
                            <i class="bi bi-file-earmark-pdf text-danger"></i>
                            Export as PDF
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2"
                            href="{{ route('guru.rekap.export.excel', ['kelas' => request('kelas')]) }}">
                            <i class="bi bi-file-earmark-excel text-success"></i>
                            Export as Excel
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Filter Kelas --}}
            <form method="GET" action="{{ route('rekapitulasi-nilai') }}"
                class="d-flex align-items-center gap-2 flex-wrap">

                <select name="kelas" class="form-select" style="width:160px;" onchange="this.form.submit()">

                    <option value="">Semua Kelas</option>

                    <option value="8A" {{ request('kelas') == '8A' ? 'selected' : '' }}>
                        8A
                    </option>

                    <option value="8B" {{ request('kelas') == '8B' ? 'selected' : '' }}>
                        8B
                    </option>

                    <option value="8C" {{ request('kelas') == '8C' ? 'selected' : '' }}>
                        8C
                    </option>

                </select>
                @if (request('kelas'))
                    <a href="{{ route('rekapitulasi-nilai') }}" class="btn btn-secondary">

                        Reset

                    </a>
                @endif
            </form>
        </div>
    </div>

    <div class="card shadow-sm mb-3" style="border-radius:16px;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless align-middle table-nilai">
                    <thead style="background-color:#f1f5f9;border-bottom:2px solid #e2e8f0;">

                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th class="text-center">Kuis Bab A</th>
                            <th class="text-center">Kuis Bab B</th>
                            <th class="text-center">Kuis Bab C</th>
                            <th class="text-center">Kuis Bab D</th>
                            <th class="text-center">Nilai Evaluasi</th>
                            <th class="text-center">Rata-rata</th>
                            <th class="text-center">Reset Percobaan</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($rows as $row)
                            <tr class="table-row-custom">

                                <td>{{ $row['no'] }}</td>

                                <td>{{ $row['nama'] }}</td>

                                <td>{{ $row['kelas'] }}</td>

                                <td class="text-center">
                                    {{ $row['kuis_a'] !== null ? number_format($row['kuis_a'], 0) : '-' }}
                                </td>

                                <td class="text-center">
                                    {{ $row['kuis_b'] !== null ? number_format($row['kuis_b'], 0) : '-' }}
                                </td>

                                <td class="text-center">
                                    {{ $row['kuis_c'] !== null ? number_format($row['kuis_c'], 0) : '-' }}
                                </td>

                                <td class="text-center">
                                    {{ $row['kuis_d'] !== null ? number_format($row['kuis_d'], 0) : '-' }}
                                </td>

                                <td class="text-center">
                                    {{ $row['evaluasi'] !== null ? number_format($row['evaluasi'], 0) : '-' }}
                                </td>

                                <td class="text-center fw-semibold">
                                    {{ $row['rata_rata'] !== null ? number_format($row['rata_rata'], 0) : '-' }}
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-warning dropdown-toggle fw-semibold" type="button"
                                            data-bs-toggle="dropdown">
                                            Reset Kuis
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                            @php
                                                $daftarKuis = [
                                                    1 => 'Kuis Bab A',
                                                    2 => 'Kuis Bab B',
                                                    3 => 'Kuis Bab C',
                                                    4 => 'Kuis Bab D',
                                                    5 => 'Evaluasi',
                                                ];
                                            @endphp

                                            @foreach ($daftarKuis as $quizId => $namaKuis)
                                                <li>
                                                    <form method="POST"
                                                        action="{{ route('guru.quiz.reset-percobaan', [
                                                            'studentId' => $row['student_id'],
                                                            'quizId' => $quizId,
                                                        ]) }}"
                                                        onsubmit="return confirm(
                            'Yakin ingin mereset percobaan {{ $namaKuis }} milik {{ $row['nama'] }}?'
                        )">
                                                        @csrf
                                                        @method('PATCH')

                                                        <button type="submit" class="dropdown-item">
                                                            {{ $namaKuis }}
                                                        </button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="10" class="text-center py-4 text-muted">

                                    Belum ada data nilai siswa.

                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <nav aria-label="Navigasi halaman rekap" class="mt-3">
                <div class="d-flex justify-content-end">
                    {{ $siswas->links() }}
                </div>
            </nav>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        .table-row-custom:hover {
            background-color: #f8fafc !important;
            transition: .15s ease-in-out;
        }

        table td,
        table th {
            vertical-align: middle;
            font-size: 15px;
        }

        .pagination .page-link {
            border-radius: 999px;
            margin-left: 4px;
            margin-right: 4px;
            color: var(--primary-dark);
            border-color: #d0d7e2;
        }

        .pagination .page-link:hover {
            background-color: #e6f3ff;
            border-color: #c0d4f5;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            color: #9ca3af;
        }

        @media (max-width:768px) {

            h3 {
                font-size: 22px;
            }

            table td,
            table th {
                font-size: 13px;
                padding: 10px 8px !important;
            }

            .badge {
                font-size: 11px;
            }

            .card-body {
                padding: 1rem;
            }

            form {
                max-width: 100% !important;
            }

            .btn {
                font-size: 13px;
                padding: 8px 12px;
            }

            .pagination {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
@endpush
