<?php  
// Koneksi ke Database  
$host = 'localhost';  
$db = 'workify2';  
$user = 'root';  
$pass = '';  

try {  
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);  
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
} catch (PDOException $e) {  
    die("Connection failed: " . $e->getMessage());  
}  

// Proses Upload  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $userId = $_POST['user_id'];  
    $fileType = $_POST['file_type'];  
    $targetDir = "uploads/";  
    $fileName = basename($_FILES["file"]["name"]);  
    $targetFilePath = $targetDir . $fileName;  

    // Upload file  
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {  
        // Simpan data ke database  
        $stmt = $pdo->prepare("INSERT INTO files (user_id, file_type, file_name) VALUES (?, ?, ?)");  
        $stmt->execute([$userId, $fileType, $fileName]);  
        header("Location: profile.php?id=" . $userId);  
        exit();  
    } else {  
        echo "Sorry, there was an error uploading your file.";  
    }  
}  

$userId = isset($_GET['user_id']) ? intval($_GET['user_id']) : 1;  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">  
    <title>Upload Resume/Sertifikat</title>  
</head>  
<body class="bg-gray-100">  
    <div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg p-6">  
        <h1 class="text-2xl font-bold text-center">Upload Resume/Sertifikat</h1>  
        
        <form method="POST" enctype="multipart/form-data" class="mt-4">  
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($userId) ?>">  
            <input type="hidden" name="file_type" value="<?= htmlspecialchars($_GET['file_type']) ?>">  

            <div class="mb-4">  
                <label class="block" for="file">Pilih File:</label>  
                <input type="file" name="file" class="border p-2 w-full" required>  
            </div>  

            <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded">Upload</button>  
        </form>  
    </div>  
</body>  
</html>