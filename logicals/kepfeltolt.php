<?php
include('./includes/db.php');

// Csak bejelentkezett felhasználó tölthet fel!!!
if (!isset($_SESSION['login'])) {
    header("Location: belepes");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['kep'])) {
    $file  = $_FILES['kep'];
    $leiras = trim($_POST['leiras'] ?? '');

    // Ellenőrzések
    if ($file['error'] !== UPLOAD_ERR_OK) {
        header("Location: kepek?hiba=" . urlencode("Feltöltési hiba (kód: " . $file['error'] . ")"));
        exit();
    }

    // Fájltípus ellenőrzés
    $engedélyezett = array('image/jpeg', 'image/png', 'image/gif');
    $ftype = mime_content_type($file['tmp_name']);
    if (!in_array($ftype, $engedélyezett)) {
        header("Location: kepek?hiba=" . urlencode("Csak JPG, PNG vagy GIF fájl engedélyezett!"));
        exit();
    }

    // Méret max 5MB
    if ($file['size'] > 5 * 1024 * 1024) {
        header("Location: kepek?hiba=" . urlencode("A fájl mérete meghaladja az 5 MB-ot!"));
        exit();
    }

    // Egyedi fájlnév generálás
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $ujnev = uniqid('kep_', true) . '.' . strtolower($ext);
    $cel = './images/galeria/' . $ujnev;

    if (!is_dir('./images/galeria')) {
        mkdir('./images/galeria', 0755, true);
    }

    if (move_uploaded_file($file['tmp_name'], $cel)) {
        try {
            $dbh = getDB();
            $sth = $dbh->prepare(
                "INSERT INTO kepek (fajlnev, leiras, feltolto) VALUES (:fajlnev, :leiras, :feltolto)"
            );
            $sth->execute(array(
                ':fajlnev'  => $ujnev,
                ':leiras'   => $leiras,
                ':feltolto' => $_SESSION['login']
            ));
            header("Location: kepek?siker=1");
            exit();
        } catch (PDOException $e) {
            header("Location: kepek?hiba=" . urlencode("DB hiba: " . $e->getMessage()));
            exit();
        }
    } else {
        header("Location: kepek?hiba=" . urlencode("Nem sikerült áthelyezni a fájlt!"));
        exit();
    }
} else {
    header("Location: kepek");
    exit();
}
?>
