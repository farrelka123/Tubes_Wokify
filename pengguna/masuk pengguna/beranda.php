<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workify Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-size: cover; /* Sesuaikan ukuran gambar agar menutupi seluruh latar */
            background-position: center; /* Posisikan gambar di tengah */
            background-repeat: no-repeat; /* Hindari pengulangan gambar */
        }
    </style>
</head>

<header class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 shadow-lg">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
        <!-- Logo -->
        <div class="flex items-left space-x-4">
            <img src="../asset/img/logo.png" alt="Workify Logo" class="h-10">
            <div>
                <h1 class="text-2xl font-extrabold text-white tracking-tight">WORKIFY</h1>
                <p class="text-sm text-blue-200">Find Your Dream Job</p>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="hidden md:flex items-center space-x-6">
            <a href="beranda.php" class="text-white font-medium hover:text-yellow-300 transition">Cari Lowongan</a>
            <a href="template.html" class="text-white font-medium hover:text-yellow-300 transition">Template CV</a>
            <a href="zoom.html" class="text-white font-medium hover:text-yellow-300 transition">Zoom</a>

            <!-- Action Buttons -->
            <div class="flex items-center space-x-4">
                <!-- Notification Icon -->
                <a href="notif.html" class="hover:scale-110 transition">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M12 5.365V3m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175 0 .593 0 1.193-.538 1.193H5.538c-.538 0-.538-.6-.538-1.193 0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.365Z" />
                    </svg>
                </a>
                <!-- Chat Icon -->
                <a href="chat.html" class="hover:scale-110 transition">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M9 17h6l3 3v-3h2V9h-2M4 4h11v8H9l-3 3v-3H4V4Z" />
                    </svg>
                </a>

                <div class="relative">
                    <!-- Profile Button with Elongated Border -->
                    <button id="profile-toggle" class="flex items-center space-x-3 focus:outline-none px-4 py-2 rounded-full border-2 border-blue-600">
                        <!-- Avatar -->
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center shadow-md">
                            <img src="../asset/img/lisa.jpg" alt="Profile" class="w-10 h-10 rounded-full border-2 border-white">
                        </div>
                        <!-- Username and Icon -->
                        <span class="text-lg font-semibold text-white flex items-center space-x-1">
                            <span>DELL</span>
                            <!-- Small Icon next to the username -->
                            <svg id="dropdown-icon" class="w-4 h-4 text-white transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l7-7 7 7" />
                            </svg>
                        </span>
                    </button>
                
                    <!-- Dropdown Menu -->
                    <div id="profile-dropdown" class="hidden absolute right-0 mt-3 w-56 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 transition-all duration-200">
                        <div class="flex flex-col">
                            <a href="profilsaya.html" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gradient-to-r from-blue-500 to-blue-400 hover:text-white transition">
                                <i class="fas fa-user mr-3 text-blue-500 group-hover:text-white"></i> Profil Saya
                            </a>
                            <a href="lamaransaya.html" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gradient-to-r from-blue-500 to-blue-400 hover:text-white transition">
                                <i class="fas fa-file-alt mr-3 text-blue-500 group-hover:text-white"></i> Lamaran Saya
                            </a>
                            <a href="logout.html" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-500 hover:text-white transition">
                                <i class="fas fa-power-off mr-3 text-red-500 group-hover:text-white"></i> Keluar
                            </a>
                        </div>
                    </div>
                </div>  
        </nav>
</header>

<!-- JavaScript to Toggle the Dropdown -->
<script>
// Toggle the Profile Dropdown
document.getElementById('profile-toggle').addEventListener('click', function (event) {
    const dropdown = document.getElementById('profile-dropdown');
    dropdown.classList.toggle('hidden');
    
    // Stop the event from propagating to the document level
    event.stopPropagation();
});

// Get the dropdown icon element
const icon = document.getElementById('dropdown-icon');

// Toggle icon rotation on click
icon.addEventListener('click', function () {
    icon.classList.toggle('rotate-180'); // This will rotate the icon by 180 degrees
});
</script>

