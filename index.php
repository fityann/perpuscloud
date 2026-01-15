<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpus Cloud</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-[#1a222c] font-sans antialiased">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 relative overflow-hidden">

        <div class="absolute top-0 -left-4 w-72 h-72 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute bottom-0 -right-4 w-72 h-72 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

        <div class="mb-8 text-center relative z-10">
            <div class="flex items-center justify-center gap-3 mb-2">
                <div class="bg-blue-600 p-2 rounded-lg shadow-lg shadow-blue-500/50">
                    <i class="fa-solid fa-book-bookmark text-white text-2xl"></i>
                </div>
                <h1 class="text-3xl font-extrabold text-white tracking-tight">Perpus <span class="text-blue-500">Cloud</span></h1>
            </div>
            <p class="text-gray-400 text-sm">Sistem Informasi Perpustakaan Modern</p>
        </div>

        <div class="w-full max-w-md relative z-10">
            <div class="bg-[#24303f] border border-[#2e3a47] p-8 rounded-2xl shadow-2xl transition-all duration-300 hover:border-blue-500/50">
                <h2 class="text-xl font-bold text-white mb-6">Selamat Datang Kembali</h2>

                <form action="auth.php" method="post" class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-400 mb-2">Email Address</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <input type="email" name="email" id="email"
                                class="block w-full pl-10 pr-4 py-3 bg-[#1a222c] border border-[#2e3a47] rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                placeholder="nama@email.com" required />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-400 mb-2">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" name="password" id="password"
                                class="block w-full pl-10 pr-4 py-3 bg-[#1a222c] border border-[#2e3a47] rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                placeholder="••••••••" required />
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" type="checkbox" class="w-4 h-4 rounded border-[#2e3a47] bg-[#1a222c] text-blue-600 focus:ring-blue-500 focus:ring-offset-[#24303f]">
                            <label for="remember" class="ml-2 text-sm text-gray-400">Ingat Saya</label>
                        </div>
                        <a href="register.php" class="text-sm text-blue-500 hover:underline">Daftar Akun?</a>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-blue-900/30 transform transition active:scale-[0.98]">
                        Sign In
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-8 text-center relative z-10">
            <p class="text-xs text-gray-500 uppercase tracking-widest">
                Developed by <span class="text-gray-300 font-semibold">Fityan Algifari Yogaswara</span>
            </p>
        </div>

    </div>

    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
</body>

</html>