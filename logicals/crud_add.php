<?php
include('./includes/db.php');

$crud_add_hiba = null;
$nev_val = '';
$kezdev_val = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nev    = trim($_POST['nev']    ?? '');
    $kezdev = trim($_POST['kezdev'] ?? '');

    // Szerver oldali ellenőrzés
    $hibak = array();
    if (strlen($nev) < 2) {
        $hibak[] = "A név mező nem lehet üres!";
    }
    $ev = (int)$kezdev;
    if ($ev < 1950 || $ev > (int)date('Y')) {
        $hibak[] = "Érvényes évet adjon meg (1950–" . date('Y') . ")!";
    }

    if (empty($hibak)) {
        try {
            $dbh = getDB();
            $sth = $dbh->prepare("INSERT INTO szerelo (nev, kezdev) VALUES (:nev, :kezdev)");
            $sth->execute(array(':nev' => $nev, ':kezdev' => $ev));
            header("Location: crud?hozzaadva=1");
            exit();
        } catch (PDOException $e) {
            $crud_add_hiba = "Adatbázis hiba: " . $e->getMessage();
        }
    } else {
        $crud_add_hiba = implode("<br>• ", $hibak);
        $nev_val    = htmlspecialchars($nev);
        $kezdev_val = htmlspecialchars($kezdev);
    }
}
?>