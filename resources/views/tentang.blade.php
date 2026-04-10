@extends('layout.navbar')

@section('title', 'Tentang')

@section('content')
    <div class="container py-5">
        {{-- Judul Halaman --}}
        <h1 class="fw-bold mb-4">Tentang</h1>

        {{-- Deskripsi Singkat --}}
        <p class="mb-3">
            Media pembelajaran ini dibuat untuk memenuhi persyaratan dalam menyelesaikan Program Strata-1
            Pendidikan Komputer dengan topik materi <strong>Persamaan Garis Lurus</strong>.
        </p>
        <p class="mb-4">
            "Pengembangan Media Pembelajaran Interaktif Berbantuan Geogebra dan P5.js pada Materi Persamaan Garis Lurus
            untuk Kelas VIII"
        </p>

        <div class="row g-4">

            {{-- Card Informasi Media (Full Width) --}}
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
                                Russeffendi. (2010). <em>Pengantar kepada Membantu Guru Mengembangkan
                                Kompetensinya dalam Pengajaran Matematika untuk Meningkatkan CBSA</em>.
                                Bandung: Tarsito.
                            </li>
                            <li class="mb-2">
                                Suherman, E., dkk. (2003). <em>Strategi Pembelajaran Matematika Kontemporer</em>.
                                Bandung: JICA – Universitas Pendidikan Indonesia.
                            </li>
                            <li class="mb-2">
                                Kementerian Pendidikan dan Kebudayaan. (2017). <em>Buku Guru Matematika
                                SMP Kelas VIII Kurikulum 2013 Revisi</em>. Jakarta: Kemendikbud.
                            </li>
                            <li>
                                Sumber gambar ilustrasi diambil dari Freepik (www.freepik.com) dengan lisensi free
                                untuk keperluan pendidikan.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
