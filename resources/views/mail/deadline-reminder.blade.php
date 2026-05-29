<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pengingat Deadline Tugas</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f8fafc;
            color: #334155;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }
        .header {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            padding: 30px 40px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .header p {
            margin: 5px 0 0 0;
            font-size: 14px;
            opacity: 0.9;
        }
        .content {
            padding: 40px;
        }
        .greeting {
            font-size: 18px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 10px;
        }
        .intro-text {
            font-size: 14px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 25px;
        }
        .task-list {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .task-item {
            border-bottom: 1px solid #f1f5f9;
        }
        .task-item td {
            padding: 16px 8px;
            vertical-align: middle;
        }
        .task-title {
            font-weight: 700;
            color: #334155;
            font-size: 15px;
            margin: 0;
        }
        .task-meta {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 3px;
        }
        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .badge-kategori {
            background-color: #e0e7ff;
            color: #4338ca;
        }
        .deadline-badge {
            font-size: 13px;
            font-weight: 700;
            color: #ef4444;
            text-align: right;
        }
        .cta-container {
            text-align: center;
            margin: 35px 0 15px 0;
        }
        .cta-button {
            display: inline-block;
            background-color: #6366f1;
            color: #ffffff !important;
            text-decoration: none;
            padding: 14px 30px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 14px;
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.3);
        }
        .footer {
            background-color: #f8fafc;
            padding: 20px 40px;
            text-align: center;
            border-top: 1px solid #f1f5f9;
            font-size: 12px;
            color: #94a3b8;
        }
        .footer a {
            color: #6366f1;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>⏰ TaskFlow Reminder</h1>
            <p>Pengingat Batas Waktu Tugas Anda</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">Halo {{ $user->name }},</div>
            <p class="intro-text">
                Beberapa tugas Anda tercatat memiliki batas waktu yang perlu segera diselesaikan. Yuk, cek daftar tugas di bawah ini agar tidak terlewat!
            </p>

            <!-- Table of Tasks -->
            <table class="task-list">
                @foreach($tugasList as $tugas)
                    <tr class="task-item">
                        <td>
                            <p class="task-title">{{ $tugas->judul }}</p>
                            <p class="task-meta">
                                <span class="badge badge-kategori">{{ $tugas->kategori->nama ?? 'Tanpa Kategori' }}</span>
                            </p>
                        </td>
                        <td class="deadline-badge">
                            Tenggat:<br>
                            {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d F Y') }}
                        </td>
                    </tr>
                @endforeach
            </table>

            <!-- Call to Action -->
            <div class="cta-container">
                <a href="{{ url('/dashboard') }}" class="cta-button" style="color: #ffffff;">Buka Dashboard TaskFlow</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Email ini dikirim otomatis oleh sistem TaskFlow.</p>
            <p>© {{ date('Y') }} <a href="{{ url('/') }}">TaskFlow System</a>. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