<body>
<div class="container mx-auto px-6 py-8">
    <div class="flex flex-wrap justify-between items-center gap-6">
        <!-- Dropdown Jenis Kerjaan -->
        <div class="flex flex-col w-full sm:w-1/3 md:w-1/4">
            <label for="jobType" class="text-blue-500 mb-2 font-semibold text-lg">Jenis Kerjaan</label>
            <select id="jobType" class="p-3 rounded-lg border-2 border-gray-300 shadow-md w-full bg-white text-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-transform duration-300 ease-in-out transform hover:scale-105">
                <option disabled selected>Pilih Jenis Kerjaan</option>
                <option value="1">Full Time</option>
                <option value="2">Part Time</option>
            </select>
        </div>

        <!-- Dropdown Klasifikasi Pekerjaan -->
        <div class="flex flex-col w-full sm:w-1/3 md:w-1/4">
            <label for="jobClassification" class="text-blue-500 mb-2 font-semibold text-lg">Klasifikasi Pekerjaan</label>
            <select id="jobClassification" class="p-3 rounded-lg border-2 border-gray-300 shadow-md w-full bg-white text-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-transform duration-300 ease-in-out transform hover:scale-105">
                <option selected disabled>Pilih Klasifikasi</option>
                <option value="1">Teknologi</option>
                <option value="2">Pendidikan</option>
            </select>
        </div>

        <!-- Dropdown Lokasi -->
        <div class="flex flex-col w-full sm:w-1/3 md:w-1/4">
            <label for="location" class="text-blue-500 mb-2 font-semibold text-lg">Lokasi</label>
            <select id="location" class="p-3 rounded-lg border-2 border-gray-300 shadow-md w-full bg-white text-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-transform duration-300 ease-in-out transform hover:scale-105">
                <option selected disabled>Pilih Lokasi</option>
                <option value="1">Jakarta</option>
                <option value="2">Surabaya</option>
            </select>
            
            <!-- Checkbox Lokasi Terdekat -->
            <div class="mt-3 flex items-center">
                <input type="checkbox" id="nearby" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label for="nearby" class="text-blue-300 ml-2">Lokasi terdekat</label>
            </div>
        </div>

        <!-- Tombol Cari -->
        <div class="flex flex-col justify-center w-full sm:w-1/3 pt-7 md:w-auto">
            <button class="bg-blue-600 text-white px-6 py-3 font-bold rounded-full shadow-lg hover:bg-blue-700 hover:scale-105 transition-all duration-200 transform hover:scale-105 w-full sm:w-auto">
                Cari
            </button>
        </div>
    </div>
</div>

