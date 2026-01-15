<main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#1a222c] pt-20">
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">

        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-2xl font-bold text-white">Data Anggota</h2>
            <nav>
                <a href="#" data-modal-target="c-modal" data-modal-toggle="c-modal" class="inline-flex items-center justify-center gap-2.5 rounded-md bg-blue-600 px-6 py-2 text-center font-medium text-white hover:bg-opacity-90 shadow-lg transition">
                    <i class="fa-solid fa-plus"></i> Tambah Anggota
                </a>
            </nav>
        </div>

        <?php include 'create.php'; ?>

        <div class="rounded-sm border border-[#2e3a47] bg-[#24303f] shadow-default">
            <div class="max-w-full overflow-x-auto">
                <div class="flex flex-col md:flex-row items-center justify-between border-b border-[#2e3a47] px-6 py-5">
                    <h3 class="text-xl font-semibold text-white">Daftar Anggota Perpustakaan</h3>
                    <div class="relative w-full md:w-auto mt-4 md:mt-0">
                        <button class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <input
                            type="text"
                            placeholder="Cari Nama..."
                            class="w-full md:w-80 rounded-md border border-[#2e3a47] bg-[#1a222c] py-2 pl-11 pr-4 text-white outline-none focus:border-blue-500 transition" />
                    </div>
                </div>

                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-[#313d4a] text-left">
                            <th class="px-4 py-4 font-medium text-white text-center">No</th>
                            <th class="px-4 py-4 font-medium text-white">Kode Anggota</th>
                            <th class="px-4 py-4 font-medium text-white">Nama</th>
                            <th class="px-4 py-4 font-medium text-white">JK</th>
                            <th class="px-4 py-4 font-medium text-white">Alamat</th>
                            <th class="px-4 py-4 font-medium text-white">No HP</th>
                            <th class="px-4 py-4 font-medium text-white text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#2e3a47]">
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id DESC");
                        $data_anggota_array = []; // Gunakan nama yang konsisten

                        while ($anggota = mysqli_fetch_assoc($query)) {
                            $data_anggota_array[] = $anggota; 
                        ?>
                            <tr class="hover:bg-[#313d4a]/50 transition-colors">
                                <td class="px-4 py-4 text-white text-center"><?= $no++; ?></td>
                                <td class="px-4 py-4 text-white"><?= $anggota['kode_anggota']; ?></td>
                                <td class="px-4 py-4 text-white font-medium"><?= $anggota['nama']; ?></td>
                                <td class="px-4 py-4 text-white"><?= $anggota['jenis_kelamin']; ?></td>
                                <td class="px-4 py-4 text-white"><?= $anggota['alamat']; ?></td>
                                <td class="px-4 py-4 text-white"><?= $anggota['no_hp']; ?></td>
                                <td class="px-4 py-4 text-center">
                                    <div class="flex items-center justify-center gap-3">
                                        <button data-modal-target="edit-anggota-<?= $anggota['id'] ?>" data-modal-toggle="edit-anggota-<?= $anggota['id'] ?>" class="text-gray-400 hover:text-blue-500">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button data-modal-target="delete-anggota-<?= $anggota['id'] ?>" data-modal-toggle="delete-anggota-<?= $anggota['id'] ?>" class="text-gray-400 hover:text-red-500">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php
        if (!empty($data_anggota_array)) {
            foreach ($data_anggota_array as $anggota) {
                include 'edit.php';
                include 'delete.php';
            }
        }
        ?>
    </div>
</main>