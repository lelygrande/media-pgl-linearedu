@extends('layout.layoutguru')

@section('title', 'Daftar Siswa')

@section('content')

    <h3 class="fw-bold mb-4" style="color: var(--primary-dark);">Daftar Siswa</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius:12px;">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius:12px;">
            <b>Gagal menyimpan:</b>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

        <div class="d-flex gap-2 align-items-center flex-wrap">

            <div class="dropdown">
                <button class="btn fw-semibold dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    style="background-color:#64748b;color:#fff;border-radius:8px;">
                    Export
                </button>

                <ul class="dropdown-menu shadow-sm" style="border-radius:10px;">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2"
                            href="{{ route('guru.daftarsiswa.export.pdf') }}">
                            <i class="bi bi-file-earmark-pdf text-danger"></i>
                            Export as PDF
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2"
                            href="{{ route('guru.daftarsiswa.export.excel') }}">
                            <i class="bi bi-file-earmark-excel text-success"></i>
                            Export as Excel
                        </a>
                    </li>
                </ul>

            </div>

            <form method="GET" action="{{ route('daftarsiswa.index') }}"
                class="d-flex align-items-center gap-2 flex-wrap">
                <select name="kelas" class="form-select" style="width:160px;" onchange="this.form.submit()">
                    <option value="">Semua Kelas</option>
                    <option value="8A" {{ request('kelas') == '8A' ? 'selected' : '' }}>8A</option>
                    <option value="8B" {{ request('kelas') == '8B' ? 'selected' : '' }}>8B</option>
                    <option value="8C" {{ request('kelas') == '8C' ? 'selected' : '' }}>8C</option>
                </select>

                @if (request('kelas'))
                    <a href="{{ route('daftarsiswa.index') }}" class="btn btn-palet">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <button class="btn fw-semibold" data-bs-toggle="modal" data-bs-target="#modalTambahSiswa"
            style="background-color:var(--primary-color);color:#fff;border-radius:8px;">

            Tambah Siswa

        </button>

    </div>

    <div class="card shadow-sm mb-3" style="border-radius:16px;">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-borderless align-middle">

                    <thead style="background-color:#f1f5f9;border-bottom:2px solid #e2e8f0;">

                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Email</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th class="text-center">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($siswas as $index => $siswa)
                            <tr class="table-row-custom">

                                <td>{{ $siswas->firstItem() + $index }}</td>

                                <td>{{ $siswa->nama }}</td>

                                <td>{{ $siswa->nis }}</td>

                                <td>{{ $siswa->email }}</td>

                                <td>{{ $siswa->kelas }}</td>

                                <td>{{ $siswa->jenis_kelamin }}</td>

                                <td class="text-center">

                                    <button type="button" class="btn btn-sm text-white btn-edit"
                                        data-id="{{ $siswa->id }}" data-bs-toggle="modal"
                                        data-bs-target="#modalEditSiswa"
                                        style="background-color:var(--primary-color);border-radius:6px;">

                                        <i class="bi bi-pencil-square"></i>
                                        Edit

                                    </button>

                                    <form action="{{ route('guru.daftarsiswa.destroy', $siswa->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin mau hapus siswa ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm text-white"
                                            style="background-color:#dc3545;border-radius:6px;">

                                            <i class="bi bi-trash"></i>
                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="mt-3 d-flex justify-content-end">
                {{ $siswas->links() }}
            </div>

        </div>

    </div>

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

        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
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

            .btn {
                font-size: 12px;
                padding: 6px 10px;
            }

            .card-body {
                padding: 1rem;
            }

            .pagination {
                flex-wrap: wrap;
                justify-content: center;
            }

            .form-select {
                width: 100% !important;
            }
        }
    </style>

    <script>
        function togglePassword() {

            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('iconEye');

            if (passwordInput.type === 'password') {

                passwordInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');

            } else {

                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');

            }
        }

        document.querySelectorAll('.btn-edit').forEach(btn => {

            btn.addEventListener('click', async function() {

                const id = this.dataset.id;

                const response = await fetch(`/guru/siswa/${id}`);
                const data = await response.json();

                document.getElementById('edit_nama').value = data.nama;
                document.getElementById('edit_email').value = data.email;
                document.getElementById('edit_kelas').value = data.kelas;
                document.getElementById('edit_nis').value = data.nis;
                document.getElementById('edit_jk').value = data.jenis_kelamin;

                document.getElementById('formEditSiswa').action = `/guru/siswa/${id}`;

            });

        });

        setTimeout(() => {

            const alert = document.querySelector('.alert');

            if (alert) {

                alert.classList.remove('show');
                alert.classList.add('fade');

            }

        }, 3000);
    </script>

@endsection
