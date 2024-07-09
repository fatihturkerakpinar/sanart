<?php
ob_start(); 
include('db_baglan.php');
session_start();
$konu_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($konu_id == 0) {
    echo "Geçersiz konu ID";
    exit();
}

$sql = "SELECT konular.baslik, konular.icerik, kullanicilar.ad, konular.konu_tarihi 
        FROM konular 
        JOIN kullanicilar ON konular.kullanici_id = kullanicilar.id 
        WHERE konular.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $konu_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Konu bulunamadı.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        echo "Yorum yapmadan önce giriş yapmalısınız.";
    } else {
        $yorum_icerik = $_POST['yorum_icerik'];
        $kullanici_id = $_SESSION['user_id'];

        $yorum_ekle_sorgu = "INSERT INTO yorumlar (icerik, kullanici_id, konu_id) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($yorum_ekle_sorgu);
        $stmt->bind_param("sii", $yorum_icerik, $kullanici_id, $konu_id);
        if ($stmt->execute()) {
            echo "Yorum başarıyla eklendi.";
        } else {
            echo "Yorum eklenirken hata oluştu: " . $conn->error;
        }
    }
}

$yorumlari_getir_sorgu = "SELECT yorumlar.icerik, kullanicilar.kullanici_adi, yorumlar.tarih 
                          FROM yorumlar 
                          JOIN kullanicilar ON yorumlar.kullanici_id = kullanicilar.id 
                          WHERE yorumlar.konu_id = ? 
                          ORDER BY yorumlar.tarih ASC";
$stmt = $conn->prepare($yorumlari_getir_sorgu);
$stmt->bind_param("i", $konu_id);
$stmt->execute();
$yorumlar_sonuc = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($row['baslik']); ?> - Forum Sitesi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        nav {
            background-color: #CAE2E8;
            margin-bottom: 0;
        }

        .container {
            flex-grow: 1;
        }

        .konu {
            
            width: 90%;
            max-width: 800px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            padding: 1rem;
            margin: 1rem auto;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            overflow-wrap: break-word;
        }

        .mesaj-icerik {
            flex-grow: 1;
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

        .form-control {
            width: 100%;
            max-width: 800px;
        }

        .form-label {
            font-weight: bold;
        }

        footer {
            background-color: #343a40;
            color: white;
            width: 100%;
            text-align: center;
            padding: 1rem 0;
            margin-top: auto; 
        }

        .mesaj-yaz {
            background-color: #007bff;
            color: white;
            border: none;
            width: 100%;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .mesaj-yaz:hover {
            background-color: #0056b3;
        }

        .mesaj-icerik p {
            margin: 0;
        }
        .mesaj-profil img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: inline-block;
        }
        .mesaj-icerik .kullanici-adi {
            color: #6c757d;
            font-size: 0.875rem;
        }

        .mesaj-icerik .tarih {
            color: #6c757d;
            font-size: 0.75rem;
        }

        .konuAc {
            background-color: #d6e3e6;
            color: black;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .konuAc:hover {
            background-color: #c6d8dc;
        }
       
    </style>
</head>

<body>
    <?php include "nav.php";?>

    <div class="container mt-4">
       
        <div class="konu" style="margin-top: 60px;">
            <h1><?php echo htmlspecialchars($row['baslik']); ?></h1>
            <p><?php echo nl2br(htmlspecialchars($row['icerik'])); ?></p>
            <p style="color: #6c757d;">Oluşturan: <?php echo htmlspecialchars($row['ad']); ?> | Tarih: <?php echo htmlspecialchars($row['konu_tarihi']); ?></p>
        </div>
        <?php
        if ($yorumlar_sonuc->num_rows > 0) {
            while ($yorum = $yorumlar_sonuc->fetch_assoc()) {
                echo '
                <div class="konu">
                    <div class="mesaj-icerik">
                        <p>' . nl2br(htmlspecialchars($yorum['icerik'])) . '</p>
                        <div class="mt-2">
                            <div class="mesaj-profil">
                                <img src="SanArt logo 1.png" alt="Profil Resmi">
                            </div>
                            <span class="kullanici-adi">' . htmlspecialchars($yorum['kullanici_adi']) . '</span> 
                            <span class="tarih" title="' . htmlspecialchars($yorum['tarih']) . '">' . htmlspecialchars($yorum['tarih']) . '</span>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo '<div class="konu"><p>Henüz yorum yapılmamış.</p></div>';
        }
        ?>
        <div id="mesajForm" class="mt-4" style="margin-left: 250px;">
            <?php if (isset($_SESSION['kullanici_adi'])) : ?>
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="yorumIcerik" class="form-label">Yorum</label>
                        <textarea class="form-control" id="yorumIcerik" name="yorum_icerik" rows="5" required></textarea>
                    </div>
                    <button class="konuAc" type="submit">Yorum Yap</button>
                </form>
            <?php else : ?>
                <p style="margin-left: 250px;">Yorum yapabilmek için <a  href="girisYap.php" data-bs-toggle="modal" data-bs-target="#loginModal">giriş yapmalısınız</a>.</p>
            <?php endif; ?>
        </div>
    </div>
<?php ob_end_flush(); ?>
    <footer class="text-light">
        <div class="container">
            <p>&copy; 2024 SanArt. Tüm Hakları Saklıdır.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
