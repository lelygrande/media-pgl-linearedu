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
@endsection

@section('nav')
    <a href="#" class="btn btn-prev px-4 rounded-pill invisible">
        ← Prev
    </a>
    {{-- ganti route next sesuai strukturmu --}}
    <a href="{{ route('apersepsi1') }}" class="btn btn-next px-4 rounded-pill fw-semibold">
        Next →
    </a>
@endsection
