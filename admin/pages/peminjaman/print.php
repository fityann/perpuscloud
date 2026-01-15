<?php
include "../../../config/koneksi.php";

// Query disesuaikan dengan view (menggunakan JOIN ke anggota dan users)
$peminjaman_sql = "SELECT p.*, a.nama AS nama_anggota, u.nama AS nama_user 
                   FROM peminjaman p
                   INNER JOIN anggota a ON p.anggota_id = a.id 
                   INNER JOIN users u ON p.user_id = u.id 
                   ORDER BY p.id DESC";

$peminjaman_query = mysqli_query($koneksi, $peminjaman_sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman</title>
    <link rel="stylesheet" href="../../../assets/paper/paper.css">
    <style>
        body.A4 .sheet {
            width: 210mm;
            height: auto;
        }

        /* Agar sheet mengikuti panjang data */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
    </style>
</head>

<body class="A4">
    <section class="sheet padding-10mm">
        <div class="header">
            <h2>LAPORAN DATA PEMINJAMAN BUKU</h2>
            <p>Dicetak pada: <?= date('d-m-Y H:i'); ?></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th width="30">No</th>
                    <th>Nama Anggota</th>
                    <th>Nama Petugas</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_assoc($peminjaman_query)) :
                ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $data['nama_anggota']; ?></td>
                        <td><?= $data['nama_user']; ?></td>
                        <td class="text-center"><?= date('d/m/Y', strtotime($data['tanggal_pinjam'])); ?></td>
                        <td class="text-center"><?= date('d/m/Y', strtotime($data['tanggal_kembali'])); ?></td>
                        <td class="text-center"><?= ucfirst($data['status']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>

    <script>
        window.print();
    </script>
</body>

</html>