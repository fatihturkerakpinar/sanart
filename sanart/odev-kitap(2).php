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
    <title>Forum Sitesi</title>

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

        .logout-btn {
            background-color: #c1dbe3;
            border: none;
            color: #000;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #b0c4cd;
        }
    </style>

</head>

<body>

<?php
include 'nav.php'
?>

    <section class="container mt-4">

            <a href="odev-konu3-page1.php" style="color: #000000; text-decoration: none"><div class="baslik">
                <h2>1984 ve Stalin<a href="#" style="color: #a6a6a6; float: right;">#001</a></h2>
                <p style="float: left;"> <span style="color: #a6a6a6;">En popüler yorum:</span> Kitapta büyük biraderin Stalin olduğunu bilmeyen var mı?</p>
                <div style="overflow: hidden;">
                    <a href="#" style="color: #a6a6a6; float:right;">Ozodus</a>
                    <br>
                    <span style="color: #a6a6a6; float:right;" title="11 Ocak 2024 19:10">11.01.2024</span>
                </div>
            </div></a>
            <div class="baslik">
                <h2>2024 Yılında Kitapların Pahalılığı<a href="#" style="color: #a6a6a6; float: right;">#002</a></h2>
                <p style="float: left;"> <span style="color: #a6a6a6;">En popüler yorum: </span>İnsanı okumaktan soğutur. </p>
                <div style="overflow: hidden;">
                    <a href="#" style="color: #a6a6a6; float:right;">CmGzl</a>
                    <br>
                    <span style="color: #a6a6a6; float:right;" title="19 Ekim 2024 18:10">19.10.2024</span>
                </div>
            </div>
        
            <div class="baslik">
                <h2>Okuduğunuz en iyi roman?<a href="#" style="color: #a6a6a6; float: right;">#003</a></h2>
                <p style="float: left;"> <span style="color: #a6a6a6;">En popüler yorum:</span> Monte Cristo Kontu benim için çıkılamayacak bir seviye</p>
                <div style="overflow: hidden;">
                    <a href="#" style="color: #a6a6a6; float:right;">Fatih_The_Conquerer</a>
                    <br>
                    <span style="color: #a6a6a6; float:right;" title="17 Haziran 2024 01.25">17.06.2024</span>
                </div>
            </div>
            <div class="baslik">
                <h2>Tolstoy mu Dostoyevski mi?<a href="#" style="color: #a6a6a6; float: right;">#004</a></h2>
                <p style="float: left;"> <span style="color: #a6a6a6;">En popüler yorum:</span> Dostoyovski iç çatışmaları en iyi veren yazardır </p>
                <div style="overflow: hidden;">
                    <a href="#" style="color: #a6a6a6; float:right;">Ozodus</a>
                    <br>
                    <span style="color: #a6a6a6; float:right;" title="30 Aralık 2023 14.45">30.12.2023</span>
                </div>
            </div>
            <div class="baslik">
                <h2>Kitap Okuma Alışkanlığının Kaybolması<a href="#" style="color: #a6a6a6; float: right;">#005</a></h2>
                <p style="float: left;"> <span style="color: #a6a6a6;">En popüler yorum:</span> Dijitalleşen dünyada tabiki kitaplar da dijitalleşecekti siz neye şaşırdınız?</p>
                <div style="overflow: hidden;">
                    <a href="#" style="color: #a6a6a6; float:right;">Fatih_The_Conquerer</a>
                    <br>
                    <span style="color: #a6a6a6; float:right;" title="5 Ağustos 2023 16.37">05.08.2023</span>
                </div>
            </div>
        
        


        <ul class="pagination">
            <li class="page-item"><a href="#" class="page-link">Previous</a></li>
            <li class="page-item"><a href="konu.php" class="page-link">1</a></li>
            <li class="page-item"><a href="konu1.php" class="page-link">2</a></li>
            <li class="page-item"><a href="Konu2.php" class="page-link">3</a></li>
            <li class="page-item"><a href="#" class="page-link">Next</a></li>
        </ul>
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