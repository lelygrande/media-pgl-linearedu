<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekapitulasi Nilai</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
            font-size: 11px;
        }

        th {
            background-color: #f1f5f9;
            font-weight: bold;
        }

        .text-left {
            text-align: left;
        }
    </style>

</head>
<body>

    <h2>Rekapitulasi Nilai Siswa</h2>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Kuis Bab A</th>
                <th>Kuis Bab B</th>
                <th>Kuis Bab C</th>
                <th>Kuis Bab D</th>
                <th>Evaluasi</th>
                <th>Rata-rata</th>
                <th>Status</th>
            </tr>

        </thead>

        <tbody>

            @forelse ($rows as $row)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td class="text-left">
                        {{ $row['nama'] }}
                    </td>

                    <td>{{ $row['kelas'] }}</td>

                    <td>{{ $row['kuis_a'] ?? '-' }}</td>

                    <td>{{ $row['kuis_b'] ?? '-' }}</td>

                    <td>{{ $row['kuis_c'] ?? '-' }}</td>

                    <td>{{ $row['kuis_d'] ?? '-' }}</td>

                    <td>{{ $row['evaluasi'] ?? '-' }}</td>

                    <td>
                        {{ $row['rata_rata'] ?? '-' }}
                    </td>

                    <td>
                        {{ $row['status'] }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="10">
                        Belum ada data nilai siswa.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</body>
</html>
