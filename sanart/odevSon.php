<?php
session_start();
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
           
            header{
            margin-top: 6px;
        }}
        nav{
            background-color: #CAE2E8;
            margin-bottom: 0px;
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
    <form>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori Seç</label>
            <select class="form-select" id="kategori" name="kategori">
                <option value="Kitap">Kitap</option>
                <option value="Film">Film</option>
                <option value="Tiyatro">Tiyatro</option>
                
                
            </select>
        </div>
        <div class="mb-3">
            <label for="konuBaslik" class="form-label">Konu Başlığı</label>
            <input type="text" class="form-control" id="konuBaslik" name="konuBaslik" required>
        </div>
        <div class="mb-3">
            <label for="konuMetni" class="form-label">Konu Metni</label>
            <textarea class="form-control" id="konuMetni" name="konuMetni" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Konu Oluştur</button>
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