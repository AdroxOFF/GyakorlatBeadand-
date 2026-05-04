<?php
include('./includes/db.php');

$crud_edit_hiba = null;
$szerelo = null;

$id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);

if ($id <= 0) {
    header("Location: crud");
    exit();
}

try {
    $dbh = getDB();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nev    = trim($_POST['nev']    ?? '');
        $kezdev = trim($_POST['kezdev'] ?? '');

        $hibak = array();
        if (strlen($nev) < 2) {
            $hibak[] = "A név mező nem lehet üres!";
        }
        $ev = (int)$kezdev;
        if ($ev < 1950 || $ev > (int)date('Y')) {
            $hibak[] = "Érvényes évet adjon meg (1950–" . date('Y') . ")!";
        }

        if (empty($hibak)) {
            $sth = $dbh->prepare("UPDATE szerelo SET nev=:nev, kezdev=:kezdev WHERE az=:az");
            $sth->execute(array(':nev' => $nev, ':kezdev' => $ev, ':az' => $id));
            header("Location: crud?mentve=1");
            exit();
        } else {
            $crud_edit_hiba = implode("<br>• ", $hibak);
            $szerelo = array('az' => $id, 'nev' => $nev, 'kezdev' => $kezdev);
        }
    } else {
        // GET – betöltjük az adott szerelőt
        $sth = $dbh->prepare("SELECT * FROM szerelo WHERE az = :az");
        $sth->execute(array(':az' => $id));
        $szerelo = $sth->fetch(PDO::FETCH_ASSOC);
        if (!$szerelo) {
            header("Location: crud");
            exit();
        }
    }
} catch (PDOException $e) {
    $crud_edit_hiba = "Adatbázis hiba: " . $e->getMessage();
}
?>