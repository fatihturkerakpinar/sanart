<?php
ob_start();
session_start();
include 'db_baglan.php';



if (isset($_SESSION['kullanici_adi'])) {
    $kullanici_adi = $_SESSION['kullanici_adi']; 

    
    $sorgu = "SELECT * FROM kullanicilar WHERE kullanici_adi = '$kullanici_adi'";
    $sonuc = mysqli_query($conn, $sorgu);

    if ($sonuc) {
     
        $kullanici = mysqli_fetch_assoc($sonuc);
        $_SESSION['ad'] = $kullanici['ad'];
        $_SESSION['soyad'] = $kullanici['soyad'];
        $_SESSION['kullanici_adi'] = $kullanici['kullanici_adi'];
        $_SESSION['dogum_tarihi'] = $kullanici['dogum_tarihi'];
        $_SESSION['password'] = $kullanici['sifre']; 
        $_SESSION['email'] = $kullanici['email'];
    } else {
      
        $_SESSION['password'] = ''; 
        echo "Veritabanı sorgusu başarısız: " . mysqli_error($baglanti);
    }
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SanArt</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="icon" href="SanArt logo 1.png">
    <style>
       .xx {
    margin-top: 12px;
       }
        
        body {
            padding-top: 56px;
        }
        @media (min-width: 992px) {
            body {
                padding-top: 72px;
            }
            header{
            margin-top: -6px;
        }
       
        }
        nav{
            background-color: #CAE2E8;
            
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
        @media (max-width: 992px) {
            body {
                padding-top: 72px;
            }
            header{
            margin-top: -6px;
        }}
       
    </style>
   
</head>
<body>
  

<?php
include 'nav.php';

?>
<header class="jumbotron text-center bg-light " >
    
       
     </div>
 </header>





<section class="container mt-4">

    <div class="row bg-light "><h3>Hesap Detayları</h3></div>

    <div  class="row">
        <div class="col-1 bg-light">

    </div>
        <div class="col-2 bg-light">
        <img src="profilIcon.png" alt="" id="resim" style="width: 120px;height: 120px;margin-top: 50px; " >
        <button type="button" style="width: 20px;height: 20px;;" id="degis"><img src="degistirmeIcon.png" alt="" style="width: 20px;height: 20px;"></button>
    </div>
    <div class="col-2 bg-light " style="padding-left: 70px;"><br><br>
         <h6>Ad: <br> <br> <br>
            Soyad:  <br> <br>  <br> 
            Doğum Tarihi:  <br> <br> <hr>
            Kullanıcı Adı:  <br> <br> <br>
            E-Posta: <br> <br>  <br> 
            Parola: <br> <br> <br>
             <br> </h6>
    </div>
    <div class="col-3">
        <form action=""  method="post"> <br> <br>
            
            <input type="text" value="<?php echo isset($_SESSION['ad']) ? $_SESSION['ad'] : '';?>"disabled ><br> <br>
            
            <input type="text" value="<?php echo isset($_SESSION['soyad']) ? $_SESSION['soyad'] : '';?>"disabled ><br> <br> 
            <input type="date" value="<?php echo isset($_SESSION['dogum_tarihi']) ? $_SESSION['dogum_tarihi'] : '';?>"disabled  ><br>   <br> <hr class="xx">
            <input type="text" id="text1" value="<?php echo isset($_SESSION['kullanici_adi']) ? $_SESSION['kullanici_adi'] : '';?>" disabled>&nbsp; &nbsp;<button type="button" style="width: 20px;height: 20px;;" id="degis2"><img src="degistirmeIcon.png" alt="" style="width: 20px;height: 20px;"></button> <br> <br>
           
            <input type="email" id="text2" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '';?>" disabled> &nbsp; <button type="button" style="width: 20px;height: 20px;;" id="degis3"><img src="degistirmeIcon.png" alt="" style="width: 20px;height: 20px;"></button><br> <br>
            <input type="password" id="text3" value="<?php echo isset($_SESSION['kullanici_adi']) ? $_SESSION['password'] : '';?>" disabled> &nbsp; <button type="button" style="width: 20px;height: 20px;" id="degis4"><img src="degistirmeIcon.png" alt="" style="width: 20px;height: 20px;"></button>
            &nbsp;
            <button type="button" id="hide" style="width: 25px;height: 25px;"><img src="gozIcon.png" alt=""  style="width: 15px;height: 15px;"></button><br> 
            <br><br>
            <button type="submit" id="Kaydet" class="konuAc" >Kaydet</button>
            
        </form>
    </div>  


    <div class="col-2 bg-light"> <br>
        

        <br>
        <br><h4>Tecrübe</h4><br>
        <div class="progress" style="height: 30px;">
            
            <div class="progress-bar bg-warning progress-bar-stripped progress-bar-animated" style="width: 30%;">Çaylak </div>
        </div>
        <br><br>
        <h6><legend>İletişim</legend></h6> <br> <br>
        <h6 style="padding-left: 60px;">
         <img src="instagramIcon.jpeg" alt="" style="width: 15px;height: 15px;"><a style="text-decoration: none;" href=" https://www.instagram.com/"> İnstagram </a>   <br> <br> 
         <img src="twitterIcon.jpeg" alt="" style="width: 20px;height: 20px;"><a style="text-decoration: none;" href="https://twitter.com/"> Twitter </a>   <br> <br> 
         <img src="facebookIcon.jpeg" alt=""style="width: 15px;height: 15px;"> <a style="text-decoration: none;" href=" https://www.facebook.com/">Facebook </a>  <br> <br>   
         <img src="discordIcon.jpeg" alt="" style="width: 15px;height: 15px;"><a style="text-decoration: none;" href=" https://www.discord.com/"> Discord </a>   <br> <br> <br>

        </h6>
       <div style="background-color: rgb(204, 215, 215);" class="container "><a href="odev.php"><ol id="mylist"></ol></a></div> 
    </div>
    

    <div class="col-2"> 
    </div>
   
      
    </div>
    <br><br><br><br>
</section>


<footer class="bg-dark text-light text-center py-3">
    <div class="container">
        <p>&copy; 2024 SanArt. Tüm Hakları Saklıdır.</p>
    </div>
</footer>

<script>
  
        $("#degis2").click(function(){
            var inputElement = $("#text1");

            inputElement.prop('disabled',false);
            inputElement.focus();
          
        });
        $("#degis3").click(function(){
            var inputElement = $("#text2");

            inputElement.prop('disabled',false);
            inputElement.focus();

        });
        $("#degis4").click(function(){
            var inputElement = $("#text3");

            inputElement.prop('disabled',false);
            inputElement.focus();
            
        });

        function hesapAd(newInput2Value){
            $("#hesapAd").text(newInput2Value);
        }
        $("#Kaydet").click(function(e){
            e.preventDefault();

            var newInput2Value = $("#text1").val();
            var newInput3Value = $("#text2").val();
            var newInput4Value = $("#text3").val();
            

            $("#text1").val(newInput2Value);
            $("#text2").val(newInput3Value);
            $("#text3").val(newInput4Value);

            hesapAd(newInput2Value);
            
            
            $("#text1, #text2, #text3").prop('disabled', true);

            $("#text3").attr("type","password");
        });


        var i = true;
        $("#hide").click(function(){
            
            if(i==true){
                 $("#text3").attr("type","text");
                 i =false;
                 
            }else if(i==false){
                 $("#text3").attr("type","password");
                 i =true;
                 
            }
                  
        });
       
      
        

  
    
</script>



</body>
</html>