<style>.search-container {
            position: relative;
            display: inline-block;
        }

        .search-results {
            display: none;
            position: absolute;
            background-color: #f7fdfc; 
            min-width: 230px;
            border: 1px solid #d4d4d4;
            z-index: 1;
        }

        .search-results div {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .search-results div:hover {
            background-color: #ddd;
        }

        .search-results a {
            text-decoration: none;
            color: inherit;
        }

        .search-results a:hover {
            text-decoration: none; 
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 50px;
        }</style>
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
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
                    <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) && isset($_SESSION['kullanici_adi']) && !empty($_SESSION['kullanici_adi'])): ?>
                        <a class="nav-link" id="konuAcLink" href="odevKonu.php">Konu Aç</a>
                    <?php else: ?>
                        <a class="nav-link" id="konuAcLink" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Konu Aç</a>
                    <?php endif; ?>
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
                            <button type="submit" class="btn btn-danger">Çıkış</button>
                        </form>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="girisYap.php" data-bs-toggle="modal" data-bs-target="#loginModal">Giriş Yap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kayitol.php">Kayıt Ol</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item" style="padding-left: 10px;">
                    <div style="border: 1px solid #000000;background-color: white;">
                        <img src="aramaIcon.png" alt="" style="width: 17px ;height: 23px;background-color: white;">
                        <input type="search" id="searchInput" placeholder="Ara..." style="border: none">
                        <div class="search-results" id="results"></div>
                    </div>
                  
        
        
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
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

    <?php
    
    
    
    if (isset($_POST['kullanici_adi']) && isset($_POST['sifre'])) {


  
        $kullanici_adi = $_POST['kullanici_adi'];
        $sifre = $_POST['sifre'];

      
        $sql = "SELECT * FROM kullanicilar WHERE kullanici_adi=?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Hazırlık hatası: " . $conn->error);
        }

        $stmt->bind_param("s", $kullanici_adi);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
       
            $user = $result->fetch_assoc();
            if (password_verify($sifre, $user['sifre'])) {
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['kullanici_adi'] = $user['kullanici_adi'];
                header("Location: odev.php");
                exit();
            } else {
                
                echo '<script>alert("Şifreniz Hatalı");</script>';
                exit();
            }
        } else {
            
            header("Location: odev.php");
            exit();
        }
        $stmt->close();
        $conn->close();
    }  ob_end_flush();
    ?>




<script>
   
    function fetchResults(query) {
        if (query.length > 2) {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "search.php?query=" + encodeURIComponent(query), true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    const results = JSON.parse(xhr.responseText);
                    let output = '';
                    if (results.length > 0) {
                        results.forEach(result => {
                            const url = 'konu_detay.php?id=' + result.item_id;
                            const displayText = result.title;
                            output += `<div><a href="${url}">${displayText}</a></div>`;
                        });
                    } else {
                        output = '<div>Hiç sonuç bulunamadı</div>';
                    }
                    document.getElementById('results').innerHTML = output;
                    document.getElementById('results').style.display = 'block';
                }
            };
            xhr.send();
        } else {
            document.getElementById('results').style.display = 'none';
        }
    }

   
    document.getElementById('searchInput').addEventListener('input', function () {
        const query = this.value;
        fetchResults(query);
    });
    document.addEventListener('click', function (event) {
        if (!event.target.closest('.search-container')) {
            document.getElementById('results').style.display = 'none';
        }
    });
</script>
  