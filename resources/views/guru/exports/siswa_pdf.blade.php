<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Siswa</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { margin: 0 0 12px 0; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 6px; }
        th { background: #f1f5f9; }
    </style>
</head>
<body>
    <h2>Daftar Siswa</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $i => $siswa)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->email }}</td>
                    <td>{{ $siswa->kelas }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
