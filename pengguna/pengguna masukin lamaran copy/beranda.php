<?php
// Database connection parameters
$host = "localhost"; // Database host
$user = "root"; // Database username
$pass = ""; // Database password
$dbname = "workify"; // Database name

// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch job listings from the database
$sql = "SELECT * FROM jobs"; // Adjust the query as needed
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workify Job Listings</title>
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
        </nav>
    </div>
    <div class="relative">
                    <!-- Profile Button with Elongated Border -->
                    <button id="profile-toggle" class="flex items-center space-x-3 focus:outline-none px-4 py-2 rounded-full border-2 border-blue-600">
                        <!-- Avatar -->
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center shadow-md">
                            <img src="../../asset/img/lisa.jpg" alt="Profile" class="w-10 h-10 rounded-full border-2 border-white">
                        </div>
                        <?php
                            session_start();
                            $id_akun = $_SESSION['id_akun']; 
                            include '../../inc/koneksi.php';
                            $sql = mysqli_query($koneksi, "SELECT nama FROM akun WHERE id_akun = '$id_akun'");
                            $data = mysqli_fetch_array($sql);
                            ?>
                            <span class="text-lg font-semibold text-white flex items-center space-x-1">
                                <span><?php echo htmlspecialchars($data['nama']); ?></span>
                            </span>

                            <svg id="dropdown-icon" class="w-4 h-4 text-white transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l7-7 7 7" />
                            </svg>
                        </span>
                    </button>
                
  
                    <div id="profile-dropdown" class="hidden absolute right-0 mt-3 w-56 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 transition-all duration-200">
                        <div class="flex flex-col">
                            <a href="profilsaya.html" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gradient-to-r from-blue-500 to-blue-400 hover:text-white transition">
                                <i class="fas fa-user mr-3 text-blue-500 group-hover:text-white"></i> Profil Saya
                            </a>
                            <a href="../../inc/logout.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-500 hover:text-white transition">
                                <i class="fas fa-power-off mr-3 text-red-500 group-hover:text-white"></i> Keluar
                            </a>
                        </div>
                    </div>
                </div>  

</header>
<script>
document.getElementById('profile-toggle').addEventListener('click', function (event) {
    const dropdown = document.getElementById('profile-dropdown');
    dropdown.classList.toggle('hidden');
    event.stopPropagation();
});
const icon = document.getElementById('dropdown-icon');
icon.addEventListener('click', function () {
    icon.classList.toggle('rotate-180');
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
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                </select>
            </div>

            <!-- Dropdown Klasifikasi Pekerjaan -->
            <div class="flex flex-col w-full sm:w-1/3 md:w-1/4">
                <label for="jobClassification" class="text-blue-500 mb-2 font-semibold text-lg">Klasifikasi Pekerjaan</label>
                <select id="jobClassification" class="p-3 rounded-lg border-2 border-gray-300 shadow-md w-full bg-white text-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-transform duration-300 ease-in-out transform hover:scale-105">
                    <option selected disabled>Pilih Klasifikasi</option>
                    <option value="Teknologi">Teknologi</option>
                    <option value="Pendidikan">Pendidikan</option>
                </select>
            </div>

            <!-- Dropdown Lokasi -->
            <div class="flex flex-col w-full sm:w-1/3 md:w-1/4">
                <label for="location" class="text-blue-500 mb-2 font-semibold text-lg">Lokasi</label>
                <select id="location" class="p-3 rounded-lg border-2 border-gray-300 shadow-md w-full bg-white text-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-transform duration-300 ease-in-out transform hover:scale-105">
                    <option selected disabled>Pilih Lokasi</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Surabaya">Surabaya</option>
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
        <?php while ($job = mysqli_fetch_assoc($result)): ?>
        <a href="lamaransaya.php?id=<?php echo $job['id']; ?>" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold"><?php echo htmlspecialchars($job['title']); ?></h2>
                <span class="text-blue-500 font-semibold"><?php echo htmlspecialchars($job['salary']); ?></span>
            </div>
            <div class="flex flex-wrap gap-2 mt-2">
                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm"><?php echo htmlspecialchars($job['job_type']); ?></span>
            </div>
            <div class="flex items-center mt-4">
                <img alt="Company logo" class="w-10 h-10 rounded-full" src="https://storage.googleapis.com/a1aa/image/YAn3Ol3BszqeRCLG0m1dhfZV2kpdHEfYsD1GWoP2waUhwT0nA.jpg" />
                <div class="ml-2">
                    <p class="text-blue-500 font-semibold"><?php echo htmlspecialchars($job['company']); ?></p>
                </div>
            </div>
        </a>
        <?php endwhile; ?>
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

    <script>
        // JavaScript for dropdown and other functionalities can be added here
    </script>

</body>
</html>

<?php
mysqli_close($conn); // Close the database connection
?>