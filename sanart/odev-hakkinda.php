<?php
ob_start();
session_start();
include 'db_baglan.php';


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
          overflow-x: hidden;
       
        }
        

        @media (min-width: 992px) {
            body {
                padding-top: 72px;
            }
        }
        nav{
            background-color: #CAE2E8;
            margin-bottom: 0px;
        }
        .hakkımızda{
        font-size: small;
        text-align: justify;
        }
       
       
    </style>

    </head>
    <body>

    <?php
include 'nav.php';

?>
    
        <section class="row"><div class="col-3"></div>
            <div class="col-6">
                <center>
                    <article>
                    <h2>Hakkımızda</h2>
                    <p class="hakkımızda"> Merhaba! SanArt Topluluğu'na hoş
                        geldiniz!
                        <br>
                        <br>
                        Bizler, Kırklareli Üniversitesi'nde eğitim alan üç
                        öğrenci olarak sanat, film ve kitaplarla ilgili
                        sohbet etmek isteyen herkesin rahatça katılım
                        sağlayabileceği bir platform oluşturmayı hedefledik.
                        Formaliteyi bir kenara bırakıp, sıcak bir arkadaş
                        ortamında keyifli sohbetlere imkan tanıyan "SanArt"
                        Topluluğu'nun kapıları sizin için aralandı!
                        <br>
                        <br>
                        Bu platformu kurarken aldığımız geri dönütler ve
                        önerilerle daha etkili ve aktif bir forum oluşturma
                        konusunda kararlıyız. Sizlerin katılımıyla SanArt
                        Topluluğu'nun her geçen gün daha
                        da gelişeceğine inanıyoruz. Sizden gelen tüm görüşlere
                        ve önerilere açığız. Sosyal medya hesaplarımızdan ve
                        mail adresimizden bize her zaman ulaşabilir,
                        düşüncelerinizi bizimle paylaşabilirsiniz.
                        <br><br>
                        Unutmayın, SanArt Topluluğu size daha renkli ve dolu
                        dolu bir deneyim yaşatmak için burada. Hemen bir konu
                        açın ve sohbetin tadını çıkarın!</p>
                    <br><br>
                    <h4>Bize Ulaşın</h4> <br> <br>
                    <h6 style="padding-left: 60px;">
                        <img src="instagramIcon.jpeg"
                            style="width: 15px;height: 15px;"><a
                            style="text-decoration: none;"
                            href=" https://www.instagram.com/"> İnstagram </a>
                        <br> <br>
                        <img src="twitterIcon.jpeg"
                            style="width: 20px;height: 20px;"><a
                            style="text-decoration: none;"
                            href="https://twitter.com/"> Twitter </a> <br> <br>
                        <img src="facebookIcon.jpeg"
                            style="width: 15px;height: 15px;"> <a
                            style="text-decoration: none;"
                            href=" https://www.facebook.com/">Facebook </a> <br>
                        <br>
                        <img src="discordIcon.jpeg"
                            style="width: 15px;height: 15px;"><a
                            style="text-decoration: none;"
                            href=" https://www.discord.com/"> Discord </a> <br>
                        <br> <br>
                    </article>
                    </center>
                </div>
        </section>

            <footer class="bg-dark text-light text-center py-3 fixed-bottom"
                style="margin-top: 20px;">
                <div class="container">
                    <p>&copy; 2024 SanArt. Tüm Hakları Saklıdır.</p>
                </div>
            </footer>

            <script
                src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

        </body>
    </html>