<br>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <!-- Job Card 1 -->
    <a href="loker.html" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">
                Field Collector (SLEMAN)
            </h2>
            <span class="text-blue-500 font-semibold">
                Rp 3,5 jt-3,5 jt
            </span>
        </div>
        <div class="flex flex-wrap gap-2 mt-2">
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                Full Time
            </span>
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                Part Time
            </span>
        </div>
        <div class="flex flex-wrap gap-2 mt-2">
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                Kurang dari setah...
            </span>
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                Minimal SMA/SMK
            </span>
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                +3
            </span>
        </div>
        <div class="flex items-center mt-4">
            <img alt="Company logo" class="w-10 h-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/YAn3Ol3BszqeRCLG0m1dhfZV2kpdHEfYsD1GWoP2waUhwT0nA.jpg" width="40"/>
            <div class="ml-2">
                <p class="text-blue-500 font-semibold">
                    Kredivo Group
                </p>
                <p class="text-gray-600">
                    Kapanewon Depok, Sleman, DI Yogyakarta
                </p>
            </div>
        </div>
        <div class="flex justify-between items-center mt-4">
            <div class="flex items-center">
                <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">
                    Aktif Merekrut
                </span>
                <span class="text-gray-600 ml-2">
                    Kemarin
                </span>
            </div>
        </div>
    </a>
    <!-- Job Card 2 -->
    <a href="loker.html" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">
                Field Collector (KLATEN)
            </h2>
            <span class="text-blue-500 font-semibold">
                Rp 3,5 jt-3,5 jt
            </span>
        </div>
        <div class="flex flex-wrap gap-2 mt-2">
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                Full Time
            </span>
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                Part Time
            </span>
        </div>
        <div class="flex flex-wrap gap-2 mt-2">
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                Kurang dari setah...
            </span>
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                Minimal SMA/SMK
            </span>
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                +3
            </span>
        </div>
        <div class="flex items-center mt-4">
            <img alt="Company logo" class="w-10 h-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/YAn3Ol3BszqeRCLG0m1dhfZV2kpdHEfYsD1GWoP2waUhwT0 nA.jpg" width="40"/>
            <div class="ml-2">
                <p class="text-blue-500 font-semibold">
                    Kredivo Group
                </p>
                <p class="text-gray-600">
                    Klaten Tengah, Klaten, Jawa Tengah
                </p>
            </div>
        </div>
        <div class="flex justify-between items-center mt-4">
            <div class="flex items-center">
                <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">
                    Aktif Merekrut
                </span>
                <span class="text-gray-600 ml-2">
                    Kemarin
                </span>
            </div>
        </div>
    </a>
    <!-- Job Card 3 -->
    <a href="loker.html" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">
                Field Collector (BANDAR LAMPUNG)
            </h2>
            <span class="text-blue-500 font-semibold">
                Rp 3,5 jt-3,5 jt
            </span>
        </div>
        <div class="flex flex-wrap gap-2 mt-2">
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                Full Time
            </span>
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                Part Time
            </span>
        </div>
        <div class="flex flex-wrap gap-2 mt-2">
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                Kurang dari setah...
            </span>
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                Minimal SMA/SMK
            </span>
            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                +3
            </span>
        </div>
        <div class="flex items-center mt-4">
            <img alt="Company logo" class="w-10 h-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/YAn3Ol3BszqeRCLG0m1dhfZV2kpdHEfYsD1GWoP2waUhwT0nA.jpg" width="40"/>
            <div class="ml-2">
                <p class="text-blue-500 font-semibold">
                    Kredivo Group
                </p>
                <p class="text-gray-600">
                    Sukabumi, Bandar Lampung, Lampung
                </p>
            </div>
        </div>
        <div class="flex justify-between items-center mt-4">
            <div class="flex items-center">
                <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">
                    Aktif Merekrut
                </span>
                <span class="text-gray-600 ml-2">
                    Kemarin
                </span>
            </div>
        </div>
    </a>
        <!-- Job Card 4 -->
        <a href="loker.html" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold">
                    Field Collector (MAGELANG)
                </h2>
                <span class="text-blue-500 font-semibold">
                    Rp 3,5 jt-3,5 jt
                </span>
            </div>
            <div class="flex flex-wrap gap-2 mt-2">
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    Full Time
                </span>
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    Part Time
                </span>
            </div>
            <div class="flex flex-wrap gap-2 mt-2">
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    Kurang dari setah...
                </span>
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    Minimal SMA/SMK
                </span>
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    +3
                </span>
            </div>
            <div class="flex items-center mt-4">
                <img alt="Company logo" class="w-10 h-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/YAn3Ol3BszqeRCLG0m1dhfZV2kpdHEfYsD1GWoP2waUhwT0nA.jpg" width="40"/>
                <div class="ml-2">
                    <p class="text-blue-500 font-semibold">
                        Kredivo Group
                    </p>
                    <p class="text-gray-600">
                        Magelang, Jawa Tengah
                    </p>
                </div>
            </div>
            <div class="flex justify-between items-center mt-4">
                <div class="flex items-center">
                    <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">
                        Aktif Merekrut
                    </span>
                    <span class="text-gray-600 ml-2">
                        Kemarin
                    </span>
                </div>
            </div>
        </a>
        <!-- Job Card 5 -->
        <a href="loker.html" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold">
                    Field Collector (YOGYAKARTA)
                </h2>
                <span class="text-blue-500 font-semibold">
                    Rp 3,5 jt-3,5 jt
                </span>
            </div>
            <div class="flex flex-wrap gap-2 mt-2">
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    Full Time
                </span>
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    Part Time
                </span>
            </div>
            <div class="flex flex-wrap gap-2 mt-2">
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    Kurang dari setah...
                </span>
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    Minimal SMA/SMK
                </span>
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    +3
                </span>
            </div>
            <div class="flex items-center mt-4">
                <img alt="Company logo" class="w-10 h-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/YAn3Ol3BszqeRCLG0m1dhfZV2kpdHEfYsD1GWoP2waUhwT0nA.jpg" width="40"/>
                <div class="ml-2">
                    <p class="text-blue-500 font-semibold">
                        Kredivo Group
                    </p>
                    <p class="text-gray-600">
                        Kota Yogyakarta, DI Yogyakarta
                    </p>
                </div>
            </div>
            <div class="flex justify-between items-center mt-4">
                <div class="flex items-center">
                    <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">
                        Aktif Merekrut
                    </span>
                    <span class="text-gray-600 ml-2">
                        Kemarin
                    </span>
                </div>
            </div>
        </a>
        <!-- Job Card 6 -->
        <a href="loker.html" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold">
                    Field Collector (SOLO)
                </h2>
                <span class="text-blue-500 font-semibold">
                    Rp 3,5 jt-3,5 jt
                </span>
            </div>
            <div class="flex flex-wrap gap-2 mt-2">
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    Full Time
                </span>
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    Part Time
                </span>
            </div>
            <div class="flex flex-wrap gap-2 mt-2">
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    Kurang dari setah...
                </span>
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    Minimal SMA/SMK
                </span>
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm">
                    +3
                </span>
            </div>
            <div class="flex items-center mt-4">
                <img alt="Company logo" class="w-10 h-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/YAn3Ol3BszqeRCLG0m1dhfZV2kpdHEfYsD1GWoP2waUhwT0nA.jpg" width="40"/>
                <div class="ml-2">
                    <p class="text-blue-500 font-semibold">
                        Kredivo Group
                    </p>
                    <p class="text-gray-600">
                        Surakarta, Jawa Tengah
                    </p>
                </div>
            </div>
            <div class="flex justify-between items-center mt-4">
                <div class="flex items-center">
                    <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">
                        Aktif Merekrut
                    </span>
                    <span class="text-gray-600 ml-2">
                        Kemarin
                    </span>
                </div>
            </div>
        </a>
