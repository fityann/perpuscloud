<div id="delete-kategori-<?= $kategori['id']; ?>" tabindex="-1" class="hidden fixed inset-0 z-[10000] bg-black/60 backdrop-blur-sm flex items-center justify-center">
    <div class="relative p-4 w-full max-w-md">
        <div class="relative bg-[#24303f] border border-[#2e3a47] rounded-lg p-6 text-center">
            <i class="fa-solid fa-circle-exclamation text-red-500 text-5xl mb-4"></i>
            <h3 class="mb-5 text-lg text-gray-300">Hapus kategori <br><b class="text-white">"<?= $kategori['nama_kategori']; ?>"</b>?</h3>
            <div class="flex justify-center gap-3">
                <a href="pages/category/action.php?act=delete&id=<?= $kategori['id']; ?>" class="bg-red-600 text-white px-5 py-2.5 rounded-lg hover:bg-red-700">Ya, Hapus</a>
                <button data-modal-hide="delete-kategori-<?= $kategori['id']; ?>" class="bg-[#313d4a] text-white px-5 py-2.5 rounded-lg">Batal</button>
            </div>
        </div>
    </div>
</div>