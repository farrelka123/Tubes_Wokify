<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

    <style>
        .slider {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
        }
        .slider::-webkit-scrollbar {
            display: none;
        }
        .slide {
            scroll-snap-align: start;
            flex: none;
            width: 100%;
            max-width: 300px;
            margin-right: 16px;
        }
    </style>
</head>
<body>

<header class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <img src="asset/img/logo.png" alt="Workify Logo" class="h-10">
                <div>
                    <h1 class="text-2xl font-extrabold text-white tracking-tight">WORKIFY</h1>
                    <p class="text-sm text-blue-200">Find Your Dream Job</p>
                </div>
            </div>
    
            <!-- Navigation Menu -->
            
    
            <!-- Hamburger Menu -->
            <button id="menu-toggle" class="md:hidden flex items-center text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden bg-blue-600 text-white">
            <nav class="flex flex-col space-y-4 py-4 px-6">
                <a href="../perusahaan/daftar.html" class="font-bold text-white hover:text-yellow-300">Untuk Perusahaan</a>
            </nav>
        </div>
</header>

<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-500 to-blue-400 text-white py-16 lg:py-24">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('https://source.unsplash.com/1600x900/?office,work');"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <!-- Heading -->
        <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">
            Temukan Karier Impian Anda di <span class="text-blue-900">Workify</span>
        </h1>
        <!-- Subheading -->
        <p class="mt-6 text-lg sm:text-xl text-blue-100">
            Mulailah perjalanan Anda menuju masa depan yang lebih cerah. Jelajahi peluang kerja sesuai keahlian Anda di sini.
        </p>
        <!-- Buttons -->
        <div class="mt-8 flex justify-center space-x-4">
            <a href="login.php" class="bg-blue-700 hover:bg-blue-900 text-white px-6 py-3 rounded-lg shadow-md text-lg font-medium transition-transform transform hover:scale-105">
                Masuk Sekarang
            </a>
            <a href="daftar.php" class="border border-gray-200 text-white hover:bg-blue-400 hover:text-white px-6 py-3 rounded-lg text-lg font-medium transition-transform transform hover:scale-105">
                Daftar Sekarang
            </a>
        </div>
    </div>
</section>

<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold text-gray-900">Temukan perusahaan Anda berikutnya</h1>
    <p class="mt-2 text-gray-600">Jelajahi profil perusahaan untuk menemukan tempat kerja yang tepat bagi Anda. Pelajari tentang pekerjaan, ulasan, budaya perusahaan, keuntungan, dan tunjangan.</p>
    <div class="relative mt-8">
        <div class="slider flex">
            <div class="slide bg-white p-6 rounded-lg shadow-md">
                <img src="./asset/img/bni.png" class="h-12 mx-auto" height="50"/>
                <h2 class="mt-4 text-lg font-semibold text-gray-900 text-center">BNI</h2>
                <p class="mt-2 text-center text-gray-600">6 Pekerjaan</p>
            </div>
            <div class="slide bg-white p-6 rounded-lg shadow-md">
                <img src="./asset/img/pertamina.png" class="h-12 mx-auto" height="50"/>
                <h2 class="mt-4 text-lg font-semibold text-gray-900 text-center">Pertamina</h2>
                <p class="mt-2 text-center text-gray-600">10 Pekerjaan</p>
            </div>
            <div class="slide bg-white p-6 rounded-lg shadow-md">
                <img src="./asset/img/fiverr.png" class="h-12 mx-auto" height="50"/>
                <h2 class="mt-4 text-lg font-semibold text-gray-900 text-center">Fiverr</h2>
                <p class="mt-2 text-center text-gray-600">13 Pekerjaan</p>
            </div>
            <div class="slide bg-white p-6 rounded-lg shadow-md">
                <img src="./asset/img/telkom.png" class="h-12 mx-auto" height="50"/>
                <h2 class="mt-4 text-lg font-semibold text-gray-900 text-center">Telkom Indonesia</h2>
                <p class="mt-2 text-center text-gray-600">36 Pekerjaan</p>
            </div>
            <div class="slide bg-white p-6 rounded-lg shadow-md">
                <img src="./asset/img/gojek.png" class="h-12 mx-auto" height="50"/>
                <h2 class="mt-4 text-lg font-semibold text-gray-900 text-center">Gojek</h2>
                <p class="mt-2 text-center text-gray-600">3 Pekerjaan</p>
            </div>
        </div>
        <button class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md" onclick="scrollLeft()">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md" onclick="scrollRight()">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>

<!-- Keunggulan -->
<section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 text-center mb-8">Keunggulan Menggunakan Website Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300">
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Ribuan Lowongan</h3>
                    <p class="text-gray-600">Temukan ribuan pekerjaan sesuai dengan keahlian Anda di berbagai industri.</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300">
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Template CV Profesional</h3>
                    <p class="text-gray-600">Buat CV profesional yang menarik untuk meningkatkan peluang Anda.</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition duration-300">
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Konsultasi Karier</h3>
                    <p class="text-gray-600">Dapatkan saran karier dari para ahli untuk membantu Anda berkembang.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-blue-800 text-center text-white py-8">
    <!-- Hak Cipta -->
        <p>&copy; 2024 Workify. Hak Cipta Dilindungi.</p>
    </div>
</footer>

<script>
    function scrollLeft() {
        document.querySelector('.slider').scrollBy({
            left: -300,
            behavior: 'smooth'
        });
    }
    function scrollRight() {
        document.querySelector('.slider').scrollBy({
            left: 300,
            behavior: 'smooth'
        });
    }
</script>
</body>
</html>
