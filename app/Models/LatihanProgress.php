<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LatihanProgress extends Model
{
    protected $table = 'latihan_progress';

    protected $fillable = [
        'student_id',
        'materi_id',
        'latihan_key',
        'tipe',
        'jawaban_json',
        'is_correct',
        'answered_at',
    ];

    protected $casts = [
        'jawaban_json' => 'array',
        'is_correct' => 'boolean',
        'answered_at' => 'datetime',
    ];
}
