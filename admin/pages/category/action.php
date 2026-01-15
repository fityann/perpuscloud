<?php
include '../../../config/koneksi.php';

session_start();

if (isset($_GET['act']) && $_GET['act'] == 'insert') {
    $nama_kategori = $_POST['nama_kategori'];

    $sql = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        $_SESSION['type'] = "success";
        $_SESSION['message'] = "Data kategori berhasil ditambahkan.";
    } else {
        $_SESSION['type'] = "failed";
        $_SESSION['message'] = "Terjadi kesalahan saat menambahkan data.";
    }

    header("Location: ../../dashboard.php?page=kategori");
    exit();
    
} elseif (isset($_GET['act']) && $_GET['act'] == 'update') {
    $id = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];

    $sql = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        $_SESSION['type'] = "success";
        $_SESSION['message'] = "Data kategori berhasil diperbarui.";
    } else {
        $_SESSION['type'] = "failed";
        $_SESSION['message'] = "Terjadi kesalahan saat memperbarui data.";
    }

    header("Location: ../../dashboard.php?page=kategori");
    exit();

} elseif (isset($_GET['act']) && $_GET['act'] == 'delete') {
    $id = $_GET['id'];

    $sql = "DELETE FROM kategori WHERE id='$id'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        $_SESSION['type'] = "success";
        $_SESSION['message'] = "Data kategori berhasil dihapus.";
    } else {
        $_SESSION['type'] = "failed";
        $_SESSION['message'] = "Terjadi kesalahan saat menghapus data.";
    }

    header("Location: ../../dashboard.php?page=kategori");
    exit();
}
