<?php
ob_start();
include 'db_baglan.php';
session_start();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum Sitesi - Film Kategorisi</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            padding-top: 56px;
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

        div {
            margin-left: 10px;
        }

        .baslik {
            width: 90%;
            background-color: #f7fdfc;
            border: 1px solid rgb(70, 70, 70);
            padding: 10px;
            margin-bottom: 20px;
        }

        .mesaj {
            width: 90%;
            background-color: #f7fdfc;
            border: 1px solid rgb(70, 70, 70);
            padding: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }       
        .pagination {
            display: flex;
            list-style: none;
        }

        .pagination a {
            color: #416d78;
        }

        .pagination .page-item.active .page-link {
            background-color: #316a95;
            color: rgb(236, 252, 255);
        }

       div h1 a {
            float: right;
            font-size: 20px;
            text-decoration: none;
            
        }
        div a{
            text-decoration: none;
        }
        div a:hover{
            text-decoration: underline;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>

</head>

<body>

<?php
include 'nav.php';

?>

<section class="container mt-4">
    <h2>Film Kategorisindeki Konular</h2>
    <?php
   
    $sql = "SELECT konular.id, konular.baslik, kullanicilar.ad, konular.konu_tarihi 
            FROM konular 
            JOIN kullanicilar ON konular.kullanici_id = kullanicilar.id 
            WHERE konular.kategori_id = 2";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='baslik'>";
            echo "<h2><a href='konu_detay.php?id=" . $row["id"] . "' style='color: black; text-decoration: none;'>" . $row["baslik"] . "</a><a href='#' style='color: #a6a6a6; float: right;'>#00" . $row["id"] . "</a></h2>";
            echo "<p style='float: left;'><span style='color: #a6a6a6;'>Oluşturan: </span>" . $row["ad"] . "</p>";
            echo "<div style='overflow: hidden;'>";
            echo "<span style='color: #a6a6a6; float:right;' title='" . $row["konu_tarihi"] . "'>" . $row["konu_tarihi"] . "</span>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "Bu kategoride henüz konu bulunmamaktadır.";
    }

    $conn->close();
    ?>
</section>

<footer class="bg-dark text-light text-center py-3" style="margin-top: 20px;">
    <div class="container">
        <p>&copy; 2024 SanArt. Tüm Hakları Saklıdır.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
