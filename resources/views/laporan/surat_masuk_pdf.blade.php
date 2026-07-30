<!DOCTYPE html>
<html>

<head>
    <title>Laporan Surat Masuk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h3 {
            text-align: center;
            margin-bottom: 5px;
        }

        .periode {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h3>LAPORAN SURAT MASUK</h3>
    <div class="periode">Periode: {{ \Carbon\Carbon::parse($start)->format('d/m/Y') }} -
        {{ \Carbon\Carbon::parse($end)->format('d/m/Y') }}</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Diterima</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Sifat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suratMasuk as $index => $sm)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sm->nomor_surat }}</td>
                    <td>{{ $sm->tanggal_surat->format('d/m/Y') }}</td>
                    <td>{{ $sm->tanggal_diterima->format('d/m/Y') }}</td>
                    <td>{{ $sm->pengirim }}</td>
                    <td>{{ $sm->perihal }}</td>
                    <td>{{ $sm->sifat_surat }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center;">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>