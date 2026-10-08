<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Masuk</title>
</head>

<body>
    <h1>Halaman Surat Masuk</h1>


    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Pengirim</th>
                <th>Perihal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suratmasuk as $surat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat['nomor surat'] }}</td>
                <td>{{ $surat['tanggal'] }}</td>
                <td>{{ $surat['pengirim'] }}</td>
                <td>{{ $surat['perihal'] }}</td>
               
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>