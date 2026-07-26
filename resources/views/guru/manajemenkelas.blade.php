@extends('layout.layoutguru')

@section('title', 'Manajemen Kelas')

@section('content')

    <style>
        .dropdown-menu .dropdown-item {
            font-weight: 600;
            font-size: 14px;
            padding: 8px 14px;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #eef8ff;
        }

        td .dropdown {
            display: inline-block;
        }
    </style>

    <h3 class="fw-bold mb-4" style="color: var(--primary-dark);">Manajemen Kelas</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius:12px;">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius:12px;">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ session('error') }}
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
        <div>
            <p class="mb-0 text-muted">
                Kelola data kelas yang digunakan pada manajemen siswa.
            </p>
        </div>

        <button class="btn fw-semibold" data-bs-toggle="modal" data-bs-target="#modalTambahKelas"
            style="background-color:var(--primary-color);color:#fff;border-radius:8px;">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Kelas
        </button>
    </div>

    <div class="card shadow-sm mb-3" style="border-radius:16px;">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-borderless align-middle">

                    <thead style="background-color:#f1f5f9;border-bottom:2px solid #e2e8f0;">
                        <tr>
                            <th style="width:70px;">No</th>
                            <th>Nama Kelas</th>
                            <th>Token Kelas</th>
                            <th>Jumlah Siswa</th>
                            <th class="text-center" style="width:280px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($kelasList as $index => $kelas)
                            <tr class="table-row-custom">
                                <td>{{ $kelasList->firstItem() + $index }}</td>

                                <td class="fw-semibold">
                                    {{ $kelas->nama_kelas }}
                                </td>

                                <td>
                                    <span class="badge rounded-pill bg-primary px-3 py-2">
                                        {{ $kelas->token_kelas }}
                                    </span>
                                </td>

                                <td>
                                    <span class="badge rounded-pill text-bg-light border">
                                        {{ $kelas->siswa_count }} siswa
                                    </span>
                                </td>

                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm text-white dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"
                                            style="background-color:var(--primary-color);border-radius:8px;">
                                            Aksi
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="border-radius:10px;">

                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('daftarsiswa.index', ['kelas_id' => $kelas->id]) }}">
                                                    <i class="bi bi-people me-2 text-success"></i>
                                                    Lihat Siswa
                                                </a>
                                            </li>

                                            <li>
                                                <button type="button" class="dropdown-item btn-edit-kelas"
                                                    data-id="{{ $kelas->id }}" data-nama="{{ $kelas->nama_kelas }}"
                                                    data-bs-toggle="modal" data-bs-target="#modalEditKelas">
                                                    <i class="bi bi-pencil-square me-2 text-primary"></i>
                                                    Edit
                                                </button>
                                            </li>

                                            <li>
                                                <form action="{{ route('guru.kelas.regenerate-token', $kelas->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Generate ulang token kelas ini? Token lama tidak bisa dipakai lagi.')">
                                                    @csrf
                                                    @method('PUT')

                                                    <button type="submit" class="dropdown-item">
                                                        <i class="bi bi-arrow-clockwise me-2 text-warning"></i>
                                                        Generate Token
                                                    </button>
                                                </form>
                                            </li>

                                            <li>
                                                <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin mau hapus kelas ini?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="bi bi-trash me-2"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </li>

                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Belum ada data kelas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3 d-flex justify-content-end">
                {{ $kelasList->links() }}
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

        .modal-content {
            border: none;
            border-radius: 18px;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg,
                    var(--primary-color),
                    var(--primary-dark));
            color: white;
            border-bottom: none;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .modal-title {
            font-weight: 600;
        }

        .modal-body {
            background-color: #f8fafc;
        }

        .modal-footer {
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-dark);
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            padding: 10px 12px;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, .15);
        }

        .btn-simpan {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 8px 18px;
        }

        .btn-simpan:hover {
            background-color: var(--primary-dark);
            color: white;
        }

        .btn-batal {
            border-radius: 10px;
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
        }
    </style>

    <!-- Modal Tambah Kelas -->
    <div class="modal fade" id="modalTambahKelas" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="{{ route('kelas.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Kelas</label>
                            <input type="text" name="nama_kelas" class="form-control" placeholder="Contoh: 8A" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-batal" data-bs-dismiss="modal">
                            Batal
                        </button>

                        <button type="submit" class="btn btn-simpan">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- Modal Edit Kelas -->
    <div class="modal fade" id="modalEditKelas" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="formEditKelas" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Kelas</label>
                            <input type="text" id="edit_nama_kelas" name="nama_kelas" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-batal" data-bs-dismiss="modal">
                            Batal
                        </button>

                        <button type="submit" class="btn btn-simpan">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.btn-edit-kelas').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                const nama = this.dataset.nama;

                document.getElementById('edit_nama_kelas').value = nama;
                document.getElementById('formEditKelas').action = `/guru/kelas/${id}`;
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
