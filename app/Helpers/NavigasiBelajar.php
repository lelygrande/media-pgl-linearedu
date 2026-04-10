<?php

namespace App\Helpers;

class NavigasiBelajar
{
    public static function getNav(string $kode): array
    {
        $urutan = [
            'peta-konsep' => route('peta-konsep'),
            'apersepsi1' => route('apersepsi1'),

            'subbabA1' => route('subbabA1'),
            'subbabA2_1' => route('subbabA2_1'),
            'subbabA2_2' => route('subbabA2_2'),
            'quiz1' => route('quiz.show', 1),

            'subbabB_gradien' => route('subbabB_gradien'),
            'subbabB_gradiensatutitik' => route('subbabB_gradiensatutitik'),
            'subbabB_gradienduatitik' => route('subbabB_gradienduatitik'),
            'subbabB_gradienpersamaan1' => route('subbabB_gradienpersamaan1'),
            'quiz2' => route('quiz.show', 2),

            'subbabC_gradien_garissejajar_sumbuxy' => route('subbabC_gradien_garissejajar_sumbuxy'),
            'subbabC_gradien_duagarissejajar' => route('subbabC_gradien_duagarissejajar'),
            'subbabC_gradien_duagaristegaklurus' => route('subbabC_gradien_duagaristegaklurus'),
            'quiz3' => route('quiz.show', 3),
        ];

        $keys = array_keys($urutan);
        $index = array_search($kode, $keys);

        return [
            'prevUrl' => ($index !== false && $index > 0) ? $urutan[$keys[$index - 1]] : null,
            'nextUrl' => ($index !== false && $index < count($keys) - 1) ? $urutan[$keys[$index + 1]] : null,
        ];
    }
}
