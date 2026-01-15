<div id="edit-anggota-<?= $anggota['id']; ?>" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-[10000] hidden h-full w-full overflow-y-auto bg-black/60 backdrop-blur-sm">
    <div class="relative flex min-h-screen items-center justify-center p-4 w-full">
        <div class="relative w-full max-w-md rounded-lg border border-[#2e3a47] bg-[#24303f] shadow-2xl">

            <div class="flex items-center justify-between border-b border-[#2e3a47] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Edit Anggota</h3>
                <button type="button" class="text-gray-400 hover:text-white" data-modal-hide="edit-anggota-<?= $anggota['id']; ?>">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form action="pages/anggota/action.php?act=update" method="POST" class="p-6">
                <input type="hidden" name="id" value="<?= $anggota['id']; ?>">

                <div class="grid gap-4">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Kode Anggota</label>
                        <input type="text" class="w-full rounded-md border border-[#2e3a47] bg-[#313d4a] px-4 py-2 text-gray-400 outline-none" value="<?= $anggota['kode_anggota']; ?>" readonly>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Nama</label>
                        <input type="text" name="nama" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2 text-white outline-none focus:border-blue-500" value="<?= $anggota['nama']; ?>" required>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2 text-white outline-none focus:border-blue-500">
                            <option value="L" <?= $anggota['jenis_kelamin'] == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="P" <?= $anggota['jenis_kelamin'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2 text-white outline-none focus:border-blue-500"><?= $anggota['alamat']; ?></textarea>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">No HP</label>
                        <input type="text" name="no_hp" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2 text-white outline-none focus:border-blue-500" value="<?= $anggota['no_hp']; ?>">
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3 border-t border-[#2e3a47] pt-6">
                    <button data-modal-hide="edit-anggota-<?= $anggota['id']; ?>" type="button" class="text-white">Batal</button>
                    <button type="submit" class="rounded-md bg-blue-600 px-6 py-2 font-medium text-white hover:bg-blue-700 shadow-lg">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>