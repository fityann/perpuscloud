<main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#1a222c] pt-24 pb-10">
    <div class="mx-auto max-w-screen-xl px-4 md:px-6">

        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-2xl font-bold text-white">Buat Peminjaman Baru</h2>
            <a href="dashboard.php?page=peminjaman" class="text-gray-400 hover:text-white flex items-center gap-2 transition">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>

        <form action="pages/peminjaman/action.php?act=insert" method="POST">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                <div class="rounded-lg border border-[#2e3a47] bg-[#24303f] p-6 shadow-lg">
                    <div class="mb-5 flex items-center gap-2 border-b border-[#2e3a47] pb-3">
                        <i class="fa-solid fa-user text-blue-500"></i>
                        <h3 class="font-bold text-white uppercase text-xs tracking-wider">Data Utama</h3>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-300">Nama Anggota</label>
                            <select name="anggota_id" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white focus:border-blue-500 outline-none" required>
                                <option value="" disabled selected>-- Pilih Anggota --</option>
                                <?php
                                $q_anggota = mysqli_query($koneksi, "SELECT id, nama FROM anggota ORDER BY nama ASC");
                                while ($a = mysqli_fetch_assoc($q_anggota)) {
                                    echo "<option value='{$a['id']}'>{$a['nama']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-300">Nama Petugas</label>
                            <select name="user_id" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white focus:border-blue-500 outline-none" required>
                                <option value="" disabled selected>-- Pilih Petugas --</option>
                                <?php
                                $q_user = mysqli_query($koneksi, "SELECT id, nama FROM users ORDER BY nama ASC");
                                while ($u = mysqli_fetch_assoc($q_user)) {
                                    echo "<option value='{$u['id']}'>{$u['nama']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="mb-2 block text-xs font-semibold text-gray-500 uppercase">Tgl Pinjam</label>
                                <input type="date" name="tanggal_pinjam" value="<?= date('Y-m-d') ?>" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-3 py-2 text-white focus:border-blue-500 outline-none">
                            </div>
                            <div>
                                <label class="mb-2 block text-xs font-semibold text-gray-500 uppercase">Tgl Kembali</label>
                                <input type="date" name="tanggal_kembali" value="<?= date('Y-m-d', strtotime('+7 days')) ?>" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-3 py-2 text-white focus:border-blue-500 outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-lg border border-[#2e3a47] bg-[#24303f] p-6 shadow-lg">
                    <div class="mb-5 flex items-center gap-2 border-b border-[#2e3a47] pb-3">
                        <i class="fa-solid fa-book text-green-500"></i>
                        <h3 class="font-bold text-white uppercase text-xs tracking-wider">Buku yang Dipinjam</h3>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-300">Cari Judul / Kode Buku</label>
                            <select name="buku_id" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white focus:border-blue-500 outline-none" required>
                                <option value="" disabled selected>-- Pilih Buku --</option>
                                <?php
                                $q_buku = mysqli_query($koneksi, "SELECT b.id, b.judul, b.kode_buku FROM buku b WHERE b.stok > 0 ORDER BY b.judul ASC");
                                while ($b = mysqli_fetch_assoc($q_buku)) {
                                    echo "<option value='{$b['id']}'>[{$b['kode_buku']}] {$b['judul']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-medium text-gray-300">Jumlah Pinjam</label>
                            <input type="number" name="qty" value="1" min="1" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white focus:border-blue-500 outline-none" required>
                        </div>

                        <div class="pt-4 border-t border-[#2e3a47] flex justify-end gap-3">
                            <button type="reset" class="px-4 py-2 text-sm text-gray-400 hover:text-white transition">Bersihkan</button>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded transition duration-200">
                                Simpan Transaksi
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <input type="hidden" name="status" value="dipinjam">
        </form>
    </div>
</main>