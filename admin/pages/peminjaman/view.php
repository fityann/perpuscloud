<main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#1a222c] pt-20">
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">

        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-2xl font-bold text-white">Data Peminjaman</h2>
            <nav>
                <a href="dashboard.php?page=tambahpeminjaman" class="inline-flex items-center justify-center gap-2.5 rounded-md bg-blue-600 px-6 py-2 text-center font-medium text-white hover:bg-opacity-90 shadow-lg transition">
                    <i class="fa-solid fa-plus"></i> Tambah Data
                </a>
                <a href="pages/peminjaman/print.php" class="inline-flex items-center justify-center gap-2.5 rounded-md bg-green-700 px-6 py-2 text-center font-medium text-white hover:bg-opacity-90 shadow-lg transition" target="_blank">
                    <i class="fa-solid fa-print"></i> Print Data
                </a>
            </nav>
        </div>

        <div class="rounded-sm border border-[#2e3a47] bg-[#24303f] shadow-default">
            <div class="max-w-full overflow-x-auto">
                <div class="flex flex-col md:flex-row items-center justify-between border-b border-[#2e3a47] px-6 py-5">
                    <h3 class="text-xl font-semibold text-white">Daftar Peminjaman Buku</h3>

                    <div class="relative w-full md:w-auto mt-4 md:mt-0">
                        <button class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <input
                            type="text"
                            placeholder="Cari data..."
                            class="w-full md:w-80 rounded-md border border-[#2e3a47] bg-[#1a222c] py-2 pl-11 pr-4 text-white outline-none focus:border-blue-500 transition" />
                    </div>
                </div>

                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-[#313d4a] text-left">
                            <th class="px-4 py-4 font-medium text-white text-center w-20">No</th>
                            <th class="px-4 py-4 font-medium text-white">Nama Anggota</th>
                            <th class="px-4 py-4 font-medium text-white">Nama Petugas (User)</th>
                            <th class="px-4 py-4 font-medium text-white text-center">Tgl Pinjam</th>
                            <th class="px-4 py-4 font-medium text-white text-center">Tgl Kembali</th>
                            <th class="px-4 py-4 font-medium text-white text-center">Status</th>
                            <th class="px-4 py-4 font-medium text-white text-center w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#2e3a47]">
                        <?php
                        $no = 1;
                        $peminjaman_sql = "SELECT p.*, a.nama AS nama_anggota, u.nama AS nama_user FROM peminjaman p
                                           INNER JOIN anggota a ON p.anggota_id = a.id 
                                           INNER JOIN users u ON p.user_id = u.id 
                                           ORDER BY p.id DESC";

                        $peminjaman_query = mysqli_query($koneksi, $peminjaman_sql);

                        if (mysqli_num_rows($peminjaman_query) > 0) :
                            while ($peminjaman = mysqli_fetch_assoc($peminjaman_query)) :
                        ?>
                                <tr class="hover:bg-[#313d4a]/50 transition-colors">
                                    <td class="px-4 py-4 text-white text-center"><?= $no++; ?></td>
                                    <td class="px-4 py-4 text-white font-medium"><?= $peminjaman['nama_anggota']; ?></td>
                                    <td class="px-4 py-4 text-white"><?= $peminjaman['nama_user']; ?></td>
                                    <td class="px-4 py-4 text-white text-center"><?= date('d M Y', strtotime($peminjaman['tanggal_pinjam'])); ?></td>
                                    <td class="px-4 py-4 text-white text-center"><?= date('d M Y', strtotime($peminjaman['tanggal_kembali'])); ?></td>
                                    <td class="px-4 py-4 text-center">
                                        <span class="inline-flex rounded-full bg-opacity-10 px-3 py-1 text-sm font-medium <?= $peminjaman['status'] == 'dipinjam' ? 'bg-warning text-yellow-500' : 'bg-success text-green-500' ?>">
                                            <?= ucfirst($peminjaman['status']); ?>
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            <a href="dashboard.php?page=detailpeminjaman&id=<?= $peminjaman['id']; ?>" class="text-gray-400 hover:text-green-500 transition">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <button data-modal-target="edit-peminjaman-<?= $peminjaman['id']; ?>" data-modal-toggle="edit-peminjaman-<?= $peminjaman['id']; ?>" class="text-gray-400 hover:text-blue-500 transition">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button data-modal-target="delete-peminjaman-<?= $peminjaman['id']; ?>" data-modal-toggle="delete-peminjaman-<?= $peminjaman['id']; ?>" class="text-gray-400 hover:text-red-500 transition">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                include 'edit.php';
                                include 'delete.php';
                                ?>
                            <?php
                            endwhile;
                        else :
                            ?>
                            <tr>
                                <td colspan="7" class="p-10 text-center text-gray-500">Belum ada data peminjaman.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>