<div id="edit-peminjaman-<?= $peminjaman['id']; ?>" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-[10000] hidden h-full w-full overflow-y-auto overflow-x-hidden bg-black/60 backdrop-blur-sm">
    <div class="relative flex min-h-screen items-center justify-center p-4 w-full">
        <div class="relative w-full max-w-md rounded-lg border border-[#2e3a47] bg-[#24303f] shadow-2xl">

            <div class="flex items-center justify-between border-b border-[#2e3a47] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">
                    Edit Transaksi Peminjaman
                </h3>
                <button type="button" class="text-gray-400 hover:text-white transition-colors" data-modal-hide="edit-peminjaman-<?= $peminjaman['id']; ?>">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="pages/peminjaman/action.php?act=update" method="POST" class="px-6">
                <input type="hidden" name="id" value="<?= $peminjaman['id']; ?>">

                <div class="grid gap-5 px-5 py-5">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Nama Anggota</label>
                        <select name="anggota_id" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500" required>
                            <?php
                            $q_anggota = mysqli_query($koneksi, "SELECT id, nama FROM anggota ORDER BY nama ASC");
                            while ($a = mysqli_fetch_assoc($q_anggota)) :
                                $selected = ($peminjaman['anggota_id'] == $a['id']) ? 'selected' : '';
                                echo "<option value='" . $a['id'] . "' $selected>" . $a['nama'] . "</option>";
                            endwhile;
                            ?>
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Petugas (User)</label>
                        <select name="user_id" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500" required>
                            <?php
                            $q_user = mysqli_query($koneksi, "SELECT id, nama FROM users ORDER BY nama ASC");
                            while ($u = mysqli_fetch_assoc($q_user)) :
                                $selected = ($peminjaman['user_id'] == $u['id']) ? 'selected' : '';
                                echo "<option value='" . $u['id'] . "' $selected>" . $u['nama'] . "</option>";
                            endwhile;
                            ?>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-white">Tgl Pinjam</label>
                            <input type="date" name="tanggal_pinjam" value="<?= $peminjaman['tanggal_pinjam']; ?>" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500" required>
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-white">Tgl Kembali</label>
                            <input type="date" name="tanggal_kembali" value="<?= $peminjaman['tanggal_kembali']; ?>" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500" required>
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Status</label>
                        <select name="status" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500">
                            <option value="dipinjam" <?= $peminjaman['status'] == 'dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                            <option value="kembali" <?= $peminjaman['status'] == 'kembali' ? 'selected' : '' ?>>Kembali</option>
                        </select>
                    </div>
                </div>

                <div class="mt-8 flex items-center justify-end gap-3 border-t border-[#2e3a47] pt-6 pb-5 pr-5">
                    <button data-modal-hide="edit-peminjaman-<?= $peminjaman['id']; ?>" type="button" class="rounded-md border border-[#2e3a47] px-5 py-2 text-sm font-medium text-white hover:bg-[#313d4a]">
                        Batal
                    </button>
                    <button type="submit" class="rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-opacity-90 shadow-md transition">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>