<div id="u-modal-<?= $buku['id']; ?>" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-[10000] hidden h-full w-full overflow-y-auto overflow-x-hidden bg-black/60 backdrop-blur-sm">
    <div class="relative flex min-h-screen items-center justify-center p-4 w-full">
        <div class="relative w-full max-w-md rounded-lg border border-[#2e3a47] bg-[#24303f] shadow-2xl">

            <div class="flex items-center justify-between border-b border-[#2e3a47] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">
                    Edit Buku
                </h3>
                <button type="button" class="text-gray-400 hover:text-white transition-colors" data-modal-hide="u-modal-<?= $buku['id']; ?>">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="pages/buku/action.php?act=update&id=<?= $buku['id']; ?>" method="POST" class="p-6">
                <div class="grid gap-5">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Judul Buku</label>
                        <input type="text" name="judul" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500" placeholder="Masukkan judul buku" required value="<?= $buku['judul']; ?>">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-white">Kode Buku</label>
                            <input type="text" name="kode_buku" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500" value="<?= $buku['kode_buku']; ?>">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-white">Stok</label>
                            <input type="number" name="stok" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500" placeholder="0" value="<?= $buku['stok']; ?>">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Kategori</label>
                        <select name="kategori_id" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500">
                            <option value="" disabled selected>--Pilih Kategori--</option>
                            <?php
                            $kategori_sql = "SELECT * FROM kategori";
                            $kategori_query = mysqli_query($koneksi, $kategori_sql);
                            while ($kategori = mysqli_fetch_assoc($kategori_query)) {
                                ?>
                                <option value="<?= $kategori['id']; ?>" <?php if ($buku['kategori_id'] == $kategori['id']) echo 'selected'; ?>><?= $kategori['nama_kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Pengarang</label>
                        <input type="text" name="pengarang" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500" value="<?= $buku['pengarang']; ?>">
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Penerbit</label>
                        <input type="text" name="penerbit" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500" value="<?= $buku['penerbit']; ?>">
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500" value="<?= $buku['tahun_terbit']; ?>">
                    </div>
                </div>

                    <div class="mt-8 flex items-center justify-end gap-3 border-t border-[#2e3a47] pt-6">
                    <button data-modal-hide="u-modal-<?= $buku['id']; ?>" type="button" class="rounded-md border border-[#2e3a47] px-5 py-2 text-sm font-medium text-white hover:bg-[#313d4a]">
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