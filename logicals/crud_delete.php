<?php
include('./includes/db.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: crud");
    exit();
}

$id = (int)($_POST['id'] ?? 0);
if ($id <= 0) {
    header("Location: crud");
    exit();
}

try {
    $dbh = getDB();
    $sth = $dbh->prepare("DELETE FROM szerelo WHERE az = :az");
    $sth->execute(array(':az' => $id));
    header("Location: crud?torolt=1");
    exit();
} catch (PDOException $e) {
    header("Location: crud?hiba=" . urlencode($e->getMessage()));
    exit();
}
?>