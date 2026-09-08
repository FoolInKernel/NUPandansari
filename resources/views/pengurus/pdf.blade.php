<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ID Card - {{ $pengurus->nama }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .card {
            border: 2px solid #000;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            background-color: #ecfdf5; /* emerald-50 */
            margin: 10px;
        }
        .header {
            font-weight: bold;
            font-size: 14px;
            color: #064e3b; /* emerald-900 */
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }
        .nama {
            font-size: 18px;
            font-weight: bold;
            color: #000;
            margin-bottom: 5px;
        }
        .jabatan {
            font-size: 14px;
            font-weight: bold;
            color: #047857; /* emerald-700 */
            margin-bottom: 10px;
        }
        .organisasi {
            font-size: 12px;
            color: #374151; /* gray-700 */
            background-color: #fef08a; /* yellow-200 */
            padding: 4px 8px;
            border: 1px solid #000;
            border-radius: 4px;
            display: inline-block;
        }
        .footer {
            margin-top: 20px;
            font-size: 10px;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            NU Desa Pandansari
        </div>
        <div class="nama">
            {{ $pengurus->nama }}
        </div>
        <div class="jabatan">
            {{ $pengurus->jabatan }}
        </div>
        <div class="organisasi">
            {{ $pengurus->organisasi }} - {{ ucfirst($pengurus->tipe) }}
        </div>
        
        <div class="footer">
            Dicetak pada: {{ date('d M Y') }}
        </div>
    </div>
</body>
</html>