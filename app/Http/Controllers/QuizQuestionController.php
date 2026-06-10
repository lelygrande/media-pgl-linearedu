<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class QuizQuestionController extends Controller
{
    public function index($quizId)
    {
        $quiz = Quiz::with(['bab', 'questions.options'])->findOrFail($quizId);

        return view('guru.manajemensoal', compact('quiz'));
    }

    public function store(Request $request, $quizId)
    {
        $request->validate([
            'question_text'   => 'required|string',
            'option_a' => 'nullable|string',
            'option_b' => 'nullable|string',
            'option_c' => 'nullable|string',
            'option_d' => 'nullable|string',
            'correct_option'  => 'required|in:A,B,C,D',
            'question_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'option_a_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'option_b_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'option_c_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'option_d_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        DB::transaction(function () use ($request, $quizId) {
            $nextOrder = (QuizQuestion::where('quiz_id', $quizId)->max('question_order') ?? 0) + 1;

            $imageName = null;

            if ($request->hasFile('question_image')) {
                $file = $request->file('question_image');
                $imageName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img/kuis'), $imageName);
            }

            $question = QuizQuestion::create([
                'quiz_id' => $quizId,
                'question_text' => $request->question_text,
                'question_image' => $imageName,
                'question_order' => $nextOrder,
            ]);

            $options = [
                'A' => [
                    'text' => $request->option_a,
                    'image' => $request->file('option_a_image'),
                ],
                'B' => [
                    'text' => $request->option_b,
                    'image' => $request->file('option_b_image'),
                ],
                'C' => [
                    'text' => $request->option_c,
                    'image' => $request->file('option_c_image'),
                ],
                'D' => [
                    'text' => $request->option_d,
                    'image' => $request->file('option_d_image'),
                ],
            ];

            foreach ($options as $label => $data) {
                $optionImageName = null;

                if ($data['image']) {
                    $file = $data['image'];
                    $optionImageName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('img/kuis/opsi'), $optionImageName);
                }

                QuizOption::create([
                    'question_id' => $question->id,
                    'option_label' => $label,
                    'option_text' => $data['text'],
                    'option_image' => $optionImageName,
                    'is_correct' => $request->correct_option === $label ? 1 : 0,
                ]);
            }

            Quiz::where('id', $quizId)->update([
                'total_questions' => QuizQuestion::where('quiz_id', $quizId)->count()
            ]);
        });

        return redirect()->route('kuis.soal', $quizId)->with('success', 'Soal berhasil ditambahkan.');
    }

    public function show($questionId)
    {
        $question = QuizQuestion::with('options')->findOrFail($questionId);

        return response()->json($question);
    }

    public function update(Request $request, $questionId)
    {
        $request->validate([
            'question_text'   => 'required|string',
            'option_a' => 'nullable|string',
            'option_b' => 'nullable|string',
            'option_c' => 'nullable|string',
            'option_d' => 'nullable|string',
            'correct_option'  => 'required|in:A,B,C,D',

            'question_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'remove_image'    => 'nullable|boolean',

            'option_a_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'option_b_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'option_c_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'option_d_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'remove_option_a_image' => 'nullable|boolean',
            'remove_option_b_image' => 'nullable|boolean',
            'remove_option_c_image' => 'nullable|boolean',
            'remove_option_d_image' => 'nullable|boolean',
        ]);

        DB::transaction(function () use ($request, $questionId) {
            $question = QuizQuestion::with('options', 'quiz')->findOrFail($questionId);

            $imageName = $question->question_image;

            // Hapus gambar soal
            if ($request->has('remove_image') && $request->remove_image == 1) {
                if ($question->question_image) {
                    $oldPath = public_path('img/kuis/' . $question->question_image);

                    if (File::exists($oldPath)) {
                        File::delete($oldPath);
                    }
                }

                $imageName = null;
            }

            // Upload gambar soal baru
            if ($request->hasFile('question_image')) {
                if ($question->question_image) {
                    $oldPath = public_path('img/kuis/' . $question->question_image);

                    if (File::exists($oldPath)) {
                        File::delete($oldPath);
                    }
                }

                $file = $request->file('question_image');
                $imageName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img/kuis'), $imageName);
            }

            $question->update([
                'question_text' => $request->question_text,
                'question_image' => $imageName,
            ]);

            $map = [
                'A' => $request->option_a,
                'B' => $request->option_b,
                'C' => $request->option_c,
                'D' => $request->option_d,
            ];

            foreach ($question->options as $option) {
                $labelLower = strtolower($option->option_label);

                $imageInputName = 'option_' . $labelLower . '_image';
                $removeInputName = 'remove_option_' . $labelLower . '_image';

                $optionImageName = $option->option_image;

                // Hapus gambar opsi
                if ($request->has($removeInputName) && $request->input($removeInputName) == 1) {
                    if ($option->option_image) {
                        $oldOptionPath = public_path('img/kuis/opsi/' . $option->option_image);

                        if (File::exists($oldOptionPath)) {
                            File::delete($oldOptionPath);
                        }
                    }

                    $optionImageName = null;
                }

                // Upload gambar opsi baru
                if ($request->hasFile($imageInputName)) {
                    if ($option->option_image) {
                        $oldOptionPath = public_path('img/kuis/opsi/' . $option->option_image);

                        if (File::exists($oldOptionPath)) {
                            File::delete($oldOptionPath);
                        }
                    }

                    $file = $request->file($imageInputName);
                    $optionImageName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('img/kuis/opsi/'), $optionImageName);
                }

                $option->update([
                    'option_text' => $map[$option->option_label] ?? '',
                    'option_image' => $optionImageName,
                    'is_correct' => $request->correct_option === $option->option_label ? 1 : 0,
                ]);
            }
        });

        $question = QuizQuestion::findOrFail($questionId);

        return redirect()->route('kuis.soal', $question->quiz_id)->with('success', 'Soal berhasil diupdate.');
    }

    public function destroy($questionId)
    {
        $question = QuizQuestion::findOrFail($questionId);
        $quizId = $question->quiz_id;

        DB::transaction(function () use ($question, $quizId) {
            if ($question->question_image) {
                $imagePath = public_path('img/kuis/' . $question->question_image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $question->delete();

            $remaining = QuizQuestion::where('quiz_id', $quizId)->orderBy('question_order')->get();

            foreach ($remaining as $index => $item) {
                $item->update(['question_order' => $index + 1]);
            }

            Quiz::where('id', $quizId)->update([
                'total_questions' => QuizQuestion::where('quiz_id', $quizId)->count()
            ]);
        });

        return redirect()->route('kuis.soal', $quizId)->with('success', 'Soal berhasil dihapus.');
    }
}
