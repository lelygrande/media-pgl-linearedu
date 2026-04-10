<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'email',
        'kelas',
        'jenis_kelamin',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class, 'student_id');
    }
}
