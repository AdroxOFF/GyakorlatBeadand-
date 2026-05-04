<?php
include('./includes/db.php');

$kepek = array();
$feltoltes_uzenet = null;
$feltoltes_ok = false;

// Ha volt sikeres feltöltés (GET paraméterből jelezzük)
if (isset($_GET['siker'])) {
    $feltoltes_uzenet = "✅ A kép sikeresen feltöltve!";
    $feltoltes_ok = true;
} elseif (isset($_GET['hiba'])) {
    $feltoltes_uzenet = "❌ Hiba a feltöltés során: " . htmlspecialchars(urldecode($_GET['hiba']));
    $feltoltes_ok = false;
}

try {
    $dbh = getDB();
    $sth = $dbh->query("SELECT * FROM kepek ORDER BY feltoltes_ideje DESC");
    $kepek = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $feltoltes_uzenet = "Adatbázis hiba: " . $e->getMessage();
    $feltoltes_ok = false;
}
?>
