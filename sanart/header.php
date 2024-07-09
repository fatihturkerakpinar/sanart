<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <a href="odev.php"><title>SanArt</title></a> 
    
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
        header{
        margin-top: -6px;
    }
   
    }
    nav{
        background-color: #CAE2E8;
        margin-bottom: 0px;
    }
    @media (max-width: 992px) {
        body {
            padding-top: 72px;
        }
        header{
        margin-top: -6px;
    }}

  td a{
      text-decoration: none;
      color: #000000;
  }
  td a:hover{
      background-color: #a3a3a3;
      color: #000000;
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
                    <a class="nav-link" href="odevKonu.php" >Konu Aç</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="odev-hakkinda.php">Hakkımızda</a>
                    </li>
                    <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && isset($_SESSION['kullanici_adi']) && !empty($_SESSION['kullanici_adi'])): ?>
                        <li class="nav-item" style="display:block;">
                            <a class="nav-link" href="odevHesapClick.php"
                                style="background-color: #c1dbe3;border-radius: 40%;">Hesabım <img src="profilIcon.png"
                                    alt="" style="width: 20px;height: 20px;"></a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item" style="display:none;">
                            <a class="nav-link" href="odevHesapClick.php"
                                style="background-color: #c1dbe3;border-radius: 40%;">Hesabım <img src="profilIcon.png"
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