</div>

<br>

<!-- Footer Section -->
<footer class="bg-gradient-to-r from-blue-500 via-blue-400 to-blue-600 text-white py-6 mt-auto">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 WORKIFY. All Rights Reserved.</p>
        <div class="mt-2">
            <a href="privacy.html" class="text-white hover:text-yellow-300 mx-2">Privacy Policy</a>
            <a href="terms.html" class="text-white hover:text-yellow-300 mx-2">Terms of Service</a>
            <a href="contact.html" class="text-white hover:text-yellow-300 mx-2">Contact Us</a>
        </div>
    </div>
</footer>

<!-- Script -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

    <script>
        // Daftar provinsi dalam array
        const provinsiList = [
            "Aceh", "Bali", "Banten", "Bengkulu", "DI Yogyakarta", "DKI Jakarta", 
            "Gorontalo", "Jambi", "Jawa Barat", "Jawa Tengah", "Jawa Timur", 
            "Kalimantan Barat", "Kalimantan Selatan", "Kalimantan Tengah", 
            "Kalimantan Timur", "Kalimantan Utara", "Kepulauan Bangka Belitung", 
            "Kepulauan Riau", "Lampung", "Maluku", "Maluku Utara", 
            "Nusa Tenggara Barat", "Nusa Tenggara Timur", "Papua", "Papua Barat", 
            "Papua Tengah", "Papua Pegunungan", "Papua Selatan", "Papua Barat Daya", 
            "Riau", "Sulawesi Barat", "Sulawesi Selatan", "Sulawesi Tengah", 
            "Sulawesi Tenggara", "Sulawesi Utara", "Sumatera Barat", 
            "Sumatera Selatan", "Sumatera Utara"
        ];
        
        // Ambil elemen dropdown
        const dropdown = document.getElementById("location");
        
        // Tambahkan setiap provinsi sebagai opsi
        provinsiList.forEach((provinsi) => {
            const option = document.createElement("option");
            option.value = provinsi; // Nilai untuk backend
            option.textContent = provinsi; // Teks yang ditampilkan
            dropdown.appendChild(option); // Tambahkan opsi ke dropdown
        });
    </script>
    
    <script>
        // Daftar klasifikasi pekerjaan di Indonesia
        const klasifikasiPekerjaanList = [
            "Administrasi & Manajemen",
            "Akuntansi & Keuangan",
            "Arsitektur & Desain Interior",
            "Kesehatan & Medis",
            "Edukasi & Pelatihan",
            "Hukum & Legal",
            "Hotel, Restoran & Pariwisata",
            "IT & Teknologi",
            "Insinyur & Teknik",
            "Jasa Keamanan",
            "Jasa Transportasi & Logistik",
            "Keahlian Teknik & Mekanik",
            "Kreatif & Desain Grafis",
            "Manufaktur & Produksi",
            "Marketing & Pemasaran",
            "Media & Komunikasi",
            "Penjualan & Retail",
            "Pertanian & Perikanan",
            "Properti & Real Estate",
            "Riset & Pengembangan",
            "Sumber Daya Manusia (HR)",
            "Seni & Hiburan",
            "Keuangan & Asuransi",
            "Energi & Pertambangan",
            "Telekomunikasi",
            "Lainnya"
        ];
        
        // Ambil elemen dropdown untuk klasifikasi pekerjaan
        const klasifikasiDropdown = document.getElementById("jobClassification");
        
        // Tambahkan setiap klasifikasi sebagai opsi
        klasifikasiPekerjaanList.forEach((klasifikasi) => {
            const option = document.createElement("option");
            option.value = klasifikasi; // Nilai untuk backend
            option.textContent = klasifikasi; // Teks yang ditampilkan
            klasifikasiDropdown.appendChild(option); // Tambahkan opsi ke dropdown
        });
    </script>
</body>
</html>