<header class="fixed top-0 z-50 flex w-full bg-[#24303f] border-b border-[#2e3a47] drop-shadow-1">
    <div class="flex flex-grow items-center justify-end px-4 py-4 md:px-6 2xl:px-11">

        <div class="flex items-center gap-3 2xsm:gap-7">
            <ul class="flex items-center gap-2 2xsm:gap-4">
                <li>
                    <label class="relative m-0 block h-7.5 w-14 rounded-full bg-[#313d4a] cursor-pointer">
                        <i class="fa-regular fa-moon absolute left-2 top-1/2 -translate-y-1/2 text-white text-sm"></i>
                    </label>
                </li>
                <li>
                    <a href="#" class="relative flex h-8.5 w-8.5 items-center justify-center rounded-full border border-[#2e3a47] bg-[#313d4a] text-white hover:text-blue-500">
                        <span class="absolute -top-0.5 right-0 z-1 h-2 w-2 rounded-full bg-red-500"></span>
                        <i class="fa-regular fa-bell"></i>
                    </a>
                </li>
            </ul>

            <div class="relative">
                <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex items-center gap-4 text-left focus:outline-none" type="button">
                    <span class="hidden text-right lg:block">
                        <span class="block text-sm font-medium text-white"><?php echo $_SESSION['nama']; ?></span>
                        <span class="block text-xs font-medium text-[#8a99af]">Super Admin</span>
                    </span>
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-[#313d4a]" src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['nama']; ?>&background=3c50e0&color=fff" alt="User">
                </button>

                <div id="dropdownAvatar" class="z-[999] hidden w-64 divide-y divide-[#2e3a47] rounded-lg border border-[#2e3a47] bg-[#24303f] shadow-xl">
                    <div class="px-4 py-3 text-sm text-white">
                        <div class="font-bold"><?php echo $_SESSION['nama']; ?></div>
                        <div class="truncate text-gray-400">fityanalgifariyogaswarabelajar@gmail.com</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-300" aria-labelledby="dropdownUserAvatarButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-[#313d4a] hover:text-white flex items-center gap-2">
                                <i class="fa-regular fa-user w-4"></i> Account
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-[#313d4a] hover:text-white flex items-center gap-2">
                                <i class="fa-solid fa-gear w-4"></i> Settings
                            </a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a href="../logout.php" class="block px-4 py-2 text-sm text-red-400 hover:bg-[#313d4a] flex items-center gap-2">
                            <i class="fa-solid fa-arrow-right-from-bracket w-4"></i> Sign out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>