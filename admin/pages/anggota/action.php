<?php
include '../../../config/koneksi.php';

session_start();

if (isset($_GET['act']) && $_GET['act'] == 'insert') {
    $kode_anggota = $_POST['kode_anggota'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $qcheck_anggota = "SELECT * FROM anggota WHERE kode_anggota='$kode_anggota'";

    $exec_checkanggota = mysqli_query($koneksi, $qcheck_anggota);
    $checkanggota = mysqli_num_rows($exec_checkanggota);
    if ($checkanggota > 0) {
        $_SESSION['error'] = "Kode anggota sudah ada!";
        $_SESSION['message'] = "Data member code sudah ada ";
        $_SESSION['alert_type'] = "alert-danger";
        $_SESSION['type'] = "failed";
        header("Location: ../../dashboard.php?page=anggota");
        exit();
    }

    $sql = "INSERT INTO anggota (kode_anggota, nama, jenis_kelamin, alamat, no_hp) VALUES ('$kode_anggota', '$nama', '$jenis_kelamin', '$alamat', '$no_hp')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        $_SESSION['success'] = "Data anggota berhasil ditambahkan.";
        $_SESSION['message'] = "Data berhasil ditambahkan";
        $_SESSION['alert_type'] = "alert-success";
        $_SESSION['type'] = "success";
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat menambahkan data anggota.";
        $_SESSION['message'] = "Data gagal ditambahkan";
        $_SESSION['alert_type'] = "alert-danger";
        $_SESSION['type'] = "failed";
    }

    header("Location: ../../dashboard.php?page=anggota");
    exit();
} elseif (isset($_GET['act']) && $_GET['act'] == 'update') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $sql = "UPDATE anggota SET nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_hp='$no_hp' WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        $_SESSION['success'] = "Data anggota berhasil diperbarui.";
        $_SESSION['message'] = "Data berhasil diperbarui";
        $_SESSION['alert_type'] = "alert-success";
        $_SESSION['type'] = "success";
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat memperbarui data anggota.";
        $_SESSION['message'] = "Data gagal diperbarui";
        $_SESSION['alert_type'] = "alert-danger";
        $_SESSION['type'] = "failed";
    }

    header("Location: ../../dashboard.php?page=anggota");
    exit();
} elseif (isset($_GET['act']) && $_GET['act'] == 'delete') {
    $id = $_GET['id'];

    $sql = "DELETE FROM anggota WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        $_SESSION['success'] = "Data anggota berhasil dihapus.";
        $_SESSION['message'] = "Data berhasil dihapus";
        $_SESSION['alert_type'] = "alert-success";
        $_SESSION['type'] = "success";
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat menghapus data anggota.";
        $_SESSION['message'] = "Data gagal dihapus";
        $_SESSION['alert_type'] = "alert-danger";
        $_SESSION['type'] = "failed";
    }

    header("Location: ../../dashboard.php?page=anggota");
    exit();
} else {
    header("Location: ../../dashboard.php?page=anggota");
    exit();
}