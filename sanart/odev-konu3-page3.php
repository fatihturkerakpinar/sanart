<?php
session_start();
?>

<!DOCTYPE html>
<html lang="tr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forum Sitesi</title>

        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

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
            margin-left: 20px;
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

        .mesaj-profil {
            margin-right: 10px;
        }

        .mesaj-profil img {
            width: 60px; 
            height: 60px;
            border-radius: 50%;
        }

        .mesaj-icerik {
            flex-grow: 1;
        }

       

        .konuAc {
            background-color: #517982;
            color: #fff;
            border: none;
            padding: 5px 20px;
            border-radius: 5px;
            margin-left: 10px;
            
        }

        .pagination {
            margin-left: 20px;
            margin-top: 5px;
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

      .hidden{
        display: none;
      }

        .forum-div {
            margin-bottom: 10px;
            margin-right: 20px;
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
        .mesaj-yaz{
            background-color: #517982;
            color: #fff;
            border: none;
            padding: 1px 10px;
            border-radius: 5px;
            margin-left: 10px;
            margin-bottom: 5px;
        }
    </style>

    </head>

    <body>
   
    <?php
include 'nav.php';

?>

        <section class="container mt-4">

            <div class="baslik">
                <h1>1984 ve Stalin <a href="#"
                        style="color: #a6a6a6; float: right;">#001</a></h1>
                <div style="overflow: hidden;">
                    <a href="#" style="color: #a6a6a6; float:right;">Ozodus</a>
                    <br>
                    <span style="color: #a6a6a6; float:right;"
                        title="11 Ocak 2024 19:10">11.01.2024</span>
                </div>
            </div>

            <div class="forum-div">
            <button class="konuAc" style="background-color: #CAE2E8;"><a href="odevKonu.php"
            style="text-decoration: none; color: black;">Konu Aç</a></button>
            </div>
            <ul class="pagination">
                <li class="page-item"><a id="geri"
                        class="page-link">Geri</a></li>
                <li class="page-item"><a href="odev-konu3-page1.php"
                        class="page-link">1</a></li>
                <li class="page-item"><a href="odev-konu3-page2.php"
                        class="page-link">2</a></li>
                <li class="page-item"><a href="odev-konu3-page3.php"
                        class="page-link">3</a></li>
                <li class="page-item"><a id="ileri"
                        class="page-link">İleri</a></li>
            </ul>
            <div class="mesaj-listesi" id="mesajListesi">
                <div class="mesaj">
                    <div class="mesaj-profil">
                        <img src="SanArt logo 1.png" alt="Profil İkonu">
                    </div>
                    <div class="mesaj-icerik">
                        <p>Kitapta büyük biraderin Stalin olduğunu bilmeyen var mı?</p>
                        <div>
                            <a href="#"
                                style="color: #a6a6a6; float:right;">Ozodus</a>
                            <br> <span style="color: #a6a6a6; float:right;"
                                title="11 Ocak 2024 19:11">11.01.2024</span>
                        </div>
                    </div>
                </div>

                <div class="mesaj">
                    <div class="mesaj-profil">
                        <img src="SanArt logo 1.png" alt="Profil İkonu">
                    </div>
                    <div class="mesaj-icerik">
                        <p> İyi bir inceleme olmuş dostum</p><div>
                            <a href="#"
                                style="color: #a6a6a6; float:right;">İsimsiz
                                Üye</a>
                            <br> <span style="color: #a6a6a6; float:right;"
                                title="12 Ocak 2024 19:21">12.01.2024</span>
                        </div>
                    </div>
                </div>
                <div class="mesaj">
                    <div class="mesaj-profil">
                        <img src="SanArt logo 1.png" alt="Profil İkonu">
                    </div>
                    <div class="mesaj-icerik">
                        <p>Ya kardeşim izle geç işte neyi kurcalıyorsunuz ya
                            ;)</p>
                        <div>
                            <a href="#"
                                style="color: #a6a6a6; float:right;">CmGzl</a>
                            <br> <span style="color: #a6a6a6; float:right;"
                                title="13 Ocak 2024 11:11">13.01.2024</span>
                        </div>
                    </div>
                </div>
                <div class="mesaj">
                    <div class="mesaj-profil">
                        <img src="SanArt logo 1.png" alt="Profil İkonu">
                    </div>
                    <div class="mesaj-icerik">
                        <p>Doğru yerlere değinmişsin ama filmin son sahnesini
                            yanlış yorumladığını düşünüyorum bence orada ...
                            anlatılmak isteniyordu.</p>
                        <div>
                            <a href="#"
                                style="color: #a6a6a6; float:right;">Ozodus</a>
                            <br> <span style="color: #a6a6a6; float:right;"
                                title="12.01.2024 11.11">12.01.2024</span>
                        </div>
                    </div>
                </div>
                <div class="mesaj">
                    <div class="mesaj-profil">
                        <img src="SanArt logo 1.png" alt="Profil İkonu">
                    </div>
                    <div class="mesaj-icerik">
                        <p>Bu 2. sayfadaki bir mesajdır.</p>
                        <div>
                            <a href="#"
                                style="color: #a6a6a6; float:right;">CmGzl</a>
                            <br> <span style="color: #a6a6a6; float:right;"
                                title="14 Ocak 2024 14:30">14.01.2024</span>
                        </div>
                    </div>
                </div>

                <div class="mesaj">
                    <div class="mesaj-profil">
                        <img src="SanArt logo 1.png" alt="Profil İkonu">
                    </div>
                    <div class="mesaj-icerik">
                        <p>Bu 3. sayfadaki bir mesajdır.</p>
                        <div>
                            <a href="#"
                                style="color: #a6a6a6; float:right;">Fatih_The_Conquerer</a>
                            <br> <span style="color: #a6a6a6; float:right;"
                                title="15 Ocak 2024 15:45">15.01.2024</span>
                        </div>
                    </div>
                </div>

            </div>

            <div id="mesajForm">
                <form>
                    <div class="mb-3">
                        <label for="konuMetni" class="form-label">Konu
                            Metni</label>
                        <textarea class="form-control" id="konuMetni"
                            name="konuMetni" rows="5" required></textarea>
                    </div>
                    <button class="mesaj-yaz" type="submit">Mesaj Yaz</button>
                </form>
            </div>

            <ul class="pagination">
                <li class="page-item"><a id="geri"
                        class="page-link">Geri</a></li>
                <li class="page-item"><a href="odev-konu3-page1.php"
                        class="page-link">1</a></li>
                <li class="page-item"><a href="odev-konu3-page2.php"
                        class="page-link">2</a></li>
                <li class="page-item"><a href="odev-konu3-page3.php"
                        class="page-link">3</a></li>
                <li class="page-item"><a id="ileri"
                        class="page-link">İleri</a></li>
            </ul>
        </section>

        <footer class="bg-dark text-light text-center py-3"
            style="margin-top: 20px;">
            <div class="container">
                <p>&copy; 2024 SanArt. Tüm Hakları Saklıdır.</p>
            </div>
        </footer>

        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            var simdikiSayfa = 3; 
            var sayfaSayisi = 3; 
    
            var geriLink = document.querySelector(".pagination li:first-child a");
            var ileriLink = document.querySelector(".pagination li:last-child a");
            geriLink.addEventListener("click", function () {
                if (simdikiSayfa > 1) {
                    simdikiSayfa--;
                    window.location.href = "odev-konu3-page" + simdikiSayfa + ".php";
                }
            });
    
            ileriLink.addEventListener("click", function () {
                if (simdikiSayfa < sayfaSayisi) {
                   simdikiSayfa++;
                    window.location.href = "odev-konu3-page" + simdikiSayfa + ".php";
                }
            });
            var form = document.querySelector('form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                var konuMetni = document.getElementById('konuMetni').value;
                var yeniMesaj = '<div class="mesaj">' +
                    '<div class="mesaj-profil">' +
                    '<img src="SanArt logo 1.png" alt="Profil İkonu">' +
                    '</div>' +
                    '<div class="mesaj-icerik">' +
                    '<p>' + konuMetni + '</p>' +
                    '<div>' +
                    '<a href="#" style="color: #a6a6a6; float:right;">CmGzl</a>' +
                    '<br> <span style="color: #a6a6a6; float:right;" title="14 Ocak 2024 14:30">14.01.2024</span>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                
                var mesajListesi = document.getElementById('mesajListesi');
                mesajListesi.innerHTML += yeniMesaj;

            });
        });
    </script>

    </body>

</html>