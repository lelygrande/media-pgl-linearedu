<?php

namespace App\Http\Controllers;

use App\Models\LatihanProgress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LatihanProgressController extends Controller
{
    public function store(Request $request, $materiId)
    {
        try {
            $request->validate([
                'latihan_key' => 'required|string|max:100',
                'tipe' => 'required|string|max:30',
                'jawaban' => 'nullable|array',
                'is_correct' => 'required|boolean',
            ]);

            $studentId = Auth::guard('siswa')->id();

            if (!$studentId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Student ID kosong. Auth guard siswa tidak terbaca.',
                ], 401);
            }

            $progress = LatihanProgress::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'materi_id' => $materiId,
                    'latihan_key' => $request->latihan_key,
                ],
                [
                    'tipe' => $request->tipe,
                    'jawaban_json' => $request->jawaban,
                    'is_correct' => $request->is_correct,
                    'answered_at' => now(),
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Jawaban latihan berhasil disimpan.',
                'data' => $progress,
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi error di server.',
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ], 500);
        }
    }
}
