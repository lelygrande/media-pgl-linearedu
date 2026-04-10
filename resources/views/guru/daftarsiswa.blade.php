@extends('layout.layoutguru')

@section('title', 'Daftar Siswa')

@section('content')

    <h3 class="fw-bold mb-4" style="color: var(--primary-dark);">Daftar Siswa</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 12px;">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex gap-2 align-items-center">
            <div class="dropdown">
                <button class="btn fw-semibold dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false" style="background-color: #64748b; color: #fff; border-radius: 8px;">
                    Export
                </button>

                <ul class="dropdown-menu shadow-sm" style="border-radius: 10px;">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2"
                            href="{{ route('guru.daftarsiswa.export.pdf') }}">
                            <i class="bi bi-file-earmark-pdf text-danger"></i> Export as PDF
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2"
                            href="{{ route('guru.daftarsiswa.export.excel') }}">
                            <i class="bi bi-file-earmark-excel text-success"></i> Export as Excel
                        </a>
                    </li>
                </ul>
            </div>

            <form method="GET" action="{{ route('daftarsiswa.index') }}" class="d-flex align-items-center gap-2">
                <select name="kelas" class="form-select" style="width: 160px;" onchange="this.form.submit()">
                    <option value="">Semua Kelas</option>
                    <option value="8A" {{ request('kelas') == '8A' ? 'selected' : '' }}>8A</option>
                    <option value="8B" {{ request('kelas') == '8B' ? 'selected' : '' }}>8B</option>
                    <option value="8C" {{ request('kelas') == '8C' ? 'selected' : '' }}>8C</option>
                </select>

                @if (request('kelas'))
                    <a href="{{ route('daftarsiswa.index') }}" class="btn btn-outline-secondary">
                        Reset
                    </a>
                @endif
            </form>

        </div>

        <button class="btn fw-semibold" data-bs-toggle="modal" data-bs-target="#modalTambahSiswa"
            style="background-color: var(--primary-color); color: #fff; border-radius: 8px;">
            Tambah Siswa
        </button>
    </div>

    {{-- AREA TABEL --}}
    <div class="card shadow-sm mb-3" style="border-radius: 16px;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless align-middle" style="border-radius: 12px; overflow: hidden;">
                    <thead style="background-color: #f1f5f9; border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th class="py-3 px-3">No</th>
                            <th class="py-3 px-3">Nama</th>
                            <th class="py-3 px-3">NIS</th>
                            <th class="py-3 px-3">Email</th>
                            <th class="py-3 px-3">Kelas</th>
                            <th class="py-3 px-3">Jenis Kelamin</th>
                            <th class="py-3 px-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($siswas as $index => $siswa)
                            <tr class="table-row-custom">
                                <td class="py-3 px-3">{{ $siswas->firstItem() + $index }}</td>
                                <td class="py-3 px-3">{{ $siswa->nama }}</td>
                                <td class="py-3 px-3">{{ $siswa->nis }}</td>
                                <td class="py-3 px-3">{{ $siswa->email }}</td>
                                <td class="py-3 px-3">{{ $siswa->kelas }}</td>
                                <td class="py-3 px-3">{{ $siswa->jenis_kelamin }}</td>

                                <td class="py-3 px-3 text-center">

                                    <button type="button" class="btn btn-sm text-white btn-edit"
                                        data-id="{{ $siswa->id }}" data-bs-toggle="modal"
                                        data-bs-target="#modalEditSiswa"
                                        style="background-color: var(--primary-color); border-radius: 6px;">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>

                                    <form action="{{ route('guru.daftarsiswa.destroy', $siswa->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin mau hapus siswa ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm text-white"
                                            style="background-color: #dc3545; border-radius: 6px;">
                                            <i class="bi bi-trash"></i> Delete
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

    <!-- Modal Tambah Siswa -->
    <div class="modal fade" id="modalTambahSiswa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('guru.daftarsiswa.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">

                            {{-- NIS --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIS</label>
                                <input type="text" name="nis" class="form-control" required>
                            </div>

                            {{-- Nama --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            {{-- Kelas --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kelas</label>
                                <select name="kelas" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="8A">8A</option>
                                    <option value="8B">8B</option>
                                    <option value="8C">8C</option>
                                </select>
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            {{-- Password --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" required>

                                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                        <i class="bi bi-eye" id="iconEye"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Siswa -->
    <div class="modal fade" id="modalEditSiswa" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formEditSiswa" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" id="edit_nama" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id="edit_email" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIS</label>
                                <input type="text" name="nis" id="edit_nis" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kelas</label>
                                <select name="kelas" id="edit_kelas" class="form-control" required>
                                    <option value="8A">8A</option>
                                    <option value="8B">8B</option>
                                    <option value="8C">8C</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="edit_jk" class="form-control" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password (opsional)</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Kosongkan jika tidak diubah">
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    {{-- CUSTOM STYLE --}}
    <style>
        .table-row-custom:hover {
            background-color: #f8fafc !important;
            /* hover soft gray */
            transition: 0.15s ease-in-out;
        }

        table td,
        table th {
            vertical-align: middle;
            font-size: 15px;
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

        // Untuk menyimpan update
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', async function() {
                const id = this.dataset.id;

                // fetch data siswa
                const response = await fetch(`/guru/siswa/${id}`);
                const data = await response.json();

                // isi modal
                document.getElementById('edit_nama').value = data.nama;
                document.getElementById('edit_email').value = data.email;
                document.getElementById('edit_kelas').value = data.kelas;
                document.getElementById('edit_nis').value = data.nis;
                document.getElementById('edit_jk').value = data.jenis_kelamin;

                // set action form update
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
