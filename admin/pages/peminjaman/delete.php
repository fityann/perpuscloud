<div id="delete-peminjaman-<?= $peminjaman['id']; ?>" tabindex="-1" class="hidden fixed inset-0 z-[10000] bg-black/60 backdrop-blur-sm flex items-center justify-center">
    <div class="relative p-4 w-full max-w-md">
        <div class="relative bg-[#24303f] border border-[#2e3a47] rounded-lg p-6 text-center shadow-2xl">
            <i class="fa-solid fa-circle-exclamation text-red-500 text-5xl mb-4"></i>

            <h3 class="mb-5 text-lg text-gray-300">
                Hapus data peminjaman atas nama <br>
                <b class="text-white text-xl">"<?= $peminjaman['nama_anggota']; ?>"</b>?
            </h3>

            <p class="mb-6 text-sm text-gray-400">Tindakan ini tidak dapat dibatalkan.</p>

            <div class="flex justify-center gap-3">
                <a href="pages/peminjaman/action.php?act=delete&id=<?= $peminjaman['id']; ?>" class="bg-red-600 text-white px-6 py-2.5 rounded-lg hover:bg-red-700 font-semibold transition-all shadow-lg shadow-red-900/20">
                    Ya, Hapus
                </a>
                <button data-modal-hide="delete-peminjaman-<?= $peminjaman['id']; ?>" type="button" class="bg-[#313d4a] text-white px-6 py-2.5 rounded-lg hover:bg-[#3d4a59] transition-all">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>