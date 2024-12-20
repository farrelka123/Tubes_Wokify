<head>  
    <meta charset="utf-8" />  
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />  
    <title>KitaLulus Registration</title>  
    <script src="https://cdn.tailwindcss.com"></script>  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />  
</head>  

<body class="bg-gray-50">  
    <header class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <img src="../asset/img/logo.png" alt="Workify Logo" class="h-10">
                <div>
                    <h1 class="text-2xl font-extrabold text-white tracking-tight">WORKIFY</h1>
                    <p class="text-sm text-blue-200">Find Your Dream Job</p>
                </div>
            </div>
    
            <!-- Navigation Menu -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="../login.php" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Masuk</a>
                <a href="../daftar.php" class="font-bold text-white hover:text-yellow-300">Untuk Pengguna</a>
            </nav>
    
            <!-- Hamburger Menu -->
            <button id="menu-toggle" class="md:hidden flex items-center text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
</header>
    
    </header>  

    <main class="flex flex-col lg:flex-row items-center justify-center min-h-screen p-4">  
        <div class="w-full lg:w-1/2 p-8 bg-white shadow-md rounded-lg">  
            <h1 class="text-3xl font-bold mb-4">Bersiaplah Memulai Misi Pencarian</h1>  
            <p class="mb-8">Pasang lowongan pekerjaan gratis, cepat, dan mudah.</p>  
            <form class="space-y-4">  
                <div>  
                    <label class="block text-sm font-medium text-gray-700" for="company-name">Nama perusahaan</label>  
                    <input class="mt-1 block w-full border border-gray-300 rounded-md p-2" id="company-name"  
                           placeholder="Ketik nama perusahaan Anda" type="text" required />  
                </div>  
                <div>  
                    <label class="block text-sm font-medium text-gray-700" for="full-name">Nama lengkap</label>  
                    <input class="mt-1 block w-full border border-gray-300 rounded-md p-2" id="full-name"  
                           placeholder="Ketik nama lengkap Anda" type="text" required />  
                </div>  
                <div>  
                    <label class="block text-sm font-medium text-gray-700" for="email">Alamat email pekerjaan</label>  
                    <input class="mt-1 block w-full border border-gray-300 rounded-md p-2" id="email"  
                           placeholder="Gunakan email berdomain perusahaan" type="email" required />  
                </div>  
                <div>  
                    <label class="block text-sm font-medium text-gray-700" for="phone">Nomor telepon</label>  
                    <div class="flex relative">  
                        <span class="inline-flex items-center px-3 border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">+62</span>  
                        <input class="mt-1 block w-full border border-gray-300 rounded-md p-2 pl-3" id="phone"  
                               placeholder="Ketik tanpa angka 0 di depan" type="text" required />  
                    </div>  
                </div>  
                <div>  
                    <label class="block text-sm font-medium text-gray-700" for="password">Kata sandi</label>  
                    <div class="relative">  
                        <input class="mt-1 block w-full border border-gray-300 rounded-md p-2" id="password"  
                               placeholder="Ketik kata sandi" type="password" required />  
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">  
                            <i class="fas fa-eye-slash"></i>  
                        </span>  
                    </div>  
                </div>  
                <div>  
                    <label class="block text-sm font-medium text-gray-700" for="confirm-password">Ketik ulang kata sandi</label>  
                    <div class="relative">  
                        <input class="mt-1 block w-full border border-gray-300 rounded-md p-2" id="confirm-password"  
                               placeholder="Ketik ulang kata sandi" type="password" required />  
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">  
                            <i class="fas fa-eye-slash"></i>  
                        </span>  
                    </div>  
                </div>  
                <div class="flex items-center">  
                    <input class="h-4 w-4 text-blue-600 border-gray-300 rounded" id="terms" type="checkbox" required />  
                    <label class="ml-2 block text-sm text-gray-900" for="terms">  
                        Mendaftar dan menyetujui  
                        <a class="text-blue-600" href="#">Persyaratan dan Kebijakan Privasi</a>.  
                    </label>  
                </div>  
                <button class="w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200" type="submit">Daftar</button>  
            </form>  
            <p class="mt-4 text-center">  
                Sudah punya akun?  
                <a class="text-blue-600" href="#">Masuk</a>  
            </p>  
        </div>  
        <div class="w-full lg:w-1/2 p-8 flex flex-col items-center">  
            <h2 class="text-2xl font-bold mb-4">Dasbor Perusahaan KitaLulus</h2>  
            <p class="mb-4">  
                <span class="text-blue-600">GRATIS</span>  
                Pasang Loker, Cukup  
                <span class="text-blue-600">5 MENIT!</span>  
            </p>  
            <img alt="Ilustrasi dasbor perusahaan" class="mb-4" src="https://storage.googleapis.com/a1aa/image/zzerRrcBRzy0QSgAbzfcv6r9Z7D7Ee6USylF8x3oFFBnVJ0nA.jpg" width="300" />  
            <div class="flex space-x-4">  
                <a href="#">  
                    <i class="fab fa-instagram text-2xl text-gray-600"></i>  
                </a>  
                <a href="#">  
                    <i class="fab fa-tiktok text-2xl text-gray-600"></i>  
                </a>  
                <a href="#">  
                    <i class="fab fa-xing text-2xl"></i>  
                </a>  
            </div>  
        </div>  
    </main>  

    <footer class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 text-white py-6 mt-auto">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 WORKIFY. All Rights Reserved.</p>
            
        </div>
    </footer>
</body>  
</html>
