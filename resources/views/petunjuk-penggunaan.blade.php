@extends('layout.navbar')

@section('title', 'Petunjuk Penggunaan')

@section('content')
    <div class="container py-5">
        <h1 class="fw-bold mb-4">Petunjuk Penggunaan</h1>

        <div class="guide-section">

            {{-- Kotak 1 --}}
            <div class="mb-4">
                <button class="guide-toggle w-100 d-flex justify-content-between align-items-center"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#petunjukSiswa"
                        aria-expanded="false">
                    <span>Cara Pemakaian untuk Siswa</span>
                    <span class="guide-arrow">&#9662;</span>
                </button>

                <div id="petunjukSiswa" class="collapse mt-2">
                    <div class="guide-content">
                        {{-- Isi teks bisa kamu ubah kapan saja --}}
                        <ol class="mb-0">
                            <li>Buka halaman <strong>Beranda</strong> dan pilih tombol <strong>Mulai Belajar</strong>.</li>
                            <li>Pilih subbab yang ingin dipelajari pada menu di sebelah kiri.</li>
                            <li>Baca materi, perhatikan contoh, lalu kerjakan latihan/kuis yang tersedia.</li>
                            <li>Jika sudah selesai, lanjutkan ke subbab berikutnya sampai semua materi tuntas.</li>
                        </ol>
                    </div>
                </div>
            </div>

            {{-- Kotak 2 --}}
            <div class="mb-4">
                <button class="guide-toggle w-100 d-flex justify-content-between align-items-center"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#petunjukGuru"
                        aria-expanded="false">
                    <span>Cara Pemakaian untuk Guru</span>
                    <span class="guide-arrow">&#9662;</span>
                </button>

                <div id="petunjukGuru" class="collapse mt-2">
                    <div class="guide-content">
                        {{-- Isi teks juga bebas kamu ganti --}}
                        <ol class="mb-0">
                            <li>Masuk ke <strong>Halaman Guru</strong> menggunakan akun yang telah terdaftar.</li>
                            <li>Gunakan menu <strong>Daftar Siswa</strong> untuk menambah dan mengelola data siswa.</li>
                            <li>Lihat nilai dan hasil kuis di menu <strong>Rekapitulasi Nilai</strong>.</li>
                            <li>Pantau perkembangan belajar siswa melalui menu <strong>Progress Siswa</strong>.</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('styles')
<style>
    .guide-toggle {
        background-color: #4fa6be;
        color: #ffffff;
        border: none;
        border-radius: 12px;
        padding: 14px 20px;
        font-weight: 700;
        font-size: 1.05rem;
        box-shadow: 0 3px 6px rgba(0,0,0,0.08);
    }

    .guide-toggle:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(1,135,184,0.35);
    }

    .guide-arrow {
        font-size: 1.1rem;
    }

    .guide-content {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 18px 20px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.06);
        font-size: 0.98rem;
    }
</style>
@endpush
