<div id="c-modal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-[10000] hidden h-full w-full overflow-y-auto bg-black/60 backdrop-blur-sm">
    <div class="relative flex min-h-screen items-center justify-center p-4 w-full">
        <div class="relative w-full max-w-md rounded-lg border border-[#2e3a47] bg-[#24303f] shadow-2xl">
            <div class="flex items-center justify-between border-b border-[#2e3a47] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Tambah Anggota Baru</h3>
                <button type="button" class="text-gray-400 hover:text-white" data-modal-hide="c-modal">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <form action="pages/anggota/action.php?act=insert" method="POST" class="p-6">
                <div class="grid gap-4">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Kode Anggota</label>
                        <input type="text" name="kode_anggota" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2 text-white outline-none focus:border-blue-500" placeholder="Contoh: AGT001" required>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Nama Lengkap</label>
                        <input type="text" name="nama" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2 text-white outline-none focus:border-blue-500" placeholder="Masukkan nama" required>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2 text-white outline-none focus:border-blue-500" required>
                            <option value="" disabled selected>-- Pilih JK --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    
                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2 text-white outline-none focus:border-blue-500" placeholder="Alamat lengkap..."></textarea>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-white">Nomor HP</label>
                        <input type="text" name="no_hp" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2 text-white outline-none focus:border-blue-500" placeholder="08xxxx">
                    </div>
                </div>

                <div class="mt-8 flex justify-end gap-3 border-t border-[#2e3a47] pt-6">
                    <button data-modal-hide="c-modal" type="button" class="px-5 py-2 text-white">Batal</button>
                    <button type="submit" class="rounded-md bg-blue-600 px-6 py-2 font-medium text-white hover:bg-blue-700 transition">Simpan Anggota</button>
                </div>
            </form>
        </div>
    </div>
</div>