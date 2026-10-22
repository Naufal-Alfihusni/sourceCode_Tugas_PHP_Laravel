<?php
$nama = '';
$nilaiInput = '';
$hasil = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $nilaiInput = trim($_POST['nilai'] ?? '');

    if ($nama === '') {
        $error = 'Nama harus diisi.';
    } elseif ($nilaiInput === '' || !is_numeric($nilaiInput)) {
        $error = 'Nilai harus berupa angka.';
    } elseif ((float) $nilaiInput < 0 || (float) $nilaiInput > 100) {
        $error = 'Nilai harus berada di antara 0 dan 100.';
    } else {
        $nilai = (float) $nilaiInput;

        if ($nilai >= 90) {
            $grade = 'A';
        } elseif ($nilai >= 80) {
            $grade = 'B';
        } elseif ($nilai >= 70) {
            $grade = 'C';
        } elseif ($nilai >= 60) {
            $grade = 'D';
        } else {
            $grade = 'E';
        }

        switch ($grade) {
            case 'A':
                $keterangan = 'Sangat baik';
                break;
            case 'B':
                $keterangan = 'Baik';
                break;
            case 'C':
                $keterangan = 'Cukup';
                break;
            case 'D':
                $keterangan = 'Perlu ditingkatkan';
                break;
            default:
                $keterangan = 'Perlu belajar lebih giat';
        }

        $hasil = [
            'nama' => $nama,
            'nilai' => $nilai,
            'grade' => $grade,
            'keterangan' => $keterangan,
            'status' => $nilai >= 75 ? 'Lulus' : 'Belum lulus',
        ];
    }
}
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penilaian</title>
    <style>
        body {
            margin: 0;
            padding: 32px 16px;
            background: #f1f5f9;
            color: #1e293b;
            font-family: Arial, sans-serif;
        }

        main {
            width: min(100%, 520px);
            margin: 0 auto;
            padding: 28px;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 10px 30px #0f172a14;
        }

        h1 {
            margin-top: 0;
            color: #0f766e;
        }

        .error {
            color: #b91c1c;
        }

        a {
            color: #0f766e;
        }
    </style>
</head>

<body>
    <main>
        <?php if ($_SERVER['REQUEST_METHOD'] !== 'POST'): ?>
            <h1 class="error">Form belum dikirim</h1>
            <p>Silakan isi form penilaian terlebih dahulu.</p>
        <?php elseif ($error !== ''): ?>
            <h1 class="error">Input tidak valid</h1>
            <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
        <?php else: ?>
            <h1>Hasil Penilaian</h1>
            <p><strong>Nama:</strong> <?= htmlspecialchars($hasil['nama'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Nilai:</strong> <?= htmlspecialchars((string) $hasil['nilai'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Grade:</strong> <?= htmlspecialchars($hasil['grade'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Keterangan:</strong> <?= htmlspecialchars($hasil['keterangan'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Status:</strong> <?= htmlspecialchars($hasil['status'], ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>

        <p><a href="index.html">Kembali ke form</a></p>
    </main>
</body>

</html>
