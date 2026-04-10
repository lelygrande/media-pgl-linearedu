@extends('layout.layoutguru')

@section('title', 'Dashboard Guru')

@section('content')
    <h3 class="fw-bold mb-4" style="color: var(--primary-dark);">Dashboard Guru</h3>
    <p class="text-muted">
        Selamat datang kembali, {{ auth('guru')->user()->nama }} 👋
    </p>

    {{-- ROW 1: STAT CARDS --}}
    <div class="row g-3 mb-4">
        {{-- Card 1: Jumlah Siswa --}}
        <div class="col-md-6">
            <div class="card shadow-sm h-100" style="border-radius: 16px;">
                <div class="card-body">
                    <h5 class="fw-bold mb-2">Jumlah Siswa</h5>
                    <h2 class="fw-bold mb-1" style="color: var(--primary-dark);">
                        {{ $totalSiswa ?? 32 }}
                    </h2>
                    <p class="text-muted mb-0">Siswa terdaftar dalam kelas</p>
                </div>
            </div>
        </div>

        {{-- Card 2: Pengunjung Hari Ini --}}
        <div class="col-md-6">
            <div class="card shadow-sm h-100" style="border-radius: 16px;">
                <div class="card-body">
                    <h5 class="fw-bold mb-2">Kunjungan Hari Ini</h5>
                    <h2 class="fw-bold mb-1" style="color: var(--primary-dark);">
                        {{ $visitorToday ?? 18 }}
                    </h2>
                    <p class="text-muted mb-0">Siswa yang mengakses LinearEdu hari ini</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ROW 2: DIAGRAM BATANG RATA-RATA NILAI per SUBBAB --}}
    <div class="card shadow-sm mb-4" style="border-radius: 16px;">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">Rata-rata Nilai per Subbab</h5>
                <small class="text-muted">Data contoh, bisa dihubungkan ke database</small>
            </div>
            <canvas id="avgSubbabChart" style="max-height: 260px;"></canvas>
        </div>
    </div>

    {{-- ROW 3: TABEL AKTIVITAS SISWA --}}
    <div class="card shadow-sm" style="border-radius: 16px;">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">Aktivitas Siswa Terbaru</h5>
                <a href="#" class="btn btn-sm fw-semibold"
                    style="background-color: var(--primary-color); color: #fff; border-radius: 999px;">
                    Lihat semua
                </a>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Materi</th>
                            <th>Status</th>
                            <th>Lama Waktu di Web</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Contoh 5 data terbaru (nanti bisa diganti loop dari DB) --}}
                        <tr>
                            <td>Andi</td>
                            <td>Bab A - Bentuk Umum</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                            <td>25 menit</td>
                            <td>Hari ini, 09.10</td>
                        </tr>
                        <tr>
                            <td>Siti</td>
                            <td>Bab B - Gradien</td>
                            <td><span class="badge bg-warning text-dark">Sedang belajar</span></td>
                            <td>18 menit</td>
                            <td>Hari ini, 08.55</td>
                        </tr>
                        <tr>
                            <td>Budi</td>
                            <td>Bab C - Sifat Gradien</td>
                            <td><span class="badge bg-danger">Belum selesai</span></td>
                            <td>10 menit</td>
                            <td>Hari ini, 08.30</td>
                        </tr>
                        <tr>
                            <td>Dewi</td>
                            <td>Bab D - Persamaan Garis</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                            <td>30 menit</td>
                            <td>Kemarin, 15.20</td>
                        </tr>
                        <tr>
                            <td>Rizky</td>
                            <td>Bab B - Gradien</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                            <td>22 menit</td>
                            <td>Kemarin, 14.05</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Chart.js untuk diagram batang --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('avgSubbabChart').getContext('2d');

        // Contoh label subbab dan data rata-rata nilai (nanti bisa di-override dari controller)
        const labels = {!! json_encode($labelsSubbab ?? ['A1', 'A2', 'B1', 'B2', 'C1', 'D1']) !!};
        const dataValues = {!! json_encode($avgSubbab ?? [80, 75, 78, 82, 70, 76]) !!};

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Rata-rata Nilai',
                    data: dataValues,
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
