<?php
include('./includes/db.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: kapcsolat");
    exit();
}

// --- Szerver oldali ellenőrzés ---
$hibak = array();

$nev    = trim($_POST['nev']    ?? '');
$email  = trim($_POST['email']  ?? '');
$targy  = trim($_POST['targy']  ?? '');
$uzenet = trim($_POST['uzenet'] ?? '');

if (strlen($nev) < 2) {
    $hibak[] = "A név mező nem lehet üres (minimum 2 karakter)!";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $hibak[] = "Kérem adjon meg érvényes e-mail címet!";
}

if (strlen($targy) < 2) {
    $hibak[] = "A tárgy mező nem lehet üres!";
}

if (strlen($uzenet) < 10) {
    $hibak[] = "Az üzenet legalább 10 karakter hosszú legyen!";
}

if (!empty($hibak)) {
    // Hibákat visszaadjuk a kapcsolat oldalnak
    $szerver_hiba = "❌ Kérem javítsa az alábbi hibákat:<br>• " . implode("<br>• ", $hibak);
    // Betöltjük a kapcsolat oldalt a hibával
    $keres = $GLOBALS['oldalak']['kapcsolat'];
    include('./templates/index.tpl.php');
    exit();
}

// --- Mentés adatbázisba ---
$felhasznalo = $_SESSION['login'] ?? null;

try {
    $dbh = getDB();
    $sth = $dbh->prepare(
        "INSERT INTO uzenetek (nev, email, targy, uzenet, felhasznalo)
         VALUES (:nev, :email, :targy, :uzenet, :felhasznalo)"
    );
    $sth->execute(array(
        ':nev'         => $nev,
        ':email'       => $email,
        ':targy'       => $targy,
        ':uzenet'      => $uzenet,
        ':felhasznalo' => $felhasznalo
    ));
    // Az elküldött adatokat átadjuk az 5. oldalnak
    $_SESSION['bekuldes'] = array(
        'nev'    => $nev,
        'email'  => $email,
        'targy'  => $targy,
        'uzenet' => $uzenet,
        'ido'    => date('Y.m.d H:i:s')
    );
    header("Location: uzkld");
    exit();
} catch (PDOException $e) {
    $szerver_hiba = "Adatbázis hiba: " . $e->getMessage();
    $keres = $GLOBALS['oldalak']['kapcsolat'];
    include('./templates/index.tpl.php');
    exit();
}
?>