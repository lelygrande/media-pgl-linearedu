@extends('layout.layoutguru')

@section('title', 'Rekapitulasi Nilai')

@section('content')
    <h3 class="fw-bold mb-4" style="color: var(--primary-dark);">Rekapitulasi Nilai Siswa</h3>

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

        <form method="GET" action="{{ route('rekapitulasi-nilai') }}" style="max-width: 320px; width: 100%;">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari nama siswa..."
                value="{{ request('search') }}"
                style="border-radius: 999px;"
            >
        </form>

        <div class="d-flex gap-2">
            <button class="btn fw-semibold" style="background-color: #dc3545; color: #fff; border-radius: 8px;">
                Export ke PDF
            </button>
            <button class="btn fw-semibold" style="background-color: #198754; color: #fff; border-radius: 8px;">
                Export ke Excel
            </button>
        </div>
    </div>

    <div class="card shadow-sm mb-3" style="border-radius: 16px;">
        <div class="card-body">

            <div class="table-responsive" style="overflow-x: auto; overflow-y: auto;">
                <table class="table table-borderless align-middle table-nilai"
                    style="border-radius: 12px; overflow: hidden;">
                    <thead style="background-color: #f1f5f9; border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th class="py-3 px-3">No</th>
                            <th class="py-3 px-3">Nama</th>
                            <th class="py-3 px-3">Kelas</th>
                            <th class="py-3 px-3 text-center">Kuis Bab A</th>
                            <th class="py-3 px-3 text-center">Kuis Bab B</th>
                            <th class="py-3 px-3 text-center">Kuis Bab C</th>
                            <th class="py-3 px-3 text-center">Kuis Bab D</th>
                            <th class="py-3 px-3 text-center">Nilai Evaluasi</th>
                            <th class="py-3 px-3 text-center">Rata-rata</th>
                            <th class="py-3 px-3 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rows as $row)
                            <tr class="table-row-custom">
                                <td class="py-3 px-3">{{ $row['no'] }}</td>
                                <td class="py-3 px-3">{{ $row['nama'] }}</td>
                                <td class="py-3 px-3">{{ $row['kelas'] }}</td>
                                <td class="py-3 px-3 text-center">{{ $row['kuis_a'] ?? '-' }}</td>
                                <td class="py-3 px-3 text-center">{{ $row['kuis_b'] ?? '-' }}</td>
                                <td class="py-3 px-3 text-center">{{ $row['kuis_c'] ?? '-' }}</td>
                                <td class="py-3 px-3 text-center">{{ $row['kuis_d'] ?? '-' }}</td>
                                <td class="py-3 px-3 text-center">{{ $row['evaluasi'] ?? '-' }}</td>
                                <td class="py-3 px-3 text-center fw-semibold">{{ $row['rata_rata'] ?? '-' }}</td>
                                <td class="py-3 px-3 text-center">
                                    @if ($row['status'] === 'Tuntas')
                                        <span class="badge bg-success">{{ $row['status'] }}</span>
                                    @elseif ($row['status'] === 'Belum Tuntas')
                                        <span class="badge bg-danger">{{ $row['status'] }}</span>
                                    @elseif ($row['status'] === 'Perlu Perbaikan')
                                        <span class="badge bg-warning text-dark">{{ $row['status'] }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $row['status'] }}</span>
                                    @endif
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
            transition: 0.15s ease-in-out;
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
    </style>
@endpush
