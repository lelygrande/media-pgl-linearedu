@extends('layout.layoutguru')

@section('title', 'Manajemen Kuis')

@section('content')

    <h3 class="fw-bold mb-4" style="color: var(--primary-dark);">Manajemen Kuis</h3>

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

    <div class="card shadow-sm mb-3" style="border-radius: 16px;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless align-middle">
                    <thead style="background-color: #f1f5f9; border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th>No</th>
                            <th>Judul Kuis</th>
                            <th>Bab</th>
                            <th>Durasi</th>
                            <th>Total Soal</th>
                            <th>KKM</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($quizzes as $index => $quiz)
                            <tr class="table-row-custom">
                                <td>{{ $quizzes->firstItem() + $index }}</td>
                                <td class="fw-semibold">{{ $quiz->title }}</td>
                                <td>{{ $quiz->bab->judul ?? '-' }}</td>
                                <td>{{ $quiz->duration_minutes }} menit</td>
                                <td>{{ $quiz->total_questions }}</td>
                                <td>{{ $quiz->kkm }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($quiz->description, 40, '...') ?: '-' }}</td>
                                <td class="text-center">
                                    <div class="d-flex flex-wrap justify-content-center gap-1">
                                        <button type="button" class="btn btn-sm text-white btn-edit"
                                            data-id="{{ $quiz->id }}" data-url="{{ route('kuis.show', $quiz->id) }}"
                                            data-bs-toggle="modal" data-bs-target="#modalEditKuis"
                                            style="background-color: var(--primary-color); border-radius: 6px;">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>

                                        <a href="{{ route('kuis.soal', $quiz->id) }}" class="btn btn-sm btn-success"
                                            style="border-radius: 6px;">
                                            <i class="bi bi-list-check"></i> Soal
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">
                                    Belum ada data kuis.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3 d-flex justify-content-end">
                {{ $quizzes->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditKuis" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formEditKuis" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Kuis</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Judul Kuis</label>
                                <input type="text" name="title" id="edit_title" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Bab</label>
                                <select name="bab_id" id="edit_bab_id" class="form-control" required>
                                    @foreach ($babs as $bab)
                                        <option value="{{ $bab->id }}">{{ $bab->judul }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Durasi (menit)</label>
                                <input type="number" name="duration_minutes" id="edit_duration_minutes"
                                    class="form-control" min="1" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Total Soal</label>
                                <input type="number" name="total_questions" id="edit_total_questions" class="form-control"
                                    min="0" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">KKM</label>
                                <input type="number" name="kkm" id="edit_kkm" class="form-control" min="0"
                                    max="100" step="0.01" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea name="description" id="edit_description" rows="4" class="form-control"></textarea>
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

    <style>
        .table-row-custom:hover {
            background-color: #f8fafc !important;
            transition: 0.15s ease-in-out;
        }

        table td,
        table th {
            vertical-align: middle;
            font-size: 15px;
        }
    </style>

    <script>
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', async function() {
                const id = this.dataset.id;
                const url = this.dataset.url;

                try {
                    const response = await fetch(url, {
                        headers: {
                            'Accept': 'application/json'
                        }
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const data = await response.json();

                    document.getElementById('edit_title').value = data.title ?? '';
                    document.getElementById('edit_bab_id').value = data.bab_id ?? '';
                    document.getElementById('edit_duration_minutes').value = data.duration_minutes ??
                    '';
                    document.getElementById('edit_total_questions').value = data.total_questions ?? 10;
                    document.getElementById('edit_kkm').value = data.kkm ?? 75;
                    document.getElementById('edit_description').value = data.description ?? '';

                    document.getElementById('formEditKuis').action = `/guru/kuis/${id}`;
                } catch (error) {
                    console.error('Gagal mengambil data kuis:', error);
                    alert('Data kuis gagal dimuat.');
                }
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
