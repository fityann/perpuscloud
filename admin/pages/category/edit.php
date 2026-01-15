<div id="edit-kategori-<?= $kategori['id']; ?>" tabindex="-1" class="hidden fixed inset-0 z-[10000] bg-black/60 backdrop-blur-sm flex items-center justify-center">
    <div class="relative p-4 w-full max-w-md">
        <div class="relative bg-[#24303f] border border-[#2e3a47] rounded-lg">
            <div class="flex items-center justify-between border-b border-[#2e3a47] px-6 py-4">
                <h3 class="text-xl font-semibold text-white">Edit Kategori</h3>
                <button type="button" data-modal-hide="edit-kategori-<?= $kategori['id']; ?>" class="text-gray-400 hover:text-white">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form action="pages/category/action.php?act=update" method="POST" class="p-6">
                <input type="hidden" name="id" value="<?= $kategori['id']; ?>">
                <div>
                    <label class="mb-2 block text-sm font-medium text-white">Nama Kategori</label>
                    <input type="text" name="nama_kategori" value="<?= $kategori['nama_kategori']; ?>" class="w-full rounded-md border border-[#2e3a47] bg-[#1a222c] px-4 py-2.5 text-white outline-none focus:border-blue-500" required>
                </div>
                <div class="mt-8 flex justify-end gap-3 border-t border-[#2e3a47] pt-6">
                    <button data-modal-hide="edit-kategori-<?= $kategori['id']; ?>" type="button" class="text-white px-5 py-2">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>