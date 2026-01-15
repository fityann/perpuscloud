<?php
session_start();
include 'config/koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email' AND password='$password'");
$cek = mysqli_num_rows($query);

if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
    $_SESSION['status_login'] = true;
    $_SESSION['email'] = $data['email'];
    $_SESSION['nama'] = $data['nama'];
    header("location:admin/dashboard.php?page=home");
} else {
    echo "<script>alert('Login Gagal: Cek email dan password Anda!'); window.location='index.php';</script>";
}
mysqli_close($conn);