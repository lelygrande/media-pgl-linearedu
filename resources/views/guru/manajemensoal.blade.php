@extends('layout.layoutguru')

@section('title', 'Manajemen Soal')

@section('content')

    {{-- Style --}}
    <style>
        .option-help-box {
            background: #f5f8ff;
            border: 1px solid #dce7ff;
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 18px;
            color: #334155;
            font-size: 14px;
        }

        .option-help-box strong {
            color: var(--primary-dark);
            display: block;
            margin-bottom: 4px;
        }

        .option-help-box ul {
            margin: 8px 0 0 18px;
            padding: 0;
        }

        .option-card-admin {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 14px;
            background: #ffffff;
            height: 100%;
        }

        .option-card-head {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .option-badge-admin {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--primary-color);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .option-card-title {
            margin: 0;
            font-weight: 700;
            color: #1f2937;
        }

        .option-field-label {
            font-size: 13px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 6px;
        }

        .field-help {
            display: block;
            font-size: 12px;
            color: #6b7280;
            margin-top: 5px;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .current-image-note {
            font-size: 12px;
            color: #6b7280;
            margin-top: 6px;
        }
    </style>

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
                            <button type="button" class="btn btn-sm text-white btn-edit-soal" data-id="{{ $question->id }}"
                                data-url="{{ route('kuis.soal.show', $question->id) }}" data-bs-toggle="modal"
                                data-bs-target="#modalEditSoal" style="background-color: var(--primary-color);">
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

                                @if ($option->option_image)
                                    @if ($option->option_text && $option->option_text !== '-')
                                        {{ $option->option_text }}
                                    @endif

                                    <span class="text-muted">[gambar]</span>
                                @else
                                    {{ $option->option_text }}
                                @endif

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
                <form action="{{ route('kuis.soal.store', $quiz->id) }}" method="POST" enctype="multipart/form-data">
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

                        <div class="mb-3">
                            <label class="form-label">Gambar Soal (opsional)</label>
                            <input type="file" name="question_image" class="form-control">
                        </div>

                        <div class="option-help-box">
                            <strong>Petunjuk pengisian opsi jawaban</strong>
                            <ul>
                                <li>Isi <b>Teks jawaban</b> jika opsi berupa tulisan atau rumus.</li>
                                <li>Isi <b>Gambar opsi</b> jika opsi berupa grafik atau gambar.</li>
                                <li>Kalau opsi hanya berupa gambar, teks boleh dikosongkan atau isi tanda <b>-</b>.</li>
                                <li>Format gambar yang disarankan: JPG, PNG, JPEG, atau WEBP.</li>
                            </ul>
                        </div>

                        <div class="row g-3">
                            @foreach (['A' => 'a', 'B' => 'b', 'C' => 'c', 'D' => 'd'] as $label => $key)
                                <div class="col-md-6">
                                    <div class="option-card-admin">
                                        <div class="option-card-head">
                                            <span class="option-badge-admin">{{ $label }}</span>
                                            <p class="option-card-title">Opsi {{ $label }}</p>
                                        </div>

                                        <label class="option-field-label">Teks jawaban</label>
                                        <input type="text" name="option_{{ $key }}" class="form-control"
                                            placeholder="Contoh: garis lurus / 2x + y - 3 = 0">

                                        <small class="field-help">
                                            Isi bagian ini jika pilihan jawaban berbentuk teks. Untuk opsi gambar saja,
                                            boleh kosong atau isi "-".
                                        </small>

                                        <label class="option-field-label">Gambar opsi</label>
                                        <input type="file" name="option_{{ $key }}_image" class="form-control"
                                            accept="image/*">

                                        <small class="field-help">
                                            Upload gambar jika opsi ini berupa grafik, diagram, atau gambar jawaban.
                                        </small>
                                    </div>
                                </div>
                            @endforeach
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
                <form id="formEditSoal" method="POST" enctype="multipart/form-data"> @csrf
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

                        <div class="mb-3">
                            <label class="form-label">Gambar Soal (opsional)</label>
                            <input type="file" name="question_image" class="form-control" accept="image/*">

                            <div class="mt-2" id="edit_image_preview_wrapper" style="display:none;">
                                <img id="edit_image_preview" class="img-fluid rounded" style="max-width:220px;">
                            </div>

                            <div class="form-check mt-2" id="remove_image_wrapper" style="display:none;">
                                <input class="form-check-input" type="checkbox" name="remove_image" value="1"
                                    id="remove_image">
                                <label class="form-check-label" for="remove_image">
                                    Hapus gambar
                                </label>
                            </div>
                        </div>

                        <div class="option-help-box">
                            <strong>Petunjuk edit opsi jawaban</strong>
                            <ul>
                                <li>Ubah <b>Teks jawaban</b> jika ingin mengganti tulisan opsi.</li>
                                <li>Pilih <b>Gambar opsi baru</b> jika ingin mengganti gambar lama.</li>
                                <li>Centang <b>Hapus gambar opsi</b> jika opsi tersebut tidak ingin memakai gambar lagi.
                                </li>
                                <li>Jika opsi hanya gambar, teks boleh dikosongkan atau isi tanda <b>-</b>.</li>
                            </ul>
                        </div>

                        <div class="row g-3">
                            @foreach (['A' => 'a', 'B' => 'b', 'C' => 'c', 'D' => 'd'] as $label => $key)
                                <div class="col-md-6">
                                    <div class="option-card-admin">
                                        <div class="option-card-head">
                                            <span class="option-badge-admin">{{ $label }}</span>
                                            <p class="option-card-title">Opsi {{ $label }}</p>
                                        </div>

                                        <label class="option-field-label">Teks jawaban</label>
                                        <input type="text" name="option_{{ $key }}"
                                            id="edit_option_{{ $key }}" class="form-control"
                                            placeholder="Contoh: garis lurus / 2x + y - 3 = 0">

                                        <small class="field-help">
                                            Ubah teks jika opsi berupa tulisan. Untuk opsi gambar saja, boleh kosong atau
                                            isi "-".
                                        </small>

                                        <label class="option-field-label">Gambar opsi baru</label>
                                        <input type="file" name="option_{{ $key }}_image"
                                            class="form-control" accept="image/*">

                                        <small class="field-help">
                                            Kosongkan jika tidak ingin mengganti gambar lama.
                                        </small>

                                        <div class="mt-2" id="edit_option_{{ $key }}_image_preview_wrapper"
                                            style="display:none;">
                                            <small class="current-image-note">Gambar opsi saat ini:</small>
                                            <br>
                                            <img id="edit_option_{{ $key }}_image_preview"
                                                class="img-fluid rounded border mt-1" style="max-width:180px;">
                                        </div>

                                        <div class="form-check mt-2" id="remove_option_{{ $key }}_image_wrapper"
                                            style="display:none;">
                                            <input class="form-check-input" type="checkbox"
                                                name="remove_option_{{ $key }}_image" value="1"
                                                id="remove_option_{{ $key }}_image">

                                            <label class="form-check-label"
                                                for="remove_option_{{ $key }}_image">
                                                Hapus gambar opsi {{ $label }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                const previewWrapper = document.getElementById('edit_image_preview_wrapper');
                const previewImage = document.getElementById('edit_image_preview');
                const removeWrapper = document.getElementById('remove_image_wrapper');
                const removeCheckbox = document.getElementById('remove_image');

                try {
                    const response = await fetch(url, {
                        headers: {
                            'Accept': 'application/json'
                        }
                    });
                    const data = await response.json();

                    document.getElementById('edit_question_text').value = data.question_text ?? '';

                    let options = {
                        A: {
                            text: '',
                            image: null
                        },
                        B: {
                            text: '',
                            image: null
                        },
                        C: {
                            text: '',
                            image: null
                        },
                        D: {
                            text: '',
                            image: null
                        }
                    };

                    let correct = 'A';

                    (data.options || []).forEach(option => {
                        options[option.option_label] = {
                            text: option.option_text ?? '',
                            image: option.option_image ?? null
                        };

                        if (option.is_correct) correct = option.option_label;
                    });

                    ['A', 'B', 'C', 'D'].forEach(label => {
                        const key = label.toLowerCase();

                        document.getElementById(`edit_option_${key}`).value = options[label]
                            .text;

                        const optionPreviewWrapper = document.getElementById(
                            `edit_option_${key}_image_preview_wrapper`);
                        const optionPreviewImage = document.getElementById(
                            `edit_option_${key}_image_preview`);
                        const removeOptionWrapper = document.getElementById(
                            `remove_option_${key}_image_wrapper`);
                        const removeOptionCheckbox = document.getElementById(
                            `remove_option_${key}_image`);

                        if (options[label].image) {
                            optionPreviewImage.src = `/img/kuis/opsi/${options[label].image}`;
                            optionPreviewWrapper.style.display = 'block';
                            removeOptionWrapper.style.display = 'block';
                            removeOptionCheckbox.checked = false;
                        } else {
                            optionPreviewImage.src = '';
                            optionPreviewWrapper.style.display = 'none';
                            removeOptionWrapper.style.display = 'none';
                            removeOptionCheckbox.checked = false;
                        }
                    });

                    document.getElementById('edit_correct_option').value = correct;

                    if (data.question_image) {
                        previewImage.src = `/img/kuis/${data.question_image}`;
                        previewWrapper.style.display = 'block';
                        removeWrapper.style.display = 'block';
                        removeCheckbox.checked = false;
                    } else {
                        previewImage.src = '';
                        previewWrapper.style.display = 'none';
                        removeWrapper.style.display = 'none';
                        removeCheckbox.checked = false;
                    }

                    document.getElementById('formEditSoal').action = `/guru/soal/${data.id}`;
                } catch (error) {
                    console.error(error);
                    alert('Data soal gagal dimuat.');
                }
            });
        });
    </script>

@endsection
