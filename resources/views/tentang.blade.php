@extends('layout.navbar')

@section('title', 'Tentang')

@section('content')
    <div class="container py-5">
        {{-- Judul Halaman --}}
        <h1 class="fw-bold mb-4">Tentang</h1>

        {{-- Deskripsi Singkat --}}
        <p class="mb-3">
            Media pembelajaran ini dibuat untuk memenuhi persyaratan dalam menyelesaikan Program Strata-1
            Pendidikan Komputer dengan topik materi <strong>Persamaan Garis Lurus</strong> dengan judul:
        </p>
        <p class="mb-4">
            "Pengembangan Media Pembelajaran Interaktif Berbantuan Geogebra dan P5.js pada Materi Persamaan Garis Lurus
            untuk Kelas VIII"
        </p>

        <div class="row g-4">
            {{-- Daftar Pustaka --}}

            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header text-white fw-semibold" style="background-color: var(--primary-dark)">
                        Informasi Media
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" class="w-25 align-top">Judul Media</th>
                                    <td>Media Pembelajaran Interaktif Persamaan Garis Lurus</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-top">Nama Pengembang</th>
                                    <td>Nurleli</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-top">Email</th>
                                    <td>2210131220005@mhs.ulm.ac.id</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-top">No Hp</th>
                                    <td>+6283142229060</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-top">Dosen Pembimbing 1</th>
                                    <td>Dr. R. Ati Sukmawati M.Kom</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-top">Dosen Pembimbing 2</th>
                                    <td>Muhammad Hifdzi Adini, S.Kom, M.T</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-top">Jurusan</th>
                                    <td>S1 Pendidikan Komputer</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-top">Fakultas</th>
                                    <td>Fakultas Keguruan dan Ilmu Pendidikan</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-top">Instansi</th>
                                    <td>Universitas Lambung Mangkurat</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-top">Tahun</th>
                                    <td>2026</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Card Daftar Pustaka (Full Width) --}}
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header text-white fw-semibold" style="background-color: var(--primary-dark)">
                        Daftar Pustaka
                    </div>

                    <div class="card-body">
                        <ol class="mb-0 ps-3">
                            <li class="mb-2">
                                Agus, N. A. (2008). <em>Mudah Belajar Matematika 2: Untuk Kelas VIII Sekolah Menengah
                                    Pertama/Madrasah Tsanawiyah</em>. Jakarta: Pusat Perbukuan, Departemen Pendidikan
                                Nasional.
                            </li>

                            <li class="mb-2">
                                As'ari, A. R., Tohir, M., Valentino, E., Imron, Z., &amp; Taufiq, I. (2017).
                                <em>Matematika untuk SMP/MTs Kelas VIII Semester I (Edisi Revisi)</em>.
                                Jakarta: Kementerian Pendidikan dan Kebudayaan.
                            </li>

                            <li class="mb-2">
                                Dris, J., &amp; Tasari. (2011). <em>Matematika: untuk SMP dan MTs Kelas VIII</em>.
                                Jakarta: Pusat Kurikulum dan Perbukuan, Kementerian Pendidikan Nasional.
                            </li>

                            <li class="mb-2">
                                Nugroho, H., &amp; Meisaroh, L. (2009). <em>Matematika 2: SMP dan MTs Kelas VIII</em>.
                                Jakarta: Pusat Perbukuan, Departemen Pendidikan Nasional.
                            </li>

                            <li>
                                Tohir, M., As'ari, A. R., Anam, A. C., &amp; Taufiq, I. (2022).
                                <em>Matematika untuk SMP/MTs Kelas VIII</em>. Jakarta: Pusat Perbukuan,
                                Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi.
                                Diakses dari
                                <a href="https://buku.kemdikbud.go.id" target="_blank">
                                    https://buku.kemdikbud.go.id
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
