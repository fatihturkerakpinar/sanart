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
    <a href="odev.php">
        <title>SanArt</title>
    </a>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <link rel="icon" href="SanArt logo 1.png">
    <style>
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

        footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            margin-left: 0;
            
        }
    
    </style>

</head>

<body>

    <header class="jumbotron text-center bg-light" style="background-image: url('logo arka 1.jpg');">
        <h1 class="display-4">Hoş Geldiniz!</h1>
        <p class="lead">SanArt'a Hoş Geldiniz. En Güncel Forumlara Göz Atın.</p>
    </header>

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
        <div class="forum-div">
            <h2 class="forum-baslik">Forumlar</h2>
           
        </div>
        <center>
            <div>
                <table id="1" style="border: rgb(156, 156, 156) 2px;" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Konu</th>
                            <th>Kategori</th>
                            <th>Cevap</th>
                            <th>Gönderim Tarihi</th>
                            <th>Gönderen Üye</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                      
                        $sql = "SELECT konular.id, konular.baslik, kategoriler.ad AS kategori_ad, kullanicilar.kullanici_adi AS kullanici_ad, konular.konu_tarihi, kategoriler.id AS kategori_id, 
                        (SELECT COUNT(*) FROM yorumlar WHERE yorumlar.konu_id = konular.id) AS yorum_sayisi
                        FROM konular 
                        JOIN kullanicilar ON konular.kullanici_id = kullanicilar.id
                        JOIN kategoriler ON konular.kategori_id = kategoriler.id";
                        $result = $conn->query($sql);
                        
                        $rows = array(); 
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $rows[] = $row;
                            }
                        }

                        $totalRows = count($rows);
                        $rowsPerPage = 7;
                        $totalPages = ceil($totalRows / $rowsPerPage);

                        for ($page = 1; $page <= $totalPages; $page++) {
                            $start = ($page - 1) * $rowsPerPage;
                            $end = min($start + $rowsPerPage, $totalRows);
                            echo "<tbody id='page$page' class='" . ($page === 1 ? "" : "hidden") . "'>";
                            for ($i = $start; $i < $end; $i++) {
                                $row = $rows[$i];
                                $kategori_link = "";
                                switch ($row["kategori_id"]) {
                                    case "1":
                                        $kategori_link = "odev-film.php";
                                        break;
                                    case "2":
                                        $kategori_link = "odev-tiyatro.php";
                                        break;
                                    case "3":
                                        $kategori_link = "odev-kitap.php";
                                        break;
                                    default:
                                        $kategori_link = "odev-film.php";
                                    
                                        break;
                                }
                                echo "<tr>";
                                echo "<td><a href='konu_detay.php?id=" . $row["id"] . "'>" . $row["baslik"] . "</a></td>";
                                echo "<td><a href='$kategori_link'>" . $row["kategori_ad"] . "</a></td>";
                                echo "<td>" . $row["yorum_sayisi"] . "</td>";
                                echo "<td>" . $row["konu_tarihi"] . "</td>";
                                echo "<td>" . $row["kullanici_ad"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                        }

                        if ($totalRows == 0) {
                            echo "<tr><td colspan='5'>Bu kategoride henüz konu bulunmamaktadır.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <ul class="pagination">
                    <li class="page-item"><a href="#" id="prev" class="page-link">Geri</a></li>
                    <?php
                    for ($page = 1; $page <= $totalPages; $page++) {
                        echo "<li class='page-item'><a href='#' class='page-link' onclick='showPage($page)'>$page</a></li>";
                    }
                    ?>
                    <li class="page-item"><a href="#" id="next" class="page-link">İleri</a></li>
                </ul>
            </div>
        </center>
    </section>

    <footer class="bg-dark text-light text-center py-3">
        <div class="container">
            <p>&copy; 2024 SanArt. Tüm Hakları Saklıdır.</p>
            <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && isset($_SESSION['kullanici_adi']) && !empty($_SESSION['kullanici_adi'])): ?>
            <?php endif; ?>
        </div>
    </footer>

    <?php include 'nav.php'; ?>

    <script>
        var currentPage = 1;
        var totalPages = <?php echo $totalPages; ?>;

        function showPage(page) {
            for (var i = 1; i <= totalPages; i++) {
                var tbody = document.getElementById("page" + i);
                if (tbody) {
                    tbody.style.display = (i === page) ? "table-row-group" : "none";
                }
            }
            currentPage = page;
        }

        document.getElementById("prev").addEventListener("click", function(event) {
            event.preventDefault();
            if (currentPage > 1) {
                showPage(currentPage - 1);
            }
        });

        document.getElementById("next").addEventListener("click", function(event) {
            event.preventDefault();
            if (currentPage < totalPages) {
                showPage(currentPage + 1);
            }
        });

        showPage(currentPage);
    </script>
</body>
</html>
