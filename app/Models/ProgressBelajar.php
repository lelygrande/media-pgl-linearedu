<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressBelajar extends Model
{
    protected $table = 'progress_belajar';

    protected $fillable = [
        'siswa_id',
        'kode_materi',
        'is_selesai',
    ];
}
