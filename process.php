<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $umur = $_POST['umur'];

    // Handle file upload
    $file = $_FILES['file'];

    // Validate file upload
    if ($file['error'] === UPLOAD_ERR_OK) {
        // Check file type and size
        if ($file['type'] === 'text/plain' && $file['size'] <= 1024 * 1024) {
            // Read the content of the uploaded file
            $fileContent = file_get_contents($file['tmp_name']);
            $fileLines = explode("\n", $fileContent);
        } else {
            echo "File yang diupload tidak valid. Harus .txt dan maksimal 1MB.";
            exit;
        }
    } else {
        echo "Terjadi kesalahan saat mengupload file.";
        exit;
    }

    // Redirect to result page with data
    session_start();
    $_SESSION['nama'] = $nama;
    $_SESSION['nim'] = $nim;
    $_SESSION['email'] = $email;
    $_SESSION['umur'] = $umur;
    $_SESSION['fileContent'] = $fileLines;
    header("Location: result.php");
}
?>
