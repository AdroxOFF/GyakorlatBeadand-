<?php
include('./includes/db.php');

if (isset($_POST['felhasznalo']) && isset($_POST['jelszo']) &&
    isset($_POST['vezeteknev']) && isset($_POST['utonev'])) {
    try {
        $dbh = getDB();
        // Létezik már?
        $sth = $dbh->prepare("SELECT id FROM felhasznalok WHERE bejelentkezes = :bej");
        $sth->execute(array(':bej' => $_POST['felhasznalo']));
        if ($sth->fetch()) {
            $reg_uzenet = "A felhasználói név már foglalt!";
            $reg_ujra   = true;
        } else {
            $sth = $dbh->prepare(
                "INSERT INTO felhasznalok (id, csaladi_nev, uto_nev, bejelentkezes, jelszo)
                 VALUES (0, :csaladinev, :utonev, :bej, sha1(:jelszo))"
            );
            $sth->execute(array(
                ':csaladinev' => $_POST['vezeteknev'],
                ':utonev'     => $_POST['utonev'],
                ':bej'        => $_POST['felhasznalo'],
                ':jelszo'     => $_POST['jelszo']
            ));
            $reg_uzenet = "✅ Regisztráció sikeres! Azonosítója: " . $dbh->lastInsertId();
            $reg_ujra   = false;
        }
    } catch (PDOException $e) {
        $reg_uzenet = "Adatbázis hiba: " . $e->getMessage();
        $reg_ujra   = true;
    }
} else {
    header("Location: .");
    exit();
}
?>
