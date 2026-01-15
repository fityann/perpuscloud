<div id="delete-anggota-<?= $anggota['id']; ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[10000] justify-center items-center w-full md:inset-0 h-full bg-black/60 backdrop-blur-sm">
    <div class="relative p-4 w-full max-w-md">
        <div class="relative bg-[#24303f] border border-[#2e3a47] rounded-lg shadow-2xl p-6 text-center">
            <div class="flex justify-center mb-4 text-red-500">
                <i class="fa-solid fa-circle-exclamation text-6xl"></i>
            </div>
            <h3 class="mb-5 text-lg font-normal text-gray-300">
                Apakah Anda yakin ingin menghapus anggota <br>
                <b class="text-white text-xl">"<?= $anggota['nama']; ?>"</b>?
            </h3>
            <div class="flex justify-center gap-3">
                <a href="pages/anggota/action.php?act=delete&id=<?= $anggota['id']; ?>" class="bg-red-600 text-white px-5 py-2.5 rounded-lg hover:bg-red-700 transition font-medium">
                    Ya, Hapus
                </a>
                <button data-modal-hide="delete-anggota-<?= $anggota['id']; ?>" class="bg-[#313d4a] text-white px-5 py-2.5 rounded-lg border border-[#2e3a47] hover:bg-[#3d4d5d] transition">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>