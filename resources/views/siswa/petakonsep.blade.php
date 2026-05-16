@extends('layout.halaman-materi')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            Selamat datang, <b>{{ auth('siswa')->user()->nama }}</b><br>
        </div>
    @endif

    <h1 class="mb-4" style="font-weight:600;">Peta Konsep</h1>

    <div class="card shadow-sm border-0 rounded-4 p-3 text-center">
        <img src="{{ asset('img/peta konsep.png') }}" alt="Peta Konsep Garis Lurus" class="img-fluid rounded-3">
    </div>

    <h1 class="mb-4" style="font-weight:600;">Pendahuluan</h1>

    <div class="card shadow-sm border-0 rounded-4 p-4 mb-4">
        <div class="text-center mb-4">
            <img src="{{ asset('img/pendahuluan.jpg') }}" alt="Pendahuluan Garis Lurus" class="img-fluid rounded-3"
                style="max-width: 650px;">
        </div>

        <p class="text-start" style="line-height: 1.8; text-align: justify;">
            Pernahkah kalian berjalan atau bersepeda di jalan yang menanjak atau menurun?
            Rasanya pasti berbeda dibandingkan saat berjalan di jalan yang datar, bukan?
            Ketika menaiki bukit harus lebih kuat mengayuh, sedangkan saat menurun sepeda
            terasa meluncur sendiri tanpa banyak tenaga. Nah, sebenarnya jalan-jalan seperti itu
            tidak dibuat sembarangan, lho. Ada perhitungan khusus agar kemiringannya pas,
            sehingga tidak terlalu curam tapi juga tidak terlalu landai.
        </p>

        <p class="text-start" style="line-height: 1.8; text-align: justify;">
            Hal yang sama juga dilakukan oleh arsitek ketika mendesain tangga atau tempat parkir
            bertingkat. Mereka harus memastikan kemiringannya nyaman dan aman digunakan.
            Kalau terlalu curam, bisa berbahaya; kalau terlalu datar, malah memakan terlalu banyak tempat.
        </p>

        <p class="text-start" style="line-height: 1.8; text-align: justify;">
            Dari situ, kita bisa lihat bahwa dalam kehidupan sehari-hari, banyak hal yang berkaitan
            dengan garis miring atau kemiringan. Nah, hari ini kita akan belajar bagaimana cara
            menggambarkan dan menentukan persamaan garis lurus, memahami kemiringan garis,
            serta bagaimana konsep ini bisa membantu kita menyelesaikan berbagai masalah dalam
            kehidupan nyata.
        </p>
    </div>
@endsection

@section('nav')
    <a href="#" class="btn btn-prev px-4 rounded-pill invisible">
        ← Prev
    </a>

    <a href="{{ route('apersepsi1') }}" class="btn btn-next px-4 rounded-pill fw-semibold">
        Next →
    </a>
@endsection
