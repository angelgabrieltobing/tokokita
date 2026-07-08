<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Laravel</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #a8edea, #fed6e3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            width: 360px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
            color: #1a1a2e;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            margin-bottom: 5px;
            font-size: 28px;
            color: #1a1a2e;
        }

        h2 {
            margin: 0;
            font-size: 14px;
            opacity: 0.8;
            color: #555;
        }

        .info {
            margin-top: 25px;
            text-align: left;
        }

        .info p {
            margin: 10px 0;
            font-size: 15px;
            color: #1a1a2e;
        }

        .label {
            font-weight: bold;
            color: #2c3e50;
        }

        .footer {
            margin-top: 25px;
            font-size: 12px;
            opacity: 0.7;
            color: #555;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="card">
    <h1>Selamat Datang</h1>
    <h2>UNIVERSITAS METHODIST INDONESIA</h2>

    <div class="info">
        <p><span class="label">Nama:</span> Angel Gabriel Tobing</p>
        <p><span class="label">NPM:</span> 224520005</p>
        <p><span class="label">Aplikasi:</span> Laravel 12</p>
    </div>

    <div class="footer">
        © 2026 - Tugas Pemrograman Web
    </div>
</div>

</body>
</html>