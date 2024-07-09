<?php
session_start();
include("db_baglan.php");


$sql = "SELECT konular.id, konular.baslik, kullanicilar.kullanici_adi FROM konular
        JOIN kullanicilar ON konular.kullanici_id = kullanicilar.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum Admin Paneli</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    
    <style>
        body {
            padding-top: 56px;
            background-image: url('logo/arka1.jpg');
        }
        @media (min-width: 992px) {
            body {
                padding-top: 72px;
            }
        }
        nav {
            background-color: #CAE2E8;
            margin-bottom: 0px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <img src="SanArt logo 1.png" height="50px" width="50px">
        <a class="navbar-brand">SanArt</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin-anasayfa.php">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-konular.php">Konular</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-giris.php">Çıkış Yap</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<center>
<section class="container mt-4">
    <br><br>
    <div class="row">
        <div class="container">
            <h2>Konular</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Konu Başlığı</th>
                        <th>Kullanıcı Adı</th>
                        <th>Konu Sil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                 
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["baslik"] . "</td>";
                            echo "<td>" . $row["kullanici_adi"] . "</td>";
                            echo '<td>
                                    <form method="POST" action="mesajSil.php">
                                        <input type="hidden" name="konu_id" value="' . $row["id"] . '">
                                        <button type="submit" class="btn btn-primary">Konu Sil</button>
                                    </form>
                                  </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Konu bulunamadı</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</center>

<footer class="bg-dark text-light text-center py-3 fixed-bottom">
    <div class="container">
        <p>&copy; 2024 Forum Admin Paneli. Tüm Hakları Saklıdır.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>
</html>

<?php
$conn->close();
?>