<?php
$kilep_nev = '';
if (isset($_SESSION['csn'])) {
    $kilep_nev = $_SESSION['csn'] . ' ' . $_SESSION['un'] . ' (' . $_SESSION['login'] . ')';
    unset($_SESSION['csn'], $_SESSION['un'], $_SESSION['login']);
}
?>
