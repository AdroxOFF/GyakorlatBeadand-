<?php
/**
 * Adatbázis kapcsolat helper. :P :P :P
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'szab12345');
define('DB_USER', 'szab12345');
define('DB_PASS', 'szab12345');

function getDB() {
    static $dbh = null;
    if ($dbh === null) {
        $dbh = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER,
            DB_PASS,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    }
    return $dbh;
}
?>
