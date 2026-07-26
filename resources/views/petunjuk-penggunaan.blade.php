@extends('layout.navbar')

@section('title', 'Petunjuk Penggunaan')

@section('content')
    <div class="guide-page">
        <div class="container py-5">

            <div class="guide-header text-center mb-5">
                <h1 class="fw-bold mb-2">Petunjuk Penggunaan Siswa</h1>
                <p class="mb-0">
                    Panduan ini berisi langkah-langkah penggunaan media pembelajaran interaktif
                    <strong>Linear Edu</strong> untuk membantu siswa mempelajari materi Persamaan Garis Lurus.
                </p>
            </div>

            <div class="guide-card">

                <h4 class="guide-subtitle">A. Petunjuk Umum Penggunaan Media</h4>

                <ol class="guide-list">
                    <li>
                        Siswa membuka media pembelajaran melalui link website yang telah diberikan oleh guru.
                        Pastikan perangkat yang digunakan terhubung dengan jaringan internet.
                    </li>

                    <li>
                        Siswa masuk menggunakan akun yang telah disediakan. Setelah berhasil login,
                        siswa akan diarahkan ke halaman utama media pembelajaran.
                    </li>

                    <li>
                        Sebelum memulai pembelajaran, siswa disarankan membaca halaman
                        <strong>Petunjuk Penggunaan</strong> agar memahami cara menggunakan media.
                    </li>

                    <li>
                        Siswa memilih menu <strong>Beranda</strong>, kemudian menekan tombol
                        <strong>Mulai Belajar</strong> untuk masuk ke halaman materi.
                    </li>

                    <li>
                        Siswa mempelajari materi sesuai urutan subbab yang tersedia.
                        Bacalah setiap penjelasan dengan teliti, perhatikan contoh yang diberikan,
                        dan ikuti setiap instruksi pada media.
                    </li>

                    <li>
                        Pada bagian contoh interaktif, siswa dapat mengamati langkah-langkah penyelesaian soal
                        secara bertahap. Klik bagian yang tersedia apabila media menyediakan penjelasan tambahan.
                    </li>

                    <li>
                        Setelah mempelajari materi dan contoh, siswa mengerjakan latihan yang tersedia.
                        Latihan digunakan untuk membantu siswa memahami materi sebelum melanjutkan ke kuis.
                    </li>

                    <li>
                        Kuis dapat dikerjakan setelah siswa menyelesaikan bagian latihan sesuai ketentuan
                        pada media. Apabila jawaban latihan belum tepat, siswa perlu memperbaiki jawabannya
                        terlebih dahulu.
                    </li>

                    <li>
                        Setelah kuis selesai dikerjakan, siswa dapat melihat hasil atau skor yang diperoleh.
                        Hasil tersebut dapat digunakan sebagai bahan evaluasi pemahaman terhadap materi.
                    </li>

                    <li>
                        Jika materi, latihan, dan kuis pada satu bagian telah selesai, siswa dapat melanjutkan
                        ke bagian berikutnya sesuai arahan pada media.
                    </li>

                    <li>
                        Setelah selesai menggunakan media, siswa dapat menekan tombol
                        <strong>Logout</strong> untuk keluar dari akun.
                    </li>
                </ol>

                <h4 class="guide-subtitle mt-5">B. Tampilan Halaman Belajar Siswa</h4>

                <p class="guide-paragraph">
                    Berikut adalah tampilan halaman belajar siswa pada media pembelajaran interaktif.
                    Setiap nomor pada gambar menunjukkan bagian penting yang digunakan selama proses pembelajaran.
                </p>

                <div class="guide-image-wrap">
                    <img src="{{ asset('img/petunjuk-penggunaan-siswa.png') }}"
                         alt="Petunjuk penggunaan halaman siswa"
                         class="guide-image">
                </div>

                <div class="guide-caption">
                    Gambar tampilan halaman belajar siswa
                </div>

                <div class="guide-info-box mt-4">
                    <h5 class="fw-bold mb-3">Keterangan Gambar:</h5>

                    <ol class="guide-list mb-0">
                        <li>
                            <strong>Menu Materi/Subbab</strong><br>
                            Bagian ini digunakan untuk memilih materi atau subbab yang ingin dipelajari.
                            Siswa dapat membuka bagian pengantar, materi, contoh, latihan, dan kuis melalui menu ini.
                        </li>

                        <li>
                            <strong>Area Isi Materi</strong><br>
                            Bagian ini menampilkan isi pembelajaran, seperti tujuan pembelajaran,
                            penjelasan materi, contoh soal, eksplorasi, latihan, dan kuis.
                        </li>

                        <li>
                            <strong>Tombol Navigasi</strong><br>
                            Tombol <strong>Prev</strong> digunakan untuk kembali ke halaman sebelumnya,
                            sedangkan tombol <strong>Next</strong> digunakan untuk melanjutkan ke halaman berikutnya.
                        </li>

                        <li>
                            <strong>Navbar/Menu Utama</strong><br>
                            Bagian ini berisi menu utama, seperti <strong>Beranda</strong>,
                            <strong>Petunjuk Penggunaan</strong>, <strong>Progress Belajar</strong>,
                            dan tombol <strong>Logout</strong>.
                        </li>
                    </ol>
                </div>

                <div class="guide-note mt-4">
                    <strong>Catatan:</strong>
                    Gunakan perangkat seperti laptop, tablet, atau handphone dengan koneksi internet yang stabil.
                    Bacalah setiap instruksi pada media sebelum mengerjakan latihan atau kuis.
                    Jika mengalami kendala saat menggunakan media, siswa dapat bertanya kepada guru.
                </div>

            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .guide-page {
        min-height: calc(100vh - 90px);
        background: #f7fbff;
    }

    .guide-header h1 {
        color: #1f2933;
        font-size: 2.2rem;
    }

    .guide-header p {
        color: #5b6770;
        font-size: 1rem;
        max-width: 850px;
        margin: 0 auto;
        line-height: 1.7;
    }

    .guide-card {
        max-width: 1050px;
        margin: 0 auto;
        background-color: #ffffff;
        border-radius: 18px;
        padding: 30px 34px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.08);
        color: #25313b;
    }

    .guide-subtitle {
        font-size: 1.25rem;
        font-weight: 700;
        color: #236b84;
        margin-bottom: 16px;
    }

    .guide-list {
        padding-left: 22px;
        margin-bottom: 0;
    }

    .guide-list li {
        margin-bottom: 12px;
        line-height: 1.7;
        text-align: justify;
    }

    .guide-paragraph {
        line-height: 1.7;
        text-align: justify;
        margin-bottom: 16px;
    }

    .guide-image-wrap {
        width: 100%;
        background: #f2f6fb;
        border: 1px solid #dbe7f3;
        border-radius: 14px;
        padding: 14px;
        overflow-x: auto;
    }

    .guide-image {
        width: 100%;
        max-width: 100%;
        height: auto;
        display: block;
        border-radius: 10px;
    }

    .guide-caption {
        text-align: center;
        font-size: 0.92rem;
        color: #6b7280;
        margin-top: 8px;
        font-style: italic;
    }

    .guide-info-box {
        background: #eef7fb;
        border-left: 5px solid #4fa6be;
        border-radius: 12px;
        padding: 18px 20px;
    }

    .guide-note {
        background: #fff8df;
        border-left: 5px solid #f0c43c;
        border-radius: 12px;
        padding: 14px 18px;
        line-height: 1.7;
        text-align: justify;
    }

    @media (max-width: 768px) {
        .guide-page {
            min-height: calc(100vh - 70px);
        }

        .container {
            padding-left: 18px;
            padding-right: 18px;
        }

        .guide-header h1 {
            font-size: 1.75rem;
        }

        .guide-card {
            padding: 24px 20px;
            border-radius: 16px;
        }

        .guide-subtitle {
            font-size: 1.12rem;
        }

        .guide-list {
            padding-left: 18px;
        }

        .guide-list li {
            margin-bottom: 10px;
            line-height: 1.65;
        }

        .guide-image-wrap {
            padding: 10px;
        }
    }

    @media (max-width: 480px) {
        .guide-header h1 {
            font-size: 1.55rem;
        }

        .guide-header p {
            font-size: 0.92rem;
        }

        .guide-card {
            padding: 20px 15px;
        }

        .guide-info-box,
        .guide-note {
            padding: 14px 15px;
        }
    }
</style>
@endpush
