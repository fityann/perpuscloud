<?php
include '../../../config/koneksi.php';

session_start();
if (isset($_GET['act']) && $_GET['act'] == 'insert') {
    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori_id'];
    $stok = $_POST['stok'];

    $qcheck_buku = "SELECT * FROM buku WHERE kode_buku='$kode_buku'";

    $exec_checkbuku = mysqli_query($koneksi, $qcheck_buku);
    $checkbuku = mysqli_num_rows($exec_checkbuku);
    if ($checkbuku > 0) {
        $_SESSION['error'] = "Kode buku sudah ada!";
        $_SESSION['message'] = "Data product code sudah ada ";
        $_SESSION['alert_type'] = "alert-danger";
        $_SESSION['type'] = "failed";
        header("Location: ../../dashboard.php?page=buku");
        exit();
    }

    $sql = "INSERT INTO buku (kode_buku, judul, pengarang, penerbit, tahun_terbit, kategori_id, stok) VALUES ('$kode_buku', '$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$kategori', '$stok')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        $_SESSION['success'] = "Data buku berhasil ditambahkan.";
        $_SESSION['message'] = "Data berhasil ditambahkan";
        $_SESSION['alert_type'] = "alert-success";
        $_SESSION['type'] = "success";
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat menambahkan data buku.";
        $_SESSION['message'] = "Data gagal ditambahkan";
        $_SESSION['alert_type'] = "alert-danger";
        $_SESSION['type'] = "failed";
    }

    header("Location: ../../dashboard.php?page=buku");
    exit();
} elseif (isset($_GET['act']) && $_GET['act'] == 'update') {
    $id = $_GET['id'];
    $kode_buku = $_POST['kode_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori_id'];
    $stok = $_POST['stok'];

    $sql = "UPDATE buku SET kode_buku='$kode_buku', judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', kategori_id='$kategori', stok='$stok' WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        $_SESSION['success'] = "Data buku berhasil diperbarui.";
        $_SESSION['message'] = "Data berhasil diperbarui";
        $_SESSION['alert_type'] = "alert-success";
        $_SESSION['type'] = "success";
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat memperbarui data buku.";
        $_SESSION['message'] = "Data gagal diperbarui";
        $_SESSION['alert_type'] = "alert-danger";
        $_SESSION['type'] = "failed";
    }

    header("Location: ../../dashboard.php?page=buku");
    exit();
} elseif (isset($_GET['act']) && $_GET['act'] == 'delete') {
    $id = $_GET['id'];

    $sql = "DELETE FROM buku WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        $_SESSION['success'] = "Data buku berhasil dihapus.";
        $_SESSION['message'] = "Data berhasil dihapus";
        $_SESSION['alert_type'] = "alert-success";
        $_SESSION['type'] = "success";
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat menghapus data buku.";
        $_SESSION['message'] = "Data gagal dihapus";
        $_SESSION['alert_type'] = "alert-danger";
        $_SESSION['type'] = "failed";
    }

    header("Location: ../../dashboard.php?page=buku");
    exit();
} else {
    header("Location: ../../dashboard.php?page=buku");
    exit();
}
