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
          display: flex;
          flex-direction: column;
          padding-top: 56px;
        }
        table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 20px;
      }

      th, td {
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
        }
        nav{
            background-color: #CAE2E8;
            margin-bottom: 0px;
        }
        div{
          width: 900px;
          height: auto;
          align-items: center;
          margin-left: 100px;
      }
      td a{
          text-decoration: none;
          color: #000000;
      }
      td a:hover{
          background-color: #a3a3a3;
      }
     
  .inline{
      display: inline-block;
  }
  div ul{
    align-items: center;
  }
  .pagination a {
    color: #416d78; 
}
.pagination .page-item.active .page-link{
    background-color: #316a95;
    color: rgb(236, 252, 255);
}
.hidden{
    display: none;
}
.forum-div {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    margin-left: 250px;
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


<?php
include 'nav.php';

?>



<header class="jumbotron text-center bg-light" >
    <div class="container">
        <h1 class="display-4">Hoş Geldiniz!</h1>
        <p class="lead">SanArt'a Hoş Geldiniz. Keyifli sohbetlerin adresi.</p>
    </div>
</header>


<section class="container mt-4">
    
   
    <div class="forum-div">
        <h2 class="forum-baslik">Forumlar</h2>
        
    </div>
    <center>     
        <div>
        
      <table id="1" style="border:  rgb(156, 156, 156) 2px;" class="table table-striped">
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
              <tr>
                  <td><a href="konu#123">Oppenheimer filminin alt metni</a></td>
                  <td><a href="filmKategori">Film</a></td>
                  <td>15</td>
                  <td>12.01.2024</td>
                  <td>Ozodus</td>
              </tr>
              <tr>
                  <td><a href="konu#123">Fight club üzerine...</a></td>
                  <td><a href="filmKategori">Film</a></td>
                  <td>6</td>
                  <td>10.01.2024</td>
                  <td>CmGzl</td></tr>
                 <tr>
                  <td><a href="konu#123">Benedict cumberbatch ağabeyin frankeinstein performansı</a></td>
                  <td><a href="tiyatroKategori">Film</a></td>
                  <td>24</td>
                  <td>12.01.2024</td>
                  <td>Fatih_The_Conquerer</td>
              </tr>
              <tr>
                  <td><a href="konu#123">Benedict cumberbatch ağabeyin frankeinstein performansı</a></td>
                  <td><a href="tiyatroKategori">Tiyatro</a></td>
                  <td>24</td>
                  <td>12.01.2024</td>
                  <td>Fatih_The_Conquerer</td>
              </tr>
              <tr>
                  <td><a href="konu#123">Benedict cumberbatch ağabeyin frankeinstein performansı</a></td>
                  <td><a href="tiyatroKategori">Film</a></td>
                  <td>24</td>
                  <td>12.01.2024</td>
                  <td>Fatih_The_Conquerer</td>
              </tr>
              <tr>
                  <td><a href="konu#123">Biraz kahve içelim</a></td>
                  <td><a href="tiyatroKategori">Film</a></td>
                  <td>24</td>
                  <td>12.01.2024</td>
                  <td>Fatih_The_Conquerer</td>
              </tr>
              <tr>
                  <td><a href="konu#123">Pavarottinin aryası hakkında bir kuple yorum</a></td>
                  <td><a href="tiyatroKategori">Film</a></td>
                  <td>24</td>
                  <td>12.01.2024</td>
                  <td>Fatih_The_Conquerer</td>
              </tr>
              <tr>
                  <td><a href="konu#123">Benedict cumberbatch ağabeyin frankeinstein performansı</a></td>
                  <td><a href="tiyatroKategori">Film</a></td>
                  <td>24</td>
                  <td>12.01.2024</td>
                  <td>Fatih_The_Conquerer</td>
              </tr>       
          </tbody>
      </table>



      <table id="2" style="border:  rgb(156, 156, 156) 2px;" class="table table-striped hidden">
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
            <tr>
                <td><a href="konu#123">Baska bir konu</a></td>
                <td><a href="filmKategori">Film</a></td>
                <td>15</td>
                <td>12.01.2024</td>
                <td>Ozodus</td>
            </tr>
            <tr>
                <td><a href="konu#123">Tiyatroda poetica etkisi</a></td>
                <td><a href="filmKategori">Film</a></td>
                <td>6</td>
                <td>10.01.2024</td>
                <td>CmGzl</td></tr>
               <tr>
                <td><a href="konu#123">Aristonun sanata katkısı</a></td>
                <td><a href="tiyatroKategori">Film</a></td>
                <td>24</td>
                <td>12.01.2024</td>
                <td>Fatih_The_Conquerer</td>
            </tr>
            <tr>
                <td><a href="konu#123">Benedict cumberbatch ağabeyin frankeinstein performansı</a></td>
                <td><a href="tiyatroKategori">Tiyatro</a></td>
                <td>24</td>
                <td>12.01.2024</td>
                <td>Fatih_The_Conquerer</td>
            </tr>
            <tr>
                <td><a href="konu#123">Benedict cumberbatch ağabeyin frankeinstein performansı</a></td>
                <td><a href="tiyatroKategori">Film</a></td>
                <td>24</td>
                <td>12.01.2024</td>
                <td>Fatih_The_Conquerer</td>
            </tr>
            <tr>
                <td><a href="konu#123">Biraz kahve içelim</a></td>
                <td><a href="tiyatroKategori">Film</a></td>
                <td>24</td>
                <td>12.01.2024</td>
                <td>Fatih_The_Conquerer</td>
            </tr>
            <tr>
                <td><a href="konu#123">Pavarottinin aryası hakkında bir kuple yorum</a></td>
                <td><a href="tiyatroKategori">Film</a></td>
                <td>24</td>
                <td>12.01.2024</td>
                <td>Fatih_The_Conquerer</td>
            </tr>
            <tr>
                <td><a href="konu#123">Benedict cumberbatch ağabeyin frankeinstein performansı</a></td>
                <td><a href="tiyatroKategori">Film</a></td>
                <td>24</td>
                <td>12.01.2024</td>
                <td>Fatih_The_Conquerer</td>
            </tr>       
        </tbody>
    </table>
    <table id="3" style="border:  rgb(156, 156, 156) 2px;" class="table table-striped hidden">
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
            <tr>
                <td><a href="konu#123">Ücüncü sayfanın konuları</a></td>
                <td><a href="filmKategori">Film</a></td>
                <td>15</td>
                <td>12.01.2024</td>
                <td>Ozodus</td>
            </tr>
            <tr>
                <td><a href="konu#123">Godfather'ın karanlık alegorisi</a></td>
                <td><a href="filmKategori">Film</a></td>
                <td>6</td>
                <td>10.01.2024</td>
                <td>CmGzl</td></tr>
               <tr>
                <td><a href="konu#123">A</a></td>
                <td><a href="tiyatroKategori">Film</a></td>
                <td>24</td>
                <td>12.01.2024</td>
                <td>Fatih_The_Conquerer</td>
            </tr>
            <tr>
                <td><a href="konu#123">Benedict cumberbatch ağabeyin frankeinstein performansı</a></td>
                <td><a href="tiyatroKategori">Tiyatro</a></td>
                <td>24</td>
                <td>12.01.2024</td>
                <td>Fatih_The_Conquerer</td>
            </tr>
            <tr>
                <td><a href="konu#123">Benedict cumberbatch ağabeyin frankeinstein performansı</a></td>
                <td><a href="tiyatroKategori">Film</a></td>
                <td>24</td>
                <td>12.01.2024</td>
                <td>Fatih_The_Conquerer</td>
            </tr>
            <tr>
                <td><a href="konu#123">Biraz kahve içelim</a></td>
                <td><a href="tiyatroKategori">Film</a></td>
                <td>24</td>
                <td>12.01.2024</td>
                <td>Fatih_The_Conquerer</td>
            </tr>
            <tr>
                <td><a href="konu#123">Pavarottinin aryası hakkında bir kuple yorum</a></td>
                <td><a href="tiyatroKategori">Film</a></td>
                <td>24</td>
                <td>12.01.2024</td>
                <td>Fatih_The_Conquerer</td>
            </tr>
            <tr>
                <td><a href="konu#123">Benedict cumberbatch ağabeyin frankeinstein performansı</a></td>
                <td><a href="tiyatroKategori">Film</a></td>
                <td>24</td>
                <td>12.01.2024</td>
                <td>Fatih_The_Conquerer</td>
            </tr>       
        </tbody>
    </table>

      <ul class="pagination" >
        <li class="page-item "><a href="" id="prev" class="page-link">Previous</a></li>
        <li class="page-item"><a href="#1" id="1sayfa" class="page-link">1</a></li>
        <li class="page-item"><a href="#2" id="2sayfa" class="page-link">2</a></li>
        <li class="page-item"><a href="#3" id="3sayfa" class="page-link">3</a></li>
        <li class="page-item"><a href=""  id="next" class="page-link">Next</a></li>
   
      </ul>
    
    </div>
</center>
</section>


<footer class="bg-dark text-light text-center py-3" style="margin-top: 20px;">
    <div class="container">
        <p>&copy; 2024 SanArt. Tüm Hakları Saklıdır.</p>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script>

    
    
   
        var a = document.querySelectorAll('.pagination a');
        var current =1;

        for (var i = 0; i < a.length; i++) {
            a[i].addEventListener("click", sayfalar);
        }

        function sayfalar(event) {
            event.preventDefault();

            var clickedId = event.target.id;

            if (clickedId === "1sayfa" ) {
              
                current=1;
                document.getElementById("1").style.display="table";
                document.getElementById("2").style.display="none";
                document.getElementById("3").style.display="none";
            } else if (clickedId === "2sayfa") {
                current=2;
                document.getElementById("1").style.display="none";
                document.getElementById("2").style.display="table";
                document.getElementById("3").style.display="none";
            } else if (clickedId === "3sayfa") {
                current=3;
                document.getElementById("1").style.display="none";
                document.getElementById("2").style.display="none";
                document.getElementById("3").style.display="table";
            }
            else if(clickedId ==="next" && current!==3){
                document.getElementById("1").style.display="none";
                document.getElementById("2").style.display="none";
                document.getElementById("3").style.display="none";
                current++;
                var b= current.toString();
                document.getElementById(b).style.display="table";
            }
            else if(clickedId ==="prev" && current!==1){
                document.getElementById("1").style.display="none";
                document.getElementById("2").style.display="none";
                document.getElementById("3").style.display="none";
                current--;
                var b= current.toString();
                document.getElementById(b).style.display="table";
            }
          
        }
    </script>
    
</body>
</html>