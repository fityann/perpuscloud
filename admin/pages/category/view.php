<main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#1a222c] pt-20">
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">

        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-2xl font-bold text-white">Data Kategori</h2>
            <nav>
                <a href="#" data-modal-target="c-modal" data-modal-toggle="c-modal" class="inline-flex items-center justify-center gap-2.5 rounded-md bg-blue-600 px-6 py-2 text-center font-medium text-white hover:bg-opacity-90 shadow-lg transition">
                    <i class="fa-solid fa-plus"></i> Tambah Data
                </a>
            </nav>
        </div>

        <?php include 'create.php'; ?>

        <div class="rounded-sm border border-[#2e3a47] bg-[#24303f] shadow-default">
            <div class="max-w-full overflow-x-auto">
                <div class="flex flex-col md:flex-row items-center justify-between border-b border-[#2e3a47] px-6 py-5">
                    <h3 class="text-xl font-semibold text-white">Daftar Pustaka</h3>

                    <div class="relative w-full md:w-auto mt-4 md:mt-0">
                        <button class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <input
                            type="text"
                            placeholder="Cari berdasarkan kategori  ..."
                            class="w-full md:w-80 rounded-md border border-[#2e3a47] bg-[#1a222c] py-2 pl-11 pr-4 text-white outline-none focus:border-blue-500 transition" />
                    </div>
                </div>

                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-[#313d4a] text-left">
                            <th class="px-4 py-4 font-medium text-white text-center w-20">No</th>
                            <th class="px-4 py-4 font-medium text-white">Kategori</th>
                            <th class="px-4 py-4 font-medium text-white text-center w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#2e3a47]">
                        <?php
                        $no = 1;
                        $kategori_sql = "SELECT * FROM kategori ORDER BY id DESC";
                        $kategori_query = mysqli_query($koneksi, $kategori_sql);
                        $data_kategori_array = [];

                        while ($kategori = mysqli_fetch_assoc($kategori_query)) {
                            $data_kategori_array[] = $kategori; 
                        ?>
                            <tr class="hover:bg-[#313d4a]/50 transition-colors">
                                <td class="px-4 py-4 text-white text-center"><?= $no++; ?></td>
                                <td class="px-4 py-4 text-white font-medium"><?= $kategori['nama_kategori']; ?></td>
                                <td class="px-4 py-4 text-white text-center">
                                    <div class="flex items-center justify-center gap-3">
                                        <button data-modal-target="edit-kategori-<?= $kategori['id']; ?>" data-modal-toggle="edit-kategori-<?= $kategori['id']; ?>" class="text-gray-400 hover:text-blue-500 transition">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button data-modal-target="delete-kategori-<?= $kategori['id']; ?>" data-modal-toggle="delete-kategori-<?= $kategori['id']; ?>" class="text-gray-400 hover:text-red-500 transition">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>

                <?php if (mysqli_num_rows($kategori_query) == 0) : ?>
                    <div class="p-10 text-center text-gray-500">Belum ada data kategori.</div>
                <?php endif; ?>
            </div>
        </div>

        <?php
        if (!empty($data_kategori_array)) {
            foreach ($data_kategori_array as $kategori) {
                include 'edit.php';
                include 'delete.php';
            }
        }
        ?>
    </div>
</main>