<div id="c-modal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-[10000] hidden h-full w-full overflow-y-auto bg-black/60 backdrop-blur-sm">
    <div class="relative flex min-h-screen items-center justify-center p-4 w-full">
        <div class="relative w-full max-w-md rounded-lg border border-[#2e3a47] bg-[#24303f] shadow-2xl">
            <div class="flex items-center justify-between border-b border-[#2e3a47] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Tambah Kategori</h3>
                <button type="button" data-modal-hide="c-modal" class="text-gray-400 hover:text-white">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>
            <form action="pages/category/action.php?act=insert" method="POST" class="p-6">
                <div>
                    <label class="mb-2 block text-sm font-medium text-white">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500" placeholder="Contoh: Sains, Novel, Sejarah" required>
                </div>
                <div class="mt-8 flex justify-end gap-3 border-t border-[#2e3a47] pt-6">
                    <button data-modal-hide="c-modal" type="button" class="text-white px-5 py-2">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>