<?php
include('./includes/db.php');

if (isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    try {
        $dbh = getDB();
        $sth = $dbh->prepare(
            "SELECT id, csaladi_nev, uto_nev FROM felhasznalok
             WHERE bejelentkezes = :bej AND jelszo = sha1(:jelszo)"
        );
        $sth->execute(array(
            ':bej'    => $_POST['felhasznalo'],
            ':jelszo' => $_POST['jelszo']
        ));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $_SESSION['csn']   = $row['csaladi_nev'];
            $_SESSION['un']    = $row['uto_nev'];
            $_SESSION['login'] = $_POST['felhasznalo'];
            header("Location: .");
            exit();
        } else {
            $belepes_hiba = "Hibás felhasználónév vagy jelszó!";
        }
    } catch (PDOException $e) {
        $belepes_hiba = "Adatbázis hiba: " . $e->getMessage();
    }
} else {
    header("Location: .");
    exit();
}
?>
