<?php

namespace App\Http\Controllers;
use App\Helpers\NavigasiBelajar;

use App\Models\ProgressBelajar;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    private function simpanProgress(string $kodeMateri): void
    {
        $siswa = Auth::guard('siswa')->user();

        if (!$siswa) {
            return;
        }

        ProgressBelajar::updateOrCreate(
            [
                'siswa_id' => $siswa->id,
                'kode_materi' => $kodeMateri,
            ],
            [
                'is_selesai' => true,
            ]
        );
    }

    public function subbabA2_2()
{
    $this->simpanProgress('subbabA2_2');

    $nav = NavigasiBelajar::getNav('subbabA2_2');

    return view('siswa.subbabA2_2', compact('nav'));
}

    public function petaKonsep()
    {
        $this->simpanProgress('peta-konsep');
        return view('siswa.petakonsep');
    }

    public function apersepsi1()
    {
        $this->simpanProgress('apersepsi1');
        return view('siswa.apersepsi1');
    }

    public function subbabA1()
    {
        $this->simpanProgress('subbabA1');
        return view('siswa.subbabA1');
    }

    public function subbabA2_1()
    {
        $this->simpanProgress('subbabA2_1');
        return view('siswa.subbabA2_1');
    }

    public function subbabBGradien()
    {
        $this->simpanProgress('subbabB_gradien');
        return view('siswa.subbabB_gradien');
    }

    public function subbabBGradienSatuTitik()
    {
        $this->simpanProgress('subbabB_gradiensatutitik');
        return view('siswa.subbabB_gradien1titik');
    }

    public function subbabBGradienDuaTitik()
    {
        $this->simpanProgress('subbabB_gradienduatitik');
        return view('siswa.subbabB_gradienduatitik');
    }

    public function subbabBGradienPersamaan1()
    {
        $this->simpanProgress('subbabB_gradienpersamaan1');
        return view('siswa.subbabB_gradienpersamaan1');
    }

    public function subbabCSejajarSumbuXY()
    {
        $this->simpanProgress('subbabC_gradien_garissejajar_sumbuxy');
        return view('siswa.subbabC_gradien_garissejajar_sumbuxy');
    }

    public function subbabCDuaGarisSejajar()
    {
        $this->simpanProgress('subbabC_gradien_duagarissejajar');
        return view('siswa.subbabC_gradien_duagarissejajar');
    }

    public function subbabCDuaGarisTegakLurus()
    {
        $this->simpanProgress('subbabC_gradien_duagaristegaklurus');
        return view('siswa.subbabC_gradien_duagaristegaklurus');
    }
}