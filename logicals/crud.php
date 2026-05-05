<?php
include('./includes/db.php');

$szerelok = array();
$crud_uzenet = null;
$crud_ok = false;

if (isset($_GET['torolt'])) {
    $crud_uzenet = "✅ A szerelő sikeresen törölve!";
    $crud_ok = true;
} elseif (isset($_GET['mentve'])) {
    $crud_uzenet = "✅ A szerelő adatai sikeresen mentve!";
    $crud_ok = true;
} elseif (isset($_GET['hozzaadva'])) {
    $crud_uzenet = "✅ Új szerelő sikeresen hozzáadva!";
    $crud_ok = true;
}

try {
    $dbh = getDB();
    $sth = $dbh->query("SELECT * FROM szerelo ORDER BY nev ASC");
    $szerelok = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $crud_uzenet = "❌ Adatbázis hiba: " . $e->getMessage();
    $crud_ok = false;
}
?>