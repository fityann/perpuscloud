<?php
include '../../../config/koneksi.php';
session_start();

$table_detail = 'detail_peminjaman';

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    if ($act == 'insert') {
        $anggota_id      = $_POST['anggota_id'];
        $user_id         = $_POST['user_id'];
        $tanggal_pinjam  = $_POST['tanggal_pinjam'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $status          = $_POST['status'] ?? 'dipinjam';
        $buku_id         = $_POST['buku_id'];
        $qty             = isset($_POST['qty']) ? intval($_POST['qty']) : 1;

        $sql_master = "INSERT INTO peminjaman (anggota_id, user_id, tanggal_pinjam, tanggal_kembali, status) 
                       VALUES ('$anggota_id', '$user_id', '$tanggal_pinjam', '$tanggal_kembali', '$status')";

        if (mysqli_query($koneksi, $sql_master)) {
            $peminjaman_id = mysqli_insert_id($koneksi);

            $sql_detail = "INSERT INTO $table_detail (peminjaman_id, buku_id, jumlah) 
                           VALUES ('$peminjaman_id', '$buku_id', '$qty')";

            mysqli_query($koneksi, $sql_detail);

            mysqli_query($koneksi, "UPDATE buku SET stok = stok - $qty WHERE id = '$buku_id'");

            $_SESSION['type'] = "success";
            $_SESSION['message'] = "Transaksi Peminjaman Berhasil Disimpan!";
        } else {
            $_SESSION['type'] = "failed";
            $_SESSION['message'] = "Gagal menyimpan transaksi.";
        }
        header("Location: ../../dashboard.php?page=peminjaman");
        exit();
    } elseif ($act == 'update') {
        $id              = $_POST['id'];
        $anggota_id      = $_POST['anggota_id'];
        $user_id         = $_POST['user_id'];
        $tanggal_pinjam  = $_POST['tanggal_pinjam'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $new_status      = $_POST['status'];

        $check_old = mysqli_query($koneksi, "SELECT status FROM peminjaman WHERE id='$id'");
        $old_data  = mysqli_fetch_assoc($check_old);
        $old_status = $old_data['status'];

        $sql_update = "UPDATE peminjaman SET anggota_id='$anggota_id', user_id='$user_id', tanggal_pinjam='$tanggal_pinjam', tanggal_kembali='$tanggal_kembali', status='$new_status' WHERE id='$id'";

        if (mysqli_query($koneksi, $sql_update)) {
            if ($old_status == 'dipinjam' && $new_status == 'kembali') {
                $q_detail = mysqli_query($koneksi, "SELECT buku_id FROM $table_detail WHERE peminjaman_id='$id'");
                while ($d = mysqli_fetch_assoc($q_detail)) {
                    $bid = $d['buku_id'];
                    mysqli_query($koneksi, "UPDATE buku SET stok = stok + 1 WHERE id='$bid'");
                }
            }
            $_SESSION['type'] = "success";
            $_SESSION['message'] = "Data Berhasil Diperbarui!";
        } else {
            $_SESSION['type'] = "failed";
            $_SESSION['message'] = "Gagal memperbarui data.";
        }
        header("Location: ../../dashboard.php?page=peminjaman");
        exit();
    } elseif ($act == 'delete') {
        $id = $_GET['id'];

        $check = mysqli_query($koneksi, "SELECT status FROM peminjaman WHERE id='$id'");
        $data_p = mysqli_fetch_assoc($check);

        if ($data_p['status'] == 'dipinjam') {
            $q_detail = mysqli_query($koneksi, "SELECT buku_id FROM $table_detail WHERE peminjaman_id='$id'");
            while ($d = mysqli_fetch_assoc($q_detail)) {
                $bid = $d['buku_id'];
                mysqli_query($koneksi, "UPDATE buku SET stok = stok + 1 WHERE id='$bid'");
            }
        }

        mysqli_query($koneksi, "DELETE FROM $table_detail WHERE peminjaman_id='$id'");
        $query = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id='$id'");

        if ($query) {
            $_SESSION['type'] = "success";
            $_SESSION['message'] = "Data Berhasil Dihapus!";
        } else {
            $_SESSION['type'] = "failed";
            $_SESSION['message'] = "Gagal menghapus data.";
        }
        header("Location: ../../dashboard.php?page=peminjaman");
        exit();
    } elseif ($act == 'return') {
        $id = $_GET['id'];

        // 1. Ambil detail buku untuk mengembalikan stok
        $query_detail = mysqli_query($koneksi, "SELECT buku_id, jumlah FROM detail_peminjaman WHERE peminjaman_id = '$id'");

        while ($row = mysqli_fetch_assoc($query_detail)) {
            $buku_id = $row['buku_id'];
            $qty = $row['jumlah'];

            // Kembalikan stok buku
            mysqli_query($koneksi, "UPDATE buku SET stok = stok + $qty WHERE id = '$buku_id'");
        }

        // 2. Update status (Gunakan kata 'dikembalikan' sesuai ENUM)
        $update_status = mysqli_query($koneksi, "UPDATE peminjaman SET status = 'dikembalikan' WHERE id = '$id'");

        if ($update_status) {
            echo "<script>alert('Buku berhasil dikembalikan!'); window.location='../../dashboard.php?page=detailpeminjaman&id=$id';</script>";
        } else {
            echo "<script>alert('Gagal memproses data'); window.history.back();</script>";
        }
    }
}
