<?php
session_start();

include("db_baglan.php");

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $kullanici_adi = $_POST['kullanici_adi'];
    $email = $_POST['email'];
    $sifre = password_hash($_POST['sifre'], PASSWORD_DEFAULT); 
    $dogum_tarihi = $_POST['dogum_tarihi'];
    $kayit_tarihi = date("Y-m-d");

    $sql_check = "SELECT * FROM kullanicilar WHERE email=? OR kullanici_adi=?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ss", $email, $kullanici_adi);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        $error_message = "Bu e-posta veya kullanıcı adı zaten kullanılıyor!";
    } else {
        
        $sql = "INSERT INTO kullanicilar (ad, soyad, kullanici_adi, email, sifre, dogum_tarihi, kayit_tarihi) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $ad, $soyad, $kullanici_adi, $email, $sifre, $dogum_tarihi, $kayit_tarihi);

        if ($stmt->execute()) {
            
            header("Location: odev.php");
          
            exit(); 
        } else {
            $error_message = "Kayıt başarısız: " . $stmt->error;
        }

        $stmt->close();
    }

    $stmt_check->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SanArt Kayıt Ol</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            var isim = document.getElementById('name').value;
            var soyIsim = document.getElementById('lastName').value;
            var kullaniciAdi = document.getElementById('Kullanici').value;
            var email = document.getElementById('email').value;
            var sifre = document.getElementById('pwd').value;
            var dogum = document.getElementById('dogum').value;
            var checkbox = document.getElementById('termsCheckbox');
            var lk = kullaniciAdi.length;
            var ls = sifre.length;

            if (isim === "" || soyIsim === "" || kullaniciAdi === "" || email === "" || sifre === "" || dogum === "") {
                alert("Tüm alanları doldurunuz!");
                return false;
            } else if (lk <= 6 || lk >= 21) {
                alert("Kullanıcı adınız çok kısa veya çok uzun !!");
                return false;
            } else if (ls <= 6 || ls >= 21) {
                alert("Şifreniz çok kısa veya çok uzun !!");
                return false;
            } else if (!checkbox.checked) {
                alert("Kullanım Sözleşmesi ve Gizlilik Bildirimini okuyup kabul etmelisiniz!");
                return false;
            }

            return true;
        }
    </script>
    <style>
        footer {
    position: fixed;
     bottom: 0;
         width: 100%;
                    }
        .alert-bottom {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 1050;
        }
        body {
            display: flex;
            flex-direction: column;
            padding-top: 56px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ffffff;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        @media (min-width: 992px) {
            body {
                padding-top: 72px;
            }

            header {
                margin-top: -6px;
            }

        }

        nav {
            background-color: #CAE2E8;
            margin-bottom: 0px;
        }

        @media (max-width: 992px) {
            body {
                padding-top: 72px;
            }

            header {
                margin-top: -6px;
            }
        }

        td a {
            text-decoration: none;
            color: #000000;
        }

        td a:hover {
            background-color: #a3a3a3;
            color: #000000;
        }

        .inline {
            display: inline-block;
        }

        div ul {
            align-items: center;
        }

        .pagination a {
            color: #416d78;
        }

        .pagination .page-item.active .page-link {
            background-color: #316a95;
            color: rgb(236, 252, 255);
        }

        .hidden {
            display: none;
        }

        .forum-div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .forum-baslik {
            font-size: 24px;
            font-weight: bold;
        }

        .konuAc {
            background-color: #517982;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
   

<nav class="navbar navbar-expand-lg navbar-light fixed-top ">
        <div class="container">
            <img src="SanArt logo 1.png" alt="" height="50px" width="50px">
            <a class="navbar-brand" href="odev.php">SanArt</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="odev.php">Ana Sayfa</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kategoriler
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            <li><a class="dropdown-item" href="odev-film.php">Film</a></li>
                            <li><a class="dropdown-item" href="odev-tiyatro.php">Tiyatro</a></li>
                            <li><a class="dropdown-item" href="odev-kitap.php">Kitap</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="odevkonu.php">Konu Aç</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="odev-hakkinda.php">Hakkımızda</a>
                    </li>

                    <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && isset($_SESSION['kullanici_adi']) && !empty($_SESSION['kullanici_adi'])): ?>
                        <li class="nav-item" style="display:block;">
                            <a class="nav-link" href="odevHesapClick.php"
                                style="background-color: #c1dbe3;border-radius: 40%;"><?php echo isset($_SESSION['kullanici_adi']) ? $_SESSION['kullanici_adi'] : '';?> <img src="profilIcon.png"
                                    alt="" style="width: 20px;height: 20px;"></a>
                        </li>
                        <li class="nav-item" style="display:block;">
                             <form action="logout.php" method="post">
                            <button type="submit" class="btn btn-danger">Güvenli Çıkış</button>
                           </form>
                        </li>
                        
                    <?php else: ?>
                        <li class="nav-item" style="display:none;">
                            <a class="nav-link" href="odevHesapClick.php"
                                style="background-color: #c1dbe3;border-radius: 40%;"><?php echo isset($_SESSION['kullanici_adi']) ? $_SESSION['kullanici_adi'] : '';?> <img src="profilIcon.png"
                                    alt="" style="width: 20px;height: 20px;"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="girisYap.php" data-bs-toggle="modal" data-bs-target="#loginModal">Giriş Yap</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kayitol.php">Kayıt Ol</a>
                        </li>
                        
                    <?php endif; ?>
                    

                    <li class="nav-item " style="padding-left: 10px;">
                        <div style="border: 1px solid #000000;background-color: white;">
                            <img src="aramaIcon.png" alt="" style="width: 17px ;height: 23px;background-color: white; ">
                            <input type="search" placeholder="Ara..." style="border: none">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Giriş Yap</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <h2>Giriş Yap</h2>
                    <form action="" method="post" class="needs-validation">
                        <div class="mb-3">
                            <label for="kullanici_adi" class="form-label">Kullanıcı Adı</label>
                            <input type="text" class="form-control" id="kullanici_adi" name="kullanici_adi" required>
                        </div>
                        <div class="mb-3">
                            <label for="sifre" class="form-label">Şifre</label>
                            <input type="password" class="form-control" id="sifre" name="sifre" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Giriş Yap</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   

 


    <section class="container mt-4">
        <center>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-2 bg-light"><br><br>
                    Ad: <br><br><br>
                    Soyad: <br><br><br>
                    Kullanıcı Adı: <br><br><br>
                    E-Posta: <br><br><br>
                    Parola: <br><br><br>
                    Doğum Tarihi: <br><br><br><br>
                </div>
                <div class="col-4">
                    <form action="kayitol.php" method="post" class="needs-validation"  onsubmit="return validateForm()">
                        <br><br>
                        <input type="text" class="form-control" id="name" placeholder="Adınızı Giriniz" name="ad"><br>
                        <input type="text" class="form-control" id="lastName" placeholder="Soyadınızı Giriniz" name="soyad"><br>
                        <input type="text" class="form-control" id="Kullanici" placeholder="Kullanıcı Adınızı Giriniz" name="kullanici_adi"><br>
                        <input type="email" class="form-control" id="email" placeholder="E-Posta Adresinizi Giriniz" name="email"><br>
                        <input type="password" class="form-control" id="pwd" placeholder="Parolanızı Giriniz" name="sifre"><br>
                        <input type="date" class="form-control" id="dogum" placeholder="Doğum Tarihinizi Giriniz" name="dogum_tarihi"><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="termsCheckbox">
                            <label class="form-check-label" for="termsCheckbox">
                                <a href="odevGizlilikSozlesmesi.html" style="color: black;text-decoration: underline;">Kullanım Sözleşmesi ve Gizlilik Bildirimini</a> okudum ve kabul ediyorum.
                            </label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" id="kayitOl">Kayıt Ol</button>
                    </form>
                    <?php if (!empty($error_message)): ?>
                        <div class="alert alert-danger alert-bottom" role="alert">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-3"></div>
            </div>
        </center>
    </section>

    <footer class="bg-dark text-light text-center py-3" >
        <div class="container">
            <p>&copy; 2024 SanArt. Tüm Hakları Saklıdır.</p>
            
        </div>
    </footer>
</body>
</html>