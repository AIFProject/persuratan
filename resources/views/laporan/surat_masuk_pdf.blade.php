<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Surat Masuk</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #000;
            margin: 25px;
        }

        .header {
            width: 100%;
            margin-bottom: 8px;
        }

        .header table {
            width: 100%;
            border: none;
        }

        .header td {
            border: none;
            vertical-align: middle;
        }

        .logo {
            width: 80px;
        }

        .logo img {
            width: 70px;
        }

        .title {
            text-align: center;
            line-height: 1.4;
        }

        .title h2 {
            margin: 0;
            font-size: 18px;
        }

        .title h3 {
            margin: 3px 0;
            font-size: 16px;
        }

        .title p {
            margin: 2px 0;
            font-size: 11px;
        }

        .line {
            border-top: 3px solid #000;
            border-bottom: 1px solid #000;
            margin: 8px 0 18px;
        }

        .judul {
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .periode {
            text-align: center;
            margin-bottom: 18px;
            font-size: 11px;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
        }

        table.data th,
        table.data td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }

        table.data th {
            background: #eeeeee;
            text-align: center;
            font-weight: bold;
        }

        table.data td {
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <table>
            <tr>
                {{-- <td class="logo" width="90">
                    <img src="{{ public_path('logo-mtsn.png') }}">
                </td> --}}
                <td class="title">
                    <h2>KEMENTERIAN AGAMA REPUBLIK INDONESIA</h2>
                    <h3>MTsN 1 BANYUWANGI</h3>
                    <p>
                        Jl. Mawar No.35, Lingkungan Mojoroto R, Mojopanggung, Kec. Giri, Kabupaten Banyuwangi, Jawa
                        Timur 68422
                    </p>
                    <p>
                        Hotline 0333-422355
                    </p>
                </td>
            </tr>
        </table>
    </div>
    <div class="line"></div>
    <div class="judul">
        LAPORAN SURAT MASUK
    </div>
    <div class="periode">
        Periode :
        {{ \Carbon\Carbon::parse($start)->format('d F Y') }}
        s/d
        {{ \Carbon\Carbon::parse($end)->format('d F Y') }}
    </div>
    <table class="data">
        <thead>
            <tr>
                <th width="35">No</th>
                <th width="130">Nomor Surat</th>
                <th width="70">Tgl Surat</th>
                <th width="70">Diterima</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th width="50">Sifat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suratMasuk as $index => $sm)
                <tr>
                    <td style="text-align: center;">
                        {{ $index + 1 }}
                    </td>
                    <td>
                        {{ $sm->nomor_surat }}
                    </td>
                    <td style="text-align: center;">
                        {{ $sm->tanggal_surat->translatedFormat('d/m/Y') }}
                    </td>
                    <td style="text-align: center;">
                        {{ $sm->tanggal_diterima->translatedFormat('d/m/Y') }}
                    </td>
                    <td>
                        {{ $sm->pengirim }}
                    </td>
                    <td>
                        {{ $sm->perihal }}
                    </td>
                    <td style="text-align: center;">
                        {{ $sm->sifat }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 15px;">
                        Tidak ada data surat masuk pada periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <br><br>
    <table style="width: 100%; border: none;">
        <tr>
            <td style="width:60%;border:none;"></td>
            <td style="width:40%;border:none;text-align:center;">
                Banyuwangi, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                Kepala MTsN 1 Banyuwangi<br><br><br><br>
                <u>Drs. H. M. Syarifudin, M.Pd.I</u><br>
                NIP. 19660402 199003 1 001
            </td>
        </tr>
    </table>
    <hr style="margin-top:30px;">
    <div style="text-align: center;font-size: 10px;">
        Generated by <strong>Sistem Informasi Persuratan MTsN 1 Banyuwangi</strong>
        <br>
        Dicetak pada {{ \Carbon\Carbon::now('asia/jakarta')->translatedFormat('d F Y H:i:s') }}
        WIB.
    </div>
</body>

</html>