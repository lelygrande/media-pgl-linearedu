@extends('layout.layoutguru')

@section('title', 'Manajemen Soal')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="fw-bold mb-1" style="color: var(--primary-dark);">Manajemen Soal</h3>
            <p class="mb-0 text-muted">
                {{ $quiz->title }} | {{ $quiz->bab->judul ?? '-' }} | {{ $quiz->total_questions }} soal
            </p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('kuis.index') }}" class="btn btn-outline-secondary">
                Kembali
            </a>
            <button class="btn fw-semibold" data-bs-toggle="modal" data-bs-target="#modalTambahSoal"
                style="background-color: var(--primary-color); color: #fff; border-radius: 8px;">
                Tambah Soal
            </button>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 12px;">
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

    <div class="card shadow-sm" style="border-radius: 16px;">
        <div class="card-body">
            @forelse ($quiz->questions as $question)
                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="fw-bold mb-0">Soal {{ $question->question_order }}</h6>
                        <div class="d-flex gap-1">
                            <button type="button"
                                class="btn btn-sm text-white btn-edit-soal"
                                data-id="{{ $question->id }}"
                                data-url="{{ route('kuis.soal.show', $question->id) }}"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditSoal"
                                style="background-color: var(--primary-color);">
                                Edit
                            </button>

                            <form action="{{ route('kuis.soal.destroy', $question->id) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus soal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>

                    <p class="mb-2">{{ $question->question_text }}</p>

                    <div class="ps-2">
                        @foreach ($question->options as $option)
                            <div class="mb-1">
                                <strong>{{ $option->option_label }}.</strong>
                                {{ $option->option_text }}
                                @if ($option->is_correct)
                                    <span class="badge bg-success ms-2">Benar</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="text-center text-muted py-4">Belum ada soal.</div>
            @endforelse
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambahSoal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('kuis.soal.store', $quiz->id) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Soal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Pertanyaan</label>
                            <textarea name="question_text" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Opsi A</label>
                                <input type="text" name="option_a" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Opsi B</label>
                                <input type="text" name="option_b" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Opsi C</label>
                                <input type="text" name="option_c" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Opsi D</label>
                                <input type="text" name="option_d" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jawaban Benar</label>
                            <select name="correct_option" class="form-control" required>
                                <option value="">-- Pilih Jawaban Benar --</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEditSoal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formEditSoal" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Soal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Pertanyaan</label>
                            <textarea name="question_text" id="edit_question_text" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Opsi A</label>
                                <input type="text" name="option_a" id="edit_option_a" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Opsi B</label>
                                <input type="text" name="option_b" id="edit_option_b" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Opsi C</label>
                                <input type="text" name="option_c" id="edit_option_c" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Opsi D</label>
                                <input type="text" name="option_d" id="edit_option_d" class="form-control" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jawaban Benar</label>
                            <select name="correct_option" id="edit_correct_option" class="form-control" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
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

    <script>
        document.querySelectorAll('.btn-edit-soal').forEach(btn => {
            btn.addEventListener('click', async function() {
                const url = this.dataset.url;

                try {
                    const response = await fetch(url, {
                        headers: { 'Accept': 'application/json' }
                    });
                    const data = await response.json();

                    document.getElementById('edit_question_text').value = data.question_text ?? '';

                    let options = {A: '', B: '', C: '', D: ''};
                    let correct = 'A';

                    (data.options || []).forEach(option => {
                        options[option.option_label] = option.option_text ?? '';
                        if (option.is_correct) correct = option.option_label;
                    });

                    document.getElementById('edit_option_a').value = options.A;
                    document.getElementById('edit_option_b').value = options.B;
                    document.getElementById('edit_option_c').value = options.C;
                    document.getElementById('edit_option_d').value = options.D;
                    document.getElementById('edit_correct_option').value = correct;

                    document.getElementById('formEditSoal').action = `/guru/soal/${data.id}`;
                } catch (error) {
                    console.error(error);
                    alert('Data soal gagal dimuat.');
                }
            });
        });
    </script>

@endsection
