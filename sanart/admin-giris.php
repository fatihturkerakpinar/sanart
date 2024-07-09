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
   
    <style>
        body {
            background-image: url(logo\ arka\ 1.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-size: 200% 250%;
            padding-top: 56px;
        }

        @media (min-width: 992px) {
            body {
                padding-top: 72px;
            }
        }

        nav {
            background-color: #CAE2E8;
        }

        .container {
            margin-top: 50px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }

        .form-container label {
            font-weight: bold;
        }

        .form-container button {
            width: 100%;
        }

    </style>
    <script>
        function validateForm() {
            var kullaniciAdi = document.getElementById('kullaniciAdi').value.trim();
            var sifre = document.getElementById('pwd').value.trim();
            var checkbox = document.getElementById('termsCheckbox');
            var lk = kullaniciAdi.length;
            var ls = sifre.length;

            if (kullaniciAdi === "cem" && sifre === "123456") {
                alert("Giriş Başarılı!");
                return true;
            } else {
                alert ("Hatalı Deneme!")
            } return false;

            
        }
    </script>
</head>
<body>

<div class="container">
    <div class="form-container p-3">
        <form action="admin-anasayfa.php" class="needs-validation" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="kullaniciAdi" class="form-label">Kullanıcı adı</label>
                <input type="text" class="form-control" id="kullaniciAdi" placeholder="Kullanıcı adı">
            </div>

            <div class="mb-3">
                <label for="pwd" class="form-label">Şifre</label>
                <input type="password" class="form-control" id="pwd" placeholder="Şifre">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="termsCheckbox">
                <label class="form-check-label" for="termsCheckbox">Kullanım Sözleşmesi ve Gizlilik Bildirimini okudum ve kabul ediyorum</label>
            </div>

            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div>
</div>


<footer class="bg-dark text-light text-center py-3 fixed-bottom">
    <div class="container">
        <p>&copy; 2024 SanArt. Tüm Hakları Saklıdır.</p>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>