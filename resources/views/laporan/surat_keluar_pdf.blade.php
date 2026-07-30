<!DOCTYPE html>
<html>

<head>
    <title>Laporan Surat Keluar</title>
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
    <h3>LAPORAN SURAT KELUAR</h3>
    <div class="periode">Periode: {{ \Carbon\Carbon::parse($start)->format('d/m/Y') }} -
        {{ \Carbon\Carbon::parse($end)->format('d/m/Y') }}</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Tujuan</th>
                <th>Perihal</th>
                <th>Sifat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suratKeluar as $index => $sk)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sk->nomor_surat }}</td>
                    <td>{{ $sk->tanggal_surat->format('d/m/Y') }}</td>
                    <td>{{ $sk->tujuan }}</td>
                    <td>{{ $sk->perihal }}</td>
                    <td>{{ $sk->sifat_surat }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>