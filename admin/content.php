<?php

include '../config/koneksi.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        
        case 'home':
            include 'pages/home/view.php';
            break;
        // buku management
        case 'buku':
            include 'pages/buku/view.php';
            break;
        case 'tambahbuku':
            include 'pages/buku/create.php';
            break;
        case 'editbuku':
            include 'pages/buku/edit.php';
            break;  

        // kategori management
        case 'kategori':
            include 'pages/category/view.php';
            break;

        // anggota management
        case 'anggota':
            include 'pages/anggota/view.php';
            break;
        case 'tambahanggota':
            include 'pages/anggota/create.php';
            break;

        // peminjaman management
        case 'peminjaman':
            include 'pages/peminjaman/view.php';
            break;
        case 'detailpeminjaman':
            include 'pages/peminjaman/detailpeminjaman.php';
            break;
        case 'tambahpeminjaman':    
            include 'pages/peminjaman/create.php';
            break;
        default:
            echo "<h1>Halaman tidak ditemukan!</h1>";
            break;
    }
} else {
    // Tampilkan daftar content secara default
    include 'daftar_content.php';
}