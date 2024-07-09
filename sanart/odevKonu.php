<?php
session_start();
include('db_baglan.php');

if (!isset($_SESSION['kullanici_adi'])) {

    $_SESSION['hata'] = "Giriş yapmadan konu oluşturamazsın";
    header('Location: odev.php');
    
    exit();
}

$kullanici_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    $baslik = $_POST['baslik'];
    $icerik = $_POST['icerik'];
    $kategori_id = $_POST['kategori_id'];


    $sql = "INSERT INTO konular (baslik, icerik, kategori_id, kullanici_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $baslik, $icerik, $kategori_id, $kullanici_id);

    if ($stmt->execute()) {
         
    } else {
        echo "Hata: " . $stmt->error;
    }
    $stmt->close();
}
?>





<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum Sitesi</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="icon" href="SanArt logo 1.png">
    <style>
        body {
            padding-top: 56px;
        }

        @media (min-width: 992px) {
            body {
                padding-top: 72px;
            }

        }

        @media (max-width: 992px) {

            header {
                margin-top: 6px;
            }
        }

        nav {
            background-color: #CAE2E8;
            margin-bottom: 0px;
        }
        .konuAc {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .konuAc:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>


<?php
include 'nav.php';

?>


    <header class="jumbotron text-center bg-light" style="background-image: url(logo\ arka\ 1.jpg);">
        <div class="container">
            <h1 class="display-4">Hoş Geldiniz!</h1>
            <p class="lead">SanArt'ta Konu Açın.</p>
        </div>
    </header>


    <section class="container mt-4">
        <h2>Konu Aç</h2>


        <form action="odevKonu.php" method="post">
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori Seç</label>
                <select class="form-select" id="kategori_id" name="kategori_id">
                    <option value="1">Film</option>
                    <option value="2">Tiyatro</option>
                    <option value="3">Kitap</option>


                </select>
            </div>
            <div class="mb-3">
                <label for="baslik" class="form-label">Konu Başlığı</label>
                <input type="text" class="form-control" id="baslik" name="baslik" required>
            </div>
            <div class="mb-3">
                <label for="icerik" class="form-label">Konu Metni</label>
                <textarea class="form-control" id="icerik" name="icerik" rows="5" required></textarea>
            </div>
            <button type="submit" class="konuAc" style="background-color: #cae2e8; color: black; text-decoration: none;" >Konu Oluştur</button>
           
        </form>

    </section>





    <footer class="bg-dark text-light text-center py-3 fixed-bottom">
        <div class="container">
            <p>&copy; 2024 SanArt. Tüm Hakları Saklıdır.</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>

</html>