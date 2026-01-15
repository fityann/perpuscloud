<?php
$id_peminjaman = $_GET['id'];
$query_master = mysqli_query($koneksi, "SELECT p.*, a.nama AS nama_anggota 
    FROM peminjaman p
    JOIN anggota a ON p.anggota_id = a.id
    WHERE p.id = '$id_peminjaman'");
$data = mysqli_fetch_assoc($query_master);
?>

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#1a222c] pt-24 pb-10">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-6">

        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white tracking-tight">Detail Transaksi Peminjaman</h2>
                <p class="text-sm text-gray-400 font-mono text-blue-500">Invoice ID: #<?= $data['id']; ?></p>
            </div>
            <a href="?page=peminjaman" class="inline-flex items-center gap-2 rounded bg-[#313d4a] px-4 py-2 text-sm font-medium text-white hover:bg-opacity-80 transition">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            <div class="lg:col-span-1 space-y-6">
                <div class="rounded-xl border border-[#2e3a47] bg-[#24303f] p-6 shadow-xl">
                    <h3 class="mb-5 text-md font-semibold text-gray-400 uppercase tracking-widest border-b border-[#2e3a47] pb-3">Informasi Utama</h3>
                    <div class="space-y-5">
                        <div>
                            <span class="text-xs text-gray-500 block mb-1">Nama Peminjam</span>
                            <p class="text-white text-lg font-bold italic"><?= $data['nama_anggota']; ?></p>
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            <div class="bg-[#1a222c] p-4 rounded-lg border-l-4 border-blue-500">
                                <span class="text-[10px] text-gray-500 uppercase block mb-1">Tanggal Pinjam</span>
                                <span class="text-white font-semibold"><?= date('d F Y', strtotime($data['tanggal_pinjam'])); ?></span>
                            </div>
                            <div class="bg-[#1a222c] p-4 rounded-lg border-l-4 border-red-500">
                                <span class="text-[10px] text-gray-500 uppercase block mb-1">Batas Kembali</span>
                                <span class="text-white font-semibold"><?= date('d F Y', strtotime($data['tanggal_kembali'])); ?></span>
                            </div>
                        </div>

                        <div class="pt-4">
                            <span class="inline-flex w-full items-center justify-center rounded-lg px-3 py-3 text-xs font-black uppercase tracking-widest <?= $data['status'] == 'dipinjam' ? 'bg-yellow-500/10 text-yellow-500 border border-yellow-500/20' : 'bg-green-500/10 text-green-500 border border-green-500/20' ?>">
                                <i class="fa-solid <?= $data['status'] == 'dipinjam' ? 'fa-clock' : 'fa-check-circle' ?> mr-2"></i>
                                STATUS: <?= $data['status']; ?>
                            </span>

                            <?php if ($data['status'] == 'dipinjam') : ?>
                                <div class="mt-4">
                                    <a href="pages/peminjaman/action.php?act=return&id=<?= $data['id']; ?>"
                                        onclick="return confirm('Apakah Anda yakin buku sudah dikembalikan?')"
                                        class="flex w-full items-center justify-center gap-2 rounded-lg bg-green-600 px-4 py-3 text-sm font-bold text-white hover:bg-green-700 transition">
                                        <i class="fa-solid fa-rotate-left"></i> Tandai Sudah Kembali
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="rounded-xl border border-[#2e3a47] bg-[#24303f] shadow-xl overflow-hidden">
                    <div class="bg-[#313d4a] px-6 py-4">
                        <h3 class="font-bold text-white italic">BUKU YANG DIBAWA</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-[10px] uppercase text-gray-400 bg-[#1a222c]">
                                    <th class="px-6 py-4 font-bold">Detail Koleksi</th>
                                    <th class="px-6 py-4 font-bold">Kategori</th>
                                    <th class="px-6 py-4 font-bold text-center">Jumlah Pinjam</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#2e3a47]">
                                <?php
                                // Tambahkan dp.qty pada SELECT untuk mengambil jumlah yang dipinjam
                                $sql_items = "SELECT b.*, k.nama_kategori, dp.jumlah 
                                FROM detail_peminjaman dp
                                JOIN buku b ON dp.buku_id = b.id
                                JOIN kategori k ON b.kategori_id = k.id
                                WHERE dp.peminjaman_id = '$id_peminjaman'";

                                $query_items = mysqli_query($koneksi, $sql_items);

                                if (mysqli_num_rows($query_items) > 0) :
                                    while ($b = mysqli_fetch_assoc($query_items)) :
                                ?>
                                        <tr class="hover:bg-[#313d4a]/20 transition">
                                            <td class="px-6 py-5">
                                                <div class="flex flex-col">
                                                    <span class="text-blue-400 text-xs font-mono mb-1">[<?= $b['kode_buku']; ?>]</span>
                                                    <span class="text-white font-bold text-lg"><?= $b['judul']; ?></span>
                                                    <div class="flex items-center gap-4 mt-2 text-[11px] text-gray-500 italic">
                                                        <span><i class="fa-solid fa-user-edit mr-1"></i><?= $b['pengarang']; ?></span>
                                                        <span><i class="fa-solid fa-building mr-1"></i><?= $b['penerbit']; ?> (<?= $b['tahun_terbit']; ?>)</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-5">
                                                <span class="px-3 py-1 rounded-full bg-blue-500/10 text-blue-400 text-[10px] border border-blue-500/20 uppercase font-bold">
                                                    <?= $b['nama_kategori']; ?>
                                                </span>
                                            </td>
                                            <td class="px-6 py-5 text-center">
                                                <div class="flex flex-col items-center">
                                                    <div class="bg-blue-600/20 text-blue-400 px-4 py-1 rounded-lg border border-blue-500/30">
                                                        <span class="text-white font-black text-xl"><?= $b['jumlah']; ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endwhile;
                                else: ?>
                                    <tr>
                                        <td colspan="3" class="px-6 py-12 text-center">
                                            <i class="fa-solid fa-box-open text-gray-600 text-4xl mb-3"></i>
                                            <p class="text-gray-500 italic text-sm">Tidak ada data buku ditemukan.</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>