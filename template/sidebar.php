<aside id="default-sidebar" class="fixed left-0 top-0 z-999 flex h-screen w-72 flex-col overflow-y-hidden bg-[#1c2434] duration-300 ease-linear lg:static lg:translate-x-0 shadow-2xl">
    <div class="flex items-center justify-between gap-2 px-6 py-6 border-b border-[#2e3a47]">
        <a href="dashboard.php" class="flex items-center gap-3">
            <div class="bg-blue-600 text-white p-2 rounded-lg">
                <i class="fa-solid fa-book-open text-xl"></i>
            </div>
            <span class="text-2xl font-bold text-white tracking-wide">Perpus Cloud</span>
        </a>
    </div>

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6">
            <div>
                <ul class="mb-6 flex flex-col gap-1.5">
                    
                    <li>
                        <a href="dashboard.php?page=home" class="group relative flex items-center gap-2.5 rounded-md px-4 py-2.5 font-medium text-white duration-300 ease-in-out hover:bg-[#333a48] <?= ($_GET['page'] == 'home') ? 'bg-[#333a48]' : '' ?>">
                            <i class="fa-solid fa-border-all w-5 text-lg"></i>
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <a href="?page=buku" class="group relative flex items-center gap-2.5 rounded-md px-4 py-2.5 font-medium text-gray-400 duration-300 ease-in-out hover:bg-[#333a48] hover:text-white <?= ($_GET['page'] == 'buku') ? 'bg-[#333a48] text-white' : '' ?>">
                            <i class="fa-solid fa-book w-5 text-lg"></i>
                            Data Buku
                        </a>
                    </li>

                    <li>
                        <a href="?page=kategori" class="group relative flex items-center gap-2.5 rounded-md px-4 py-2.5 font-medium text-gray-400 duration-300 ease-in-out hover:bg-[#333a48] hover:text-white <?= ($_GET['page'] == 'kategori') ? 'bg-[#333a48] text-white' : '' ?>">
                            <i class="fa-solid fa-layer-group w-5 text-lg"></i>
                            Kategori
                        </a>
                    </li>

                    <li>
                        <a href="?page=anggota" class="group relative flex items-center gap-2.5 rounded-md px-4 py-2.5 font-medium text-gray-400 duration-300 ease-in-out hover:bg-[#333a48] hover:text-white <?= ($_GET['page'] == 'anggota') ? 'bg-[#333a48] text-white' : '' ?>">
                            <i class="fa-solid fa-users w-5 text-lg"></i>
                            Anggota
                        </a>
                    </li>

                    <li>
                        <a href="?page=peminjaman" class="group relative flex items-center gap-2.5 rounded-md px-4 py-2.5 font-medium text-gray-400 duration-300 ease-in-out hover:bg-[#333a48] hover:text-white <?= ($_GET['page'] == 'peminjaman') ? 'bg-[#333a48] text-white' : '' ?>">
                            <i class="fa-solid fa-right-left w-5 text-lg"></i>
                            Peminjaman
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</aside>