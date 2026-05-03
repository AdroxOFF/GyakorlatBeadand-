<?php
include('./includes/db.php');

// Csak bejelentkezett felhasználó láthatja
if (!isset($_SESSION['login'])) {
    header("Location: belepes");
    exit();
}

$uzenetek = array();
try {
    $dbh = getDB();
    $sth = $dbh->query(
        "SELECT * FROM uzenetek ORDER BY kuldes_ideje DESC"
    );
    $uzenetek = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $db_hiba = "Adatbázis hiba: " . $e->getMessage();
}
?>
