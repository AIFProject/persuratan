<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Surat Keluar</title>
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
            margin-bottom: 15px;
        }

        .header table {
            width: 100%;
        }

        .header img {
            width: 120px;
            height: auto;
        }

        .title {
            text-align: center;
            line-height: 1;
        }

        .title h2 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .title h3 {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
        }

        .title h1 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }

        .title p {
            margin: 1px 0;
            font-size: 11px;
        }

        .line1 {
            border: 0;
            border-top: 2px solid #000;
            margin: 5px 0 1px;
        }

        .line2 {
            border: 0;
            border-top: 1px solid #000;
            margin: 0;
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

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
        }

        footer hr {
            margin-bottom: 5px;
        }

        .footer-text {
            text-align: center;
            font-size: 10px;
        }
    </style>

</head>

<body>
    <div class="header">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="100" align="center">
                    <img src="{{ public_path('kemenag1.png') }}" width="85">
                </td>

                <td align="center" class="title">
                    <h2>KEMENTERIAN AGAMA REPUBLIK INDONESIA</h2>

                    <h3>KANTOR KEMENTERIAN AGAMA KABUPATEN BANYUWANGI</h3>

                    <h1>MADRASAH TSANAWIYAH NEGERI 1 BANYUWANGI</h1>

                    <p>Jalan Mawar No. 35 Giri, Banyuwangi</p>

                    <p>Telepon (0333) 422355 · Faksimile (0333) 422355</p>

                    <p>
                        Website : https://mtsn1banyuwangi.sch.id
                        ; email : mtsn1banyuwangi@gmail.com
                    </p>
                </td>
            </tr>
        </table>

        <hr class="line1">
        <hr class="line2">
    </div>
    <div class="line"></div>
    <div class="judul">
        LAPORAN SURAT KELUAR
    </div>
    <div class="periode">
        Periode :
        {{ \Carbon\Carbon::parse($start)->translatedFormat('d F Y') }}
        s/d
        {{ \Carbon\Carbon::parse($end)->translatedFormat('d F Y') }}
    </div>
    <table class="data">
        <thead>
            <tr>
                <th width="35">No</th>
                <th width="130">Nomor Surat</th>
                <th width="70">Tanggal</th>
                <th>Tujuan</th>
                <th>Perihal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($suratKeluar as $index => $sk)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td>{{ $sk->nomor_surat }}</td>
                    <td style="text-align: center;">{{ $sk->tanggal_surat->translatedFormat('d/m/Y') }}</td>
                    <td>{{ $sk->tujuan }}</td>
                    <td>{{ $sk->perihal }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data surat keluar pada periode ini.</td>
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
    <footer>
        <hr>
        <div class="footer-text">
            Generated by <strong>Sistem Informasi Persuratan PTSP MTsN 1 Banyuwangi</strong>
            <br>
            Dicetak pada {{ \Carbon\Carbon::now('asia/jakarta')->translatedFormat('d F Y H:i:s') }}
            WIB.
        </div>
    </footer>
</body>

</html>