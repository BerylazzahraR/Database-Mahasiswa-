<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Kartu Mahasiswa</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color:#0f172a; }
        .wrap { width: 100%; padding: 24px; }
        .card {
            width: 340px;
            height: 215px;
            border: 1px solid #cbd5e1;
            border-radius: 14px;
            overflow: hidden;
        }
        .top {
            background: #0B4C79;
            color: white;
            padding: 14px 16px;
        }
        .brand { font-size: 12px; opacity: .9; margin-bottom: 2px; }
        .title { font-size: 16px; font-weight: 700; }
        .mid {
            padding: 14px 16px;
            background: #ffffff;
        }
        .row { display: table; width: 100%; }
        .left, .right { display: table-cell; vertical-align: top; }
        .left { width: 86px; }
        .photo {
            width: 76px; height: 96px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #f1f5f9;
            text-align: center;
            line-height: 96px;
            color: #64748b;
            font-size: 10px;
        }
        .kv { margin-left: 8px; }
        .name { font-weight: 800; font-size: 13px; margin-bottom: 6px; }
        .label { font-size: 9px; color: #64748b; text-transform: uppercase; letter-spacing: .05em; }
        .value { font-size: 11px; margin-bottom: 6px; }
        .bottom {
            padding: 10px 16px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            font-size: 9px;
            color: #475569;
        }
        .chip {
            display:inline-block;
            padding: 3px 8px;
            border-radius: 999px;
            background: rgba(11,76,121,.10);
            color: #0B4C79;
            font-weight: 700;
            font-size: 10px;
        }
        .footerline { margin-top: 10px; font-size: 9px; color:#64748b; }
    </style>
</head>
<body>
<div class="wrap">
    <div class="card">
        <div class="top">
            <div class="brand">SIM Akademik</div>
            <div class="title">Kartu Tanda Mahasiswa</div>
        </div>

        <div class="mid">
            <div class="row">
                <div class="left">
                    <div class="photo">FOTO 3x4</div>
                </div>
                <div class="right">
                    <div class="kv">
                        <div class="name">{{ $m->nama }}</div>

                        <div class="label">NIM</div>
                        <div class="value"><span class="chip">{{ $m->nim }}</span></div>

                        <div class="label">Prodi</div>
                        <div class="value">{{ $m->prodi?->nama ?? '-' }}</div>

                        <div class="label">Dosen PA</div>
                        <div class="value">{{ $m->dosen?->nama ?? '-' }}</div>

                        <div class="label">Angkatan</div>
                        <div class="value">{{ $m->angkatan }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom">
            Email: {{ $m->email }} <br>
            Dicetak: {{ $printedAt->format('d/m/Y H:i') }}
        </div>
    </div>

    <div class="footerline">
        Catatan: Ini kartu demo untuk keperluan tugas/proyek.
    </div>
</div>
</body>
</html